<?php

namespace App\Http\Controllers\Api; // Sesuaikan namespace jika perlu

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Aspek; // Jika dibutuhkan untuk detail
use App\Models\Kriteria; // Jika dibutuhkan untuk detail
use App\Models\Profile; // Jika dibutuhkan untuk detail
use Illuminate\Http\Request;

// Impor PerhitunganController Anda jika ingin menggunakan logikanya kembali
use App\Http\Controllers\PerhitunganController;


class FiturInfoController extends Controller
{
    public function getCalonList()
    {
        try {
            // Kita perlu mengambil data skor akhir jika sudah ada
            // Ini asumsi Anda memiliki logika untuk mendapatkan skor akhir per alternatif.
            // Jika skor akhir berasal dari tabel 'rankingData' di PerhitunganController, kita perlu cara untuk mengaksesnya.
            // Untuk sementara, kita ambil alternatif dan coba cari skor dari hasil perhitungan yang sama.

            // Panggil logika perhitungan untuk mendapatkan data ranking
            // Ini mungkin kurang efisien jika dipanggil berkali-kali. Pertimbangkan caching.
            $perhitunganCtrl = new PerhitunganController();
            // Untuk memanggil method non-static, kita butuh instance.
            // Method index di PerhitunganController Anda sekarang yang melakukan perhitungan.
            // Kita butuh cara untuk mendapatkan HANYA $rankingData dari sana.
            // Mari kita asumsikan kita bisa mendapatkan rankingData.

            // Cara 1: Panggil langsung logika inti perhitungan (lebih baik jika dipisahkan jadi service)
            // atau
            // Cara 2: Modifikasi PerhitunganController untuk mengembalikan data mentah
            // Untuk saat ini, kita coba replikasi bagian kecil untuk mendapatkan skor.
            // INI ADALAH PENYEDERHANAAN. Idealnya, Anda punya service/helper untuk ini.

            $alternatifs = Alternatif::orderBy('kode')->get();
            $rankingDataFromCalc = $this->getRankingDataOnly(); // Fungsi helper di bawah

            $dataCalon = $alternatifs->map(function ($alternatif) use ($rankingDataFromCalc) {
                $skorItem = collect($rankingDataFromCalc)->firstWhere('Alternatif.id', $alternatif->id);
                return [
                    'id' => $alternatif->id,
                    'kode' => $alternatif->kode,
                    'nama_alternatif' => $alternatif->nama_alternatif ?? $alternatif->nama,
                    'skor_akhir' => $skorItem ? $skorItem['Score'] : null, // Skor bisa null jika belum dihitung
                ];
            });

            return response()->json(['success' => true, 'data' => $dataCalon]);

        } catch (\Exception $e) {
            // Log::error("Error getCalonList: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal mengambil data calon.'], 500);
        }
    }

    public function getPerhitunganDetail()
    {
        try {
            // Panggil method index dari PerhitunganController untuk mendapatkan data
            // Karena method index() di PerhitunganController me-return view,
            // kita perlu mengekstrak data $rankingData dan $arrayHitung dari sana.
            // Ini adalah cara yang kurang ideal. Idealnya, logika perhitungan ada di service/class terpisah.

            // Alternatif: Replikasi logika perhitungan di sini atau buat method helper di PerhitunganController
            // yang mengembalikan data array saja.

            // Untuk contoh, kita akan mencoba memanggil logika inti yang sama
            // seperti di PerhitunganController->index() tapi hanya mengembalikan array.

            $perhitunganData = $this->runFullCalculation(); // Fungsi helper di bawah

            return response()->json([
                'success' => true,
                'data' => [
                    'ranking' => $perhitunganData['rankingData'],
                    'detail' => $perhitunganData['arrayHitung'],
                ]
            ]);

        } catch (\Exception $e) {
            // \Log::error("Error getPerhitunganDetail: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal mengambil detail perhitungan.'], 500);
        }
    }


