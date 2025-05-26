<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Aspek;
use App\Models\Kriteria;
use App\Models\Profile;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    // Fungsi untuk mendapatkan bobot berdasarkan gap
    private function getBobot($gap)
    {
        if ($gap < -4) return 1;
        if ($gap > 4) return 5;

        $bobot = 3;
        switch ($gap) {
            case 0: $bobot = 3; break;
            case 1: $bobot = 3.5; break;
            case -1: $bobot = 2.5; break;
            case 2: $bobot = 4; break;
            case -2: $bobot = 2; break;
            case 3: $bobot = 4.5; break;
            case -3: $bobot = 1.5; break;
            case 4: $bobot = 5; break;
            case -4: $bobot = 1; break;
            default: $bobot = 3; break;
        }
        return $bobot;
    }

    public function calculateAllProfileMatching()
    {
        $alternatifs = Alternatif::orderBy('id')->get();
        $aspeks = Aspek::orderBy('id')->get();

        $arrayHitung = [];

        foreach ($aspeks as $aspek) {
            $hitung = [
                'Aspek' => [
                    'key' => $aspek->kode,
                    'value' => $aspek->nama_aspek,
                    'nilai_persen' => $aspek->persentase,
                ],
                'Data' => []
            ];

            foreach ($alternatifs as $alternatif) {
                $profiles = Profile::with('kriteria')
                    ->where('id_alternatif', $alternatif->id)
                    ->whereHas('kriteria', function ($query) use ($aspek) {
                        $query->where('id_aspek', $aspek->id);
                    })
                    ->get();

                $coreF = 0;
                $secondaryF = 0;
                $C = 0;
                $S = 0;
                $profileData = [];

                foreach ($profiles as $profile) {
                    $nilaiKriteria = $profile->kriteria->nilai;
                    $nilaiProfile = $profile->nilai_profile;
                    $factor = $profile->kriteria->factor;
                    $gap = $nilaiProfile - $nilaiKriteria;
                    $bobot = $this->getBobot($gap);

                    $profileData[] = [
                        'key' => $profile->kriteria->kode,
                        'value' => $profile->kriteria->nama_kriteria,
                        'nilai_kriteria' => $nilaiKriteria,
                        'nilai_profile' => $nilaiProfile,
                        'factor' => $factor,
                        'gap' => $gap,
                        'bobot' => $bobot,
                    ];

                    if ($factor == 1) {
                        $coreF += $bobot;
                        $C++;
                    } else {
                        $secondaryF += $bobot;
                        $S++;
                    }
                }

                $NCF = $C == 0 ? 0 : $coreF / $C;
                $NSF = $S == 0 ? 0 : $secondaryF / $S;
                $total = (0.6 * $NCF) + (0.4 * $NSF);

                $hitung['Data'][] = [
                    'Alternatif' => $alternatif,
                    'Profile' => $profileData,
                    'NCF' => $NCF,
                    'NSF' => $NSF,
                    'Total' => $total,
                ];
            }

            $arrayHitung[] = $hitung;
        }

        // Menghitung total ranking per alternatif
        $rankingData = [];
        foreach ($alternatifs as $alternatif) {
            $totalScore = 0;
            foreach ($arrayHitung as $hitung) {
                foreach ($hitung['Data'] as $data) {
                    if ($data['Alternatif']->id == $alternatif->id) {
                        $totalScore += $data['Total'] * ($hitung['Aspek']['nilai_persen'] / 100);
                    }
                }
            }
            $totalScore = round($totalScore, 2);
            $rankingData[] = [
                'Alternatif' => $alternatif,
                'Score' => $totalScore,
            ];
        }

        // Sorting ranking descending
        usort($rankingData, function ($a, $b) {
            return $b['Score'] <=> $a['Score'];
        });

        // Menambahkan rank
        foreach ($rankingData as $index => &$item) {
            $item['Rank'] = $index + 1;
        }

        return response()->json([
            'ranking' => $rankingData,
            'detail' => $arrayHitung,
        ]);
    }
}
