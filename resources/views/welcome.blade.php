<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beranda - SahabatPNJ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    .navbar-brand-custom {
      font-weight: 700;
      font-size: 1.75rem;
    }
    .navbar-brand-custom .pnj-text {
      color: #e9ecef;
    }

    .header-custom {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .hero-section {
      background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.05) 0%, rgba(var(--bs-light-rgb),0.1) 100%);
      padding: 4rem 0;
    }

    .hero-section h2 {
      font-weight: 700;
      font-size: 2.5rem;
    }
    .hero-section .btn-start {
      padding: 0.75rem 2rem;
      font-weight: 600;
      border-radius: 50px;
      transition: all 0.3s ease;
    }
    .hero-section .btn-start:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(var(--bs-primary-rgb), 0.4);
    }
    .hero-illustration {
      max-width: 350px;
      animation: floatAnimation 3s ease-in-out infinite;
    }

    @keyframes floatAnimation {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .fitur-section {
      padding: 4rem 0;
    }

    .fitur-section-title {
      margin-bottom: 3rem !important;
      font-weight: 700;
    }

    .fitur-card {
      position: relative;
      overflow: hidden;
      color: white;
      font-weight: 600;
      padding: 2.5rem 1.5rem;
      text-align: center;
      text-decoration: none;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      border-radius: 0.75rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      min-height: 200px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .fitur-card:hover {
      transform: translateY(-10px) scale(1.03);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .fitur-card .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0.3;
      z-index: 1;
      background-size: cover;
      background-position: center;
      transition: opacity 0.3s ease;
    }

    .fitur-card:hover .overlay {
      opacity: 0.5;
    }

    .fitur-card .icon {
      font-size: 2.5rem;
      margin-bottom: 0.75rem;
      position: relative;
      z-index: 2;
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }
    .fitur-card:hover .icon {
        opacity: 1;
    }

    .fitur-card .text {
      position: relative;
      z-index: 2;
      font-size: 1.25rem;
    }

    .card-tentang {
      background: linear-gradient(135deg, #ffc107, #ff9800);
    }
    .card-calon {
      background: linear-gradient(135deg, #17a2b8, #007bff);
    }
    .card-hitung {
      background: linear-gradient(135deg, #dc3545, #c82333);
    }
    .footer-custom {
      background-color: #343a40;
      color: #adb5bd;
      padding-top: 3rem;
      padding-bottom: 3rem;
    }
    .footer-custom .brand-footer {
      font-weight: 700;
      font-size: 1.75rem;
      color: #f8f9fa;
    }
    .footer-custom .brand-footer .pnj-text {
      color: #6c757d;
    }
    .footer-custom .social-icons a {
      color: #adb5bd;
      font-size: 1.5rem;
      transition: color 0.3s ease;
    }
    .footer-custom .social-icons a:hover {
      color: #f8f9fa;
    }
    .footer-custom .form-control-footer {
      background-color: #495057;
      border-color: #6c757d;
      color: #f8f9fa;
    }
    .footer-custom .form-control-footer::placeholder {
      color: #adb5bd;
    }
    .footer-custom .btn-footer-search {
      background-color: var(--bs-primary);
      border-color: var(--bs-primary);
      color: white;
    }
    .footer-custom .footer-links a {
        color: #adb5bd;
        text-decoration: none;
    }
    .footer-custom .footer-links a:hover {
        color: #f8f9fa;
        text-decoration: underline;
    }
    .footer-custom .copyright-text {
        font-size: 0.9rem;
    }

  </style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>
<body>
  <!-- Header -->
  <header class="bg-primary text-white px-4 py-3 d-flex justify-content-between align-items-center header-custom">
    <img src="{{ asset('assets/images/logo-spnj.png') }}" width="200px" alt="">
    <ul class="navbar-nav ms-auto">
        @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-light text-primary fw-semibold rounded-pill px-3">LOGIN</a>
            </li>
        @else

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-semibold" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::user()->role && strtolower(Auth::user()->role->name) === 'admin')
                        Dashboard Admin ({{ Auth::user()->name }})
                    @elseif (Auth::user()->role && strtolower(Auth::user()->role->name) === 'user')
                        Selamat Datang, {{ Auth::user()->name }}
                    @else
                        {{ Auth::user()->name }}
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    @if (Auth::user()->role && strtolower(Auth::user()->role->name) === 'admin')
                        <li><a class="dropdown-item" href="{{ route('admin.alternatif.index') }}"> Dashboard Admin</a></li>
                    @endif
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
    </ul>
  </header>
  <!-- Hero -->
  <section class="container-fluid hero-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
          <h2 class="text-primary">SPNJ Leader Selector — Pilih Pemimpin, Tentukan Masa Depan!</h2>
          <p class="mt-3 text-secondary fs-5">Bingung memilih calon ketua organisasi terbaik? Jangan khawatir! Sistem ini membantu kamu mengambil keputusan tepat dengan data dan analisis cerdas.</p>
           @guest
                <a href="/login" class="btn btn-primary mt-3 btn-start">
                    <i class="bi bi-rocket-launch me-2"></i>START SEKARANG
                </a>
            @else
                <a href="{{ route('welcome') }}#fitur" class="btn btn-primary mt-3 btn-start">
                    <i class="bi bi-rocket-launch me-2"></i>LIHAT LEBIH LENGKAP
                </a>
            @endguest
        </div>
        <div class="col-md-6 text-center">
       <img  src="{{ asset('assets/images/ilustrasi.svg') }}" alt="Ilustrasi Pengambilan Keputusan" class="img-fluid hero-illustration">
        </div>
      </div>
    </div>
  </section>
  @auth
   <section class="bg-light py-5 fitur-section" id="fitur">
        <div class="container text-center">
        <h3 class="fitur-section-title text-dark">Jelajahi Fitur Utama Sistem Pendukung Keputusan <span class="text-primary">SPNJ</span></h3>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 col-sm-6">
            {{-- Tambahkan atribut data-bs-* dan data-fitur --}}
            <a href="#" class="fitur-card card-tentang" data-bs-toggle="modal" data-bs-target="#fiturModal" data-fitur="tentang">
                <div class="overlay" style="background-image: url('/images/bg-tentang.jpg');"></div>
                <div class="icon"><i class="bi bi-info-circle-fill"></i></div>
                <div class="text">TENTANG KAMI</div>
            </a>
            </div>
            <div class="col-md-4 col-sm-6">
            <a href="#" class="fitur-card card-calon" data-bs-toggle="modal" data-bs-target="#fiturModal" data-fitur="calon">
                <div class="overlay" style="background-image: url('/images/bg-calon.jpg');"></div>
                <div class="icon"><i class="bi bi-people-fill"></i></div>
                <div class="text">CALON KETUA</div>
            </a>
            </div>
            <div class="col-md-4 col-sm-6">
            <a href="#" class="fitur-card card-hitung" data-bs-toggle="modal" data-bs-target="#fiturModal" data-fitur="perhitungan">
                <div class="overlay" style="background-image: url('/images/bg-hitung.jpg');"></div>
                <div class="icon"><i class="bi bi-calculator-fill"></i></div>
                <div class="text">PERHITUNGAN</div>
            </a>
            </div>
        </div>
        </div>
    </section>
  @endauth
  <!-- Footer -->
  <footer class="footer-custom text-center">
    <div class="container">
      <h1 class="brand-footer mb-3">Sahabat<span class="pnj-text">PNJ</span></h1>
      <div class="mb-4 social-icons">
        <a href="#" class="mx-2"><i class="bi bi-instagram"></i></a>
        <a href="#" class="mx-2"><i class="bi bi-facebook"></i></a>
        <a href="#" class="mx-2"><i class="bi bi-envelope-fill"></i></a>
        <a href="#" class="mx-2"><i class="bi bi-twitter-x"></i></a>
      </div>
      <div class="row justify-content-center mb-4">
        <div class="col-lg-6">
          <form class="d-flex">
            <input type="text" class="form-control form-control-footer me-2" placeholder="Cari informasi...">
            <button class="btn btn-footer-search" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>
      </div>
      <div class="mb-3 footer-links">
        <a href="#" class="mx-2">Terms & Conditions</a> |
        <a href="#" class="mx-2">Privacy Policy</a> |
        <a href="#" class="mx-2">Hubungi Kami</a>
      </div>
      <p class="copyright-text mb-0">© <script>document.write(new Date().getFullYear());</script> SPNJ DSS. All rights reserved.</p>
      <p class="copyright-text mb-0">Site by Tim Pengembang SPNJ.</p>
    </div>
  </footer>

      <!-- Modal Umum -->
    <div class="modal fade" id="fiturModal" tabindex="-1" aria-labelledby="fiturModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="fiturModalLabel">Detail Fitur</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="fiturModalBody">
            {{-- Konten modal akan dimuat di sini oleh JavaScript --}}
            <div class="text-center py-5"> {/* Tambahkan padding agar spinner lebih terlihat bagus */}
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"> {/* Buat spinner sedikit lebih besar */}
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Memuat data...</p> {/* Tambahkan teks di bawah spinner */}
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
    </div>

    {{-- TAMBAHKAN JQUERY DI SINI --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            var fiturModalEl = document.getElementById('fiturModal');
            if (fiturModalEl) {
                var fiturModal = new bootstrap.Modal(fiturModalEl);
                var modalTitle = $('#fiturModalLabel');
                var modalBody = $('#fiturModalBody');
                const loadingSpinner = `
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Memuat data...</p>
                    </div>`;

                $('.fitur-card').on('click', function(e) {
                    e.preventDefault();
                    var fitur = $(this).data('fitur');

                    modalBody.html(loadingSpinner);
                    switch (fitur) {
                        case 'tentang':
                            modalTitle.text('Tentang Kami');
                            modalBody.html(`
                                <div class="p-3">
                                    <h4>Selamat Datang di SPNJ!</h4>
                                    <p>SPNJ DSS (Sistem Pendukung Keputusan Pemilihan Ketua SPNJ. SPNJ DSS adalah sebuah platform inovatif yang dirancang untuk membantu Anda dalam proses pengambilan keputusan yang objektif dan transparan dalam memilih ketua KSM SPNJ.</p>
                                    <p>Kami menggunakan metode Profile Matching yang telah teruji untuk menganalisis profil calon berdasarkan kriteria-kriteria yang telah ditetapkan. Sistem kami akan memberikan rekomendasi calon terbaik berdasarkan perhitungan yang komprehensif.</p>
                                    <h5>Fitur Utama:</h5>
                                    <ul>
                                        <li>Manajemen data calon ketua.</li>
                                        <li>Definisi aspek dan kriteria penilaian yang fleksibel.</li>
                                        <li>Input nilai profil calon terhadap setiap kriteria.</li>
                                        <li>Perhitungan otomatis menggunakan metode Profile Matching.</li>
                                        <li>Hasil perangkingan calon yang jelas dan mudah dipahami.</li>
                                        <li>Transparansi proses perhitungan.</li>
                                    </ul>
                                    <p>Kami berharap SPNJ dapat menjadi alat yang bermanfaat bagi organisasi Anda.</p>
                                </div>
                            `);
                            fiturModal.show();
                            break;

                        case 'calon':
                            modalTitle.text('Daftar Calon Ketua');

                            $.ajax({
                                url: '{{ route("api.calon.list") }}',
                                method: 'GET',
                                success: function(response) {
                                    if (response.success && response.data && response.data.length > 0) {
                                        let content = '<ul class="list-group list-group-flush">';
                                        response.data.forEach(function(calon) {
                                            content += `
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5 class="mb-1">${calon.nama_alternatif || calon.nama}</h5>
                                                        <small class="text-muted">Kode: ${calon.kode}</small>
                                                    </div>
                                                    ${calon.skor_akhir !== null && calon.skor_akhir !== undefined ? '<span class="badge bg-primary rounded-pill fs-6">Skor: ' + parseFloat(calon.skor_akhir).toFixed(2) + '</span>' : '<span class="badge bg-secondary rounded-pill">Belum ada skor</span>'}
                                                </li>
                                            `;
                                        });
                                        content += '</ul>';
                                        modalBody.html(content);
                                    } else {
                                        modalBody.html('<p class="text-center p-3">Belum ada data calon ketua atau data tidak ditemukan.</p>');
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("AJAX Error Calon: ", textStatus, errorThrown, jqXHR.responseText);
                                    modalBody.html('<p class="text-center text-danger p-3">Gagal memuat data calon ketua. Silakan coba lagi.</p>');
                                },
                                complete: function(){
                                    fiturModal.show();
                                }
                            });
                            break;

                        case 'perhitungan':
                            modalTitle.text('Hasil dan Detail Perhitungan');
                            $.ajax({
                                url: '{{ route("api.perhitungan.detail") }}',
                                method: 'GET',
                                success: function(response) {
                                    if (response.success && response.data) {
                                        let content = '<div class="p-3">';

                                        // Bagian Ranking
                                        if (response.data.ranking && response.data.ranking.length > 0) {
                                            content += '<h4>Hasil Perangkingan Akhir</h4>';
                                            content += '<div class="table-responsive mb-4"><table class="table table-sm table-striped table-bordered">';
                                            content += '<thead class="table-dark"><tr><th>Rank</th><th>Kode</th><th>Nama Calon</th><th>Skor Akhir</th></tr></thead><tbody>';
                                            response.data.ranking.forEach(function(item) {
                                                content += `
                                                    <tr>
                                                        <td class="text-center"><strong>${item.Rank}</strong></td>
                                                        <td>${item.Alternatif.kode}</td>
                                                        <td>${item.Alternatif.nama_alternatif || item.Alternatif.nama}</td>
                                                        <td class="text-end">${parseFloat(item.Score).toFixed(4)}</td>
                                                    </tr>
                                                `;
                                            });
                                            content += '</tbody></table></div>';

                                            // Bagian Grafik (Chart.js)
                                            content += '<h4>Grafik Skor Akhir Calon</h4>';
                                            content += '<div style="max-width: 600px; margin: 20px auto;"><canvas id="rankingChart"></canvas></div><hr class="my-4">';

                                        } else {
                                            content += '<p>Belum ada data perangkingan.</p><hr class="my-4">';
                                        }

                                        // Bagian Detail Perhitungan Per Aspek
                                        if (response.data.detail && response.data.detail.length > 0) {
                                            content += '<h4>Detail Perhitungan per Aspek</h4>';
                                            response.data.detail.forEach(function(aspekData, indexAspek) {
                                                content += `
                                                    <div class="accordion mb-3" id="accordionAspek${indexAspek}">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingAspek${indexAspek}">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAspek${indexAspek}" aria-expanded="false" aria-controls="collapseAspek${indexAspek}">
                                                                    <strong>Aspek: ${aspekData.Aspek.value} (${aspekData.Aspek.key})</strong> - Bobot: ${aspekData.Aspek.nilai_persen}%
                                                                </button>
                                                            </h2>
                                                            <div id="collapseAspek${indexAspek}" class="accordion-collapse collapse" aria-labelledby="headingAspek${indexAspek}" data-bs-parent="#accordionParent"> <!-- Ganti data-bs-parent jika perlu -->
                                                                <div class="accordion-body">
                                                `;
                                                if (aspekData.Data && aspekData.Data.length > 0) {
                                                    content += '<div class="table-responsive"><table class="table table-sm table-bordered" style="font-size: 0.85rem;">';
                                                    content += '<thead class="table-light"><tr><th>Alternatif</th>';
                                                    // Header Kriteria
                                                    if (aspekData.Data[0].ProfileDetail && aspekData.Data[0].ProfileDetail.length > 0) {
                                                        aspekData.Data[0].ProfileDetail.forEach(function(kriteria) {
                                                            content += `<th class="text-center" title="${kriteria.value} (Target: ${kriteria.nilai_kriteria_target})">${kriteria.key}</th>`;
                                                        });
                                                    }
                                                    content += '<th class="text-center">NCF</th><th class="text-center">NSF</th><th class="text-center">Total Nilai Aspek</th></tr></thead><tbody>';

                                                    // Body tabel detail
                                                    aspekData.Data.forEach(function(altData) {
                                                        content += `<tr><td>${altData.Alternatif.nama_alternatif || altData.Alternatif.nama}</td>`;
                                                        if (altData.ProfileDetail && altData.ProfileDetail.length > 0) {
                                                            altData.ProfileDetail.forEach(function(kriteria) {
                                                                content += `<td class="text-center" title="Nilai: ${kriteria.nilai_profile_alternatif}, Gap: ${kriteria.gap}, Bobot: ${kriteria.bobot_gap}">${kriteria.bobot_gap} ${kriteria.factor == 1 ? '<span class="badge bg-primary text-white">C</span>' : '<span class="badge bg-info text-dark">S</span>'}</td>`; // Tambahkan text-white/dark agar terbaca
                                                            });
                                                        } else {
                                                            let colspanCount = (aspekData.Data[0].ProfileDetail || []).length > 0 ? (aspekData.Data[0].ProfileDetail || []).length : 1;
                                                            content += `<td colspan="${colspanCount}" class="text-center text-muted">-</td>`;
                                                        }
                                                        content += `<td class="text-center">${parseFloat(altData.NCF).toFixed(2)}</td>`;
                                                        content += `<td class="text-center">${parseFloat(altData.NSF).toFixed(2)}</td>`;
                                                        content += `<td class="text-center fw-bold">${parseFloat(altData.TotalNilaiAlternatifPerAspek).toFixed(2)}</td></tr>`;
                                                    });
                                                    content += '</tbody></table></div>';
                                                } else {
                                                    content += '<p>Tidak ada data detail untuk aspek ini.</p>';
                                                }
                                                content += '</div></div></div></div>'; // End accordion
                                            });
                                        } else {
                                            content += '<p>Belum ada detail perhitungan per aspek.</p>';
                                        }

                                        content += '</div>'; // End p-3
                                        modalBody.html(content);

                                        // Inisialisasi Chart setelah konten dimuat
                                        if (response.data.ranking && response.data.ranking.length > 0) {
                                            renderRankingChart(response.data.ranking);
                                        }

                                    } else {
                                        modalBody.html('<p class="text-center p-3">Gagal memuat data perhitungan atau data tidak lengkap.</p>');
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("AJAX Error Perhitungan: ", textStatus, errorThrown, jqXHR.responseText);
                                    modalBody.html('<p class="text-center text-danger p-3">Gagal memuat data perhitungan. Silakan coba lagi.</p>');
                                },
                                complete: function(){
                                    fiturModal.show(); // Tampilkan modal setelah AJAX selesai
                                }
                            });
                            break;

                        default:
                            modalTitle.text('Informasi Fitur');
                            modalBody.html('<p class="text-center p-3">Fitur tidak dikenal.</p>');
                            fiturModal.show(); // Tampilkan modal
                    }
                });

                function renderRankingChart(rankingData) {
                    const canvasElement = document.getElementById('rankingChart');
                    if (!canvasElement) {
                        console.error("Canvas element 'rankingChart' not found in modal.");
                        return;
                    }
                    const ctx = canvasElement.getContext('2d');


                    const labels = rankingData.map(item => item.Alternatif.nama_alternatif || item.Alternatif.nama);
                    const scores = rankingData.map(item => item.Score);

                    // Hancurkan chart lama jika ada untuk mencegah duplikasi saat modal dibuka berkali-kali
                    let chartStatus = Chart.getChart(canvasElement); // Berikan elemen canvas atau ID
                    if (chartStatus != undefined) {
                        chartStatus.destroy();
                    }

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Skor Akhir',
                                data: scores,
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.7)', 'rgba(255, 99, 132, 0.7)',
                                    'rgba(75, 192, 192, 0.7)', 'rgba(255, 206, 86, 0.7)',
                                    'rgba(153, 102, 255, 0.7)', 'rgba(255, 159, 64, 0.7)'
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)',
                                    'rgba(75, 192, 192, 1)', 'rgba(255, 206, 86, 1)',
                                    'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: true,
                            scales: {
                                y: { beginAtZero: true, title: { display: true, text: 'Skor'}},
                                x: { title: { display: true, text: 'Calon Ketua'}}
                            },
                            plugins: {
                                legend: { display: true, position: 'top'},
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) { label += ': '; }
                                            if (context.parsed.y !== null) { label += parseFloat(context.parsed.y).toFixed(4); }
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            } else {
                console.error("Modal element with ID 'fiturModal' not found.");
            }
        });
    </script>

</body>
</html>

</body>
</html>