    // HELPER FUNCTIONS (Ini adalah replikasi dari PerhitunganController, idealnya ini ada di service)
    // Anda harus memastikan fungsi getBobot juga tersedia atau di-copy ke sini.

    private function getBobot($gap) {
        if ($gap == 0) return 5;
        if ($gap == 1) return 4.5;
        if ($gap == -1) return 4;
        if ($gap == 2) return 3.5;
        if ($gap == -2) return 3;
        if ($gap == 3) return 2.5;
        if ($gap == -3) return 2;
        if ($gap == 4) return 1.5;
        if ($gap == -4) return 1;
        if ($gap > 4) return 1;
        if ($gap < -4) return 1;
        return 1;
    }

    private function getRankingDataOnly() {
        // Ini hanya bagian ranking dari runFullCalculation
        $fullData = $this->runFullCalculation();
        return $fullData['rankingData'];
    }

    private function runFullCalculation() {
        // SALIN SEMUA LOGIKA DARI PerhitunganController::index() KE SINI
        // DARI MULAI $alternatifs = Alternatif::... SAMPAI SEBELUM return view(...)
        // DAN DI AKHIR, KEMBALIKAN ARRAY: return ['rankingData' => $rankingData, 'arrayHitung' => $arrayHitung];

        $alternatifs = Alternatif::orderBy('kode')->get();
        $aspeks = Aspek::orderBy('kode')->get();

        if ($alternatifs->isEmpty() || $aspeks->isEmpty()) {
            return ['rankingData' => [], 'arrayHitung' => []];
        }

        $arrayHitung = [];

        foreach ($aspeks as $aspek) {
            $persentaseAspek = $aspek->persentase ?? 0;
            $hitungPerAspek = [
                'Aspek' => [
                    'key' => $aspek->kode,
                    'value' => $aspek->nama_aspek ?? $aspek->nama,
                    'nilai_persen' => $persentaseAspek,
                ],
                'Data' => []
            ];
            $kriteriaForThisAspek = Kriteria::where('id_aspek', $aspek->id)->orderBy('kode')->get();

            if ($kriteriaForThisAspek->isEmpty()) {
                 foreach($alternatifs as $alternatif){
                    $hitungPerAspek['Data'][] = [
                        'Alternatif' => $alternatif,
                        'ProfileDetail' => [],
                        'NCF' => 0,
                        'NSF' => 0,
                        'TotalNilaiAlternatifPerAspek' => 0,
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
                    })->get();

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
                    if ($factor == 1) {
                        $coreF_bobot_sum += $bobot; $count_core_factors++;
                    } elseif ($factor == 2) {
                        $secondaryF_bobot_sum += $bobot; $count_secondary_factors++;
                    }
                }
                $NCF = ($count_core_factors == 0) ? 0 : $coreF_bobot_sum / $count_core_factors;
                $NSF = ($count_secondary_factors == 0) ? 0 : $secondaryF_bobot_sum / $count_secondary_factors;
                $totalNilaiAlternatifPerAspek = (0.6 * $NCF) + (0.4 * $NSF);

                $hitungPerAspek['Data'][] = [
                    'Alternatif' => $alternatif,
                    'ProfileDetail' => $profileData,
                    'NCF' => $NCF,
                    'NSF' => $NSF,
                    'TotalNilaiAlternatifPerAspek' => $totalNilaiAlternatifPerAspek,
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
            $rankingData[] = ['Alternatif' => $alternatif, 'Score' => $totalScoreAkhir];
        }
        usort($rankingData, function ($a, $b) { return $b['Score'] <=> $a['Score']; });
        $currentRank = 1; $previousScore = null;
        foreach ($rankingData as $index => &$item) {
            if ($previousScore !== null && $item['Score'] < $previousScore) { $currentRank = $index + 1; }
            $item['Rank'] = $currentRank; $previousScore = $item['Score'];
        }
        unset($item);

        return ['rankingData' => $rankingData, 'arrayHitung' => $arrayHitung];
    }
}
