<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Aspek;
use App\Models\Kriteria;
use App\Models\Profile;
use Illuminate\Http\Request; // Request tidak digunakan di index, bisa dihapus jika tidak ada rencana penggunaan

class PerhitunganController extends Controller
{
    // Fungsi untuk mendapatkan bobot berdasarkan gap
    private function getBobot($gap)
    {
        // Ini adalah implementasi sederhana, bisa disesuaikan dengan aturan PM yang lebih spesifik
        // Contoh umum:
        // GAP | Bobot
        //  0  |  5
        //  1  |  4.5
        // -1  |  4
        //  2  |  3.5
        // -2  |  3
        //  3  |  2.5
        // -3  |  2
        //  4  |  1.5
        // -4  |  1

        // Implementasi Anda saat ini:
        if ($gap == 0) return 5; // Umumnya nilai target pas dapat bobot tertinggi
        if ($gap == 1) return 4.5;
        if ($gap == -1) return 4;
        if ($gap == 2) return 3.5;
        if ($gap == -2) return 3;
        if ($gap == 3) return 2.5;
        if ($gap == -3) return 2;
        if ($gap == 4) return 1.5;
        if ($gap == -4) return 1;
        // Untuk gap di luar range ini (lebih besar dari 4 atau lebih kecil dari -4)
        if ($gap > 4) return 1; // Atau nilai bobot terendah lainnya
        if ($gap < -4) return 1; // Atau nilai bobot terendah lainnya

        return 1; // Default jika tidak masuk kondisi di atas (seharusnya tidak terjadi jika semua gap tercover)
    }


    public function index() // Mengubah nama method menjadi index agar sesuai dengan Route::resource
    {
        $alternatifs = Alternatif::orderBy('kode')->get(); // Urutkan agar konsisten
        $aspeks = Aspek::orderBy('kode')->get(); // Urutkan

        // Jika tidak ada alternatif atau aspek, mungkin lebih baik langsung return view dengan pesan
        if ($alternatifs->isEmpty() || $aspeks->isEmpty()) {
            // Anda bisa mengirimkan pesan ke view
            return view('perhitungan', [
                'rankingData' => [],
                'arrayHitung' => [],
                'message' => 'Data alternatif atau aspek belum lengkap untuk melakukan perhitungan.'
            ]);
        }


        $arrayHitung = []; // Untuk detail perhitungan per aspek

        foreach ($aspeks as $aspek) {
            // Jika aspek tidak memiliki persentase, lewati atau beri nilai default
            $persentaseAspek = $aspek->persentase ?? 0;
            if ($persentaseAspek <= 0) {
                 // Anda bisa skip aspek ini atau log warning
                 // continue; // Untuk skip
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

            // Jika tidak ada kriteria untuk aspek ini, lanjutkan ke aspek berikutnya
            if ($kriteriaForThisAspek->isEmpty()) {
                // Isi data alternatif dengan nilai 0 agar struktur tetap sama
                foreach($alternatifs as $alternatif){
                    $hitungPerAspek['Data'][] = [
                        'Alternatif' => $alternatif,
                        'Profile' => [],
                        'NCF' => 0,
                        'NSF' => 0,
                        'Total' => 0, // Total nilai untuk aspek ini 0
                    ];
                }
                $arrayHitung[] = $hitungPerAspek;
                continue; // Lanjut ke aspek berikutnya
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
                    // Cari profile yang sesuai untuk kriteria ini
                    $profileMatch = $profiles->firstWhere('id_kriteria', $kriteriaItem->id);

                    $nilaiKriteria = $kriteriaItem->nilai; // Nilai target kriteria
                    $nilaiProfile = $profileMatch ? $profileMatch->nilai_profile : 0; // Jika tidak ada nilai profile, anggap 0 atau handle sesuai aturan
                    $factor = $kriteriaItem->factor; // Factor dari kriteria (1=core, 2=secondary)

                    $gap = $nilaiProfile - $nilaiKriteria;
                    $bobot = $this->getBobot($gap);

                    $profileData[] = [
                        'key' => $kriteriaItem->kode,
                        'value' => $kriteriaItem->nama_kriteria ?? $kriteriaItem->nama, // Sesuaikan
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

                // Sesuaikan bobot NCF dan NSF jika ada aturan spesifik di sistem Anda (misal 60% NCF, 40% NSF)
                // Jika tidak ada aturan spesifik pembobotan NCF dan NSF, Anda bisa langsung menjumlahkannya atau merata-ratakannya
                // Untuk contoh Anda: (0.6 * $NCF) + (0.4 * $NSF)
                $totalNilaiAlternatifPerAspek = (0.6 * $NCF) + (0.4 * $NSF);

                $hitungPerAspek['Data'][] = [
                    'Alternatif' => $alternatif,
                    'ProfileDetail' => $profileData, // Ganti nama agar lebih jelas
                    'NCF' => round($NCF, 4),
                    'NSF' => round($NSF, 4),
                    'TotalNilaiAlternatifPerAspek' => round($totalNilaiAlternatifPerAspek, 4),
                ];
            }
            $arrayHitung[] = $hitungPerAspek;
        }

        // Menghitung total ranking akhir per alternatif
        $rankingData = [];
        foreach ($alternatifs as $alternatif) {
            $totalScoreAkhir = 0;
            foreach ($arrayHitung as $perhitunganPerAspek) {
                foreach ($perhitunganPerAspek['Data'] as $dataAlternatifDiAspek) {
                    if ($dataAlternatifDiAspek['Alternatif']->id == $alternatif->id) {
                        // Kalikan nilai total alternatif di aspek tersebut dengan bobot persentase aspek
                        $bobotAspekDecimal = ($perhitunganPerAspek['Aspek']['nilai_persen'] ?? 0) / 100;
                        $totalScoreAkhir += $dataAlternatifDiAspek['TotalNilaiAlternatifPerAspek'] * $bobotAspekDecimal;
                    }
                }
            }
            $rankingData[] = [
                'Alternatif' => $alternatif,
                'Score' => $totalScoreAkhir, // Tidak perlu round di sini jika ingin presisi, round di view saja
            ];
        }

        // Sorting ranking descending berdasarkan Score
        usort($rankingData, function ($a, $b) {
            return $b['Score'] <=> $a['Score']; // Untuk PHP 7+
            // Untuk PHP < 7: return $b['Score'] > $a['Score'] ? 1 : ($b['Score'] < $a['Score'] ? -1 : 0);
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
        unset($item); // Penting untuk unset reference setelah loop

        // Jika Anda ingin log atau debug
        // \Log::info('Ranking Data:', $rankingData);
        // \Log::info('Array Hitung Detail:', $arrayHitung);

        return view('perhitungan', compact('rankingData', 'arrayHitung'));
    }
}
