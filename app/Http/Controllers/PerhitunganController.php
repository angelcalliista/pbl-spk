<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Aspek;
use App\Models\Kriteria;
use App\Models\Profile;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    private function getBobot($gap)
    {
        if ($gap == 0) return 5;
        if ($gap == 1) return 4.5;
        if ($gap == -1) return 4;
        if ($gap == 2) return 3.5;
        if ($gap == -2) return 3;
        if ($gap == 3) return 2.5;
        if ($gap == -3) return 2;
        if ($gap == 4) return 1.5;
        if ($gap == -4) return 1;

        if ($gap > 4) return 1; // Atau nilai bobot terendah lainnya
        if ($gap < -4) return 1; // Atau nilai bobot terendah lainnya

        return 1;
    }


    public function index()
    {
        $alternatifs = Alternatif::orderBy('kode')->get();
        $aspeks = Aspek::orderBy('kode')->get();


        if ($alternatifs->isEmpty() || $aspeks->isEmpty()) {

            return view('perhitungan', [
                'rankingData' => [],
                'arrayHitung' => [],
                'message' => 'Data alternatif atau aspek belum lengkap untuk melakukan perhitungan.'
            ]);
        }
        $arrayHitung = [];

        foreach ($aspeks as $aspek) {
            $persentaseAspek = $aspek->persentase ?? 0;
            if ($persentaseAspek <= 0) {
            }
            $hitungPerAspek = [
                'Aspek' => [
                    'key' => $aspek->kode,
                    'value' => $aspek->nama_aspek ?? $aspek->nama, // Sesuaikan
                    'nilai_persen' => $persentaseAspek,
                ],
                'Data' => []
            ];
            $kriteriaForThisAspek = Kriteria::where('id_aspek', $aspek->id)->get();
            if ($kriteriaForThisAspek->isEmpty()) {
                foreach($alternatifs as $alternatif){
                    $hitungPerAspek['Data'][] = [
                        'Alternatif' => $alternatif,
                        'Profile' => [],
                        'NCF' => 0,
                        'NSF' => 0,
                        'Total' => 0,
                    ];
                }
                $arrayHitung[] = $hitungPerAspek;
                continue;
            }
            foreach ($alternatifs as $alternatif) {
                $profiles = Profile::with('kriteria')
                    ->where('id_alternatif', $alternatif->id)
                    ->whereHas('kriteria', function ($query) use ($aspek) {
                        $query->where('id_aspek', $aspek->id);
                    })
                    ->get();

                $coreF_bobot_sum = 0;
                $secondaryF_bobot_sum = 0;
                $count_core_factors = 0;
                $count_secondary_factors = 0;
                $profileData = [];

                foreach ($kriteriaForThisAspek as $kriteriaItem) {

                    $profileMatch = $profiles->firstWhere('id_kriteria', $kriteriaItem->id);
                    $nilaiKriteria = $kriteriaItem->nilai;
                    $nilaiProfile = $profileMatch ? $profileMatch->nilai_profile : 0;
                    $factor = $kriteriaItem->factor;
                    $gap = $nilaiProfile - $nilaiKriteria;
                    $bobot = $this->getBobot($gap);

                    $profileData[] = [
                        'key' => $kriteriaItem->kode,
                        'value' => $kriteriaItem->nama_kriteria ?? $kriteriaItem->nama,
                        'nilai_kriteria_target' => $nilaiKriteria,
                        'nilai_profile_alternatif' => $nilaiProfile,
                        'factor' => $factor,
                        'gap' => $gap,
                        'bobot_gap' => $bobot,
                    ];

                    if ($factor == 1) { // Core Factor
                        $coreF_bobot_sum += $bobot;
                        $count_core_factors++;
                    } elseif ($factor == 2) { // Secondary Factor
                        $secondaryF_bobot_sum += $bobot;
                        $count_secondary_factors++;
                    }
                }

                $NCF = ($count_core_factors == 0) ? 0 : $coreF_bobot_sum / $count_core_factors;
                $NSF = ($count_secondary_factors == 0) ? 0 : $secondaryF_bobot_sum / $count_secondary_factors;
                $totalNilaiAlternatifPerAspek = (0.6 * $NCF) + (0.4 * $NSF);

                $hitungPerAspek['Data'][] = [
                    'Alternatif' => $alternatif,
                    'ProfileDetail' => $profileData,
                    'NCF' => round($NCF, 4),
                    'NSF' => round($NSF, 4),
                    'TotalNilaiAlternatifPerAspek' => round($totalNilaiAlternatifPerAspek, 4),
                ];
            }
            $arrayHitung[] = $hitungPerAspek;
        }
        $rankingData = [];
        foreach ($alternatifs as $alternatif) {
            $totalScoreAkhir = 0;
            foreach ($arrayHitung as $perhitunganPerAspek) {
                foreach ($perhitunganPerAspek['Data'] as $dataAlternatifDiAspek) {
                    if ($dataAlternatifDiAspek['Alternatif']->id == $alternatif->id) {
                        $bobotAspekDecimal = ($perhitunganPerAspek['Aspek']['nilai_persen'] ?? 0) / 100;
                        $totalScoreAkhir += $dataAlternatifDiAspek['TotalNilaiAlternatifPerAspek'] * $bobotAspekDecimal;
                    }
                }
            }
            $rankingData[] = [
                'Alternatif' => $alternatif,
                'Score' => $totalScoreAkhir,
            ];
        }
        usort($rankingData, function ($a, $b) {
            return $b['Score'] <=> $a['Score'];
        });
        // Menambahkan Rank
        $currentRank = 1;
        $previousScore = null;
        foreach ($rankingData as $index => &$item) {
            if ($previousScore !== null && $item['Score'] < $previousScore) {
                $currentRank = $index + 1;
            }
            $item['Rank'] = $currentRank;
            $previousScore = $item['Score'];
        }
        unset($item);
        return view('perhitungan', compact('rankingData', 'arrayHitung'));
    }
}
