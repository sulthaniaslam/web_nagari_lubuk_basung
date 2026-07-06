<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- --- SEO DASAR --- -->
    <title>Website Nagari Lubuk Basung</title>
    <meta name="description" content="Website Nagari Lubuk Basung Kabupaten Agam Sumatera Barat">
    <meta name="keywords" content="website, nagari, lubukbasung, agam, sumatera barat">
    <meta name="author" content="Diskominfo Agam">
    <link rel="canonical" href="https://www.nagarilubukbasung.agamkab.go.id/halaman-ini"> <!-- Mencegah duplikasi konten -->

    <!-- --- ROBOTS (Mengatur Cara Google Mengindeks) --- -->
    <meta name="robots" content="index, follow"> <!-- Mengizinkan Google mengindeks halaman dan mengikuti link -->

    <!-- --- OPEN GRAPH (Untuk Tampilan Share di WhatsApp, Facebook, LinkedIn) --- -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.nagarilubukbasung.agamkab.go.id/halaman-ini">
    <meta property="og:title" content="Website Nagari Lubuk Basung">
    <meta property="og:description" content="Website Nagari Lubuk Basung Kabupaten Agam Sumatera Barat">
    <meta property="og:image" content="https://www.nagarilubukbasung.agamkab.go.id/images/thumbnail-share.jpg"> <!-- Ukuran ideal 1200x630 pixel -->

    <!-- --- TWITTER CARD (Untuk Tampilan Share di X / Twitter) --- -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://www.nagarilubukbasung.agamkab.go.id/halaman-ini">
    <meta name="twitter:title" content="Website Nagari Lubuk Basung">
    <meta name="twitter:description" content="Twitter Nagari Lubuk Basung">
    <meta name="twitter:image" content="https://www.nagarilubukbasung.agamkab.go.id/images/thumbnail-share.jpg">

    <!-- --- FAVICON (Logo Kecil di Tab Browser) --- -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- --- SCHEMA MARKUP / STRUCTURED DATA (Membuat Google Paham Jenis Web Anda) --- -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Nagari Lubuk Basung",
      "url": "https://www.nagarilubukbasung.agamkab.go.id/",
      "description": "Website Nagari Lubuk Basung Kabupaten Agam Sumatera Barat"
    }
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <style>
      /* --- Gaya Widget Aksesibilitas --- */
      /* --- Gaya Widget Aksesibilitas di Sebelah Kiri --- */
      .accessibility-toggle {
          position: fixed;
          bottom: 20px;
          left: 20px; /* Diubah dari right ke left */
          background: #0056b3;
          color: white;
          border: none;
          border-radius: 50%;
          width: 60px;
          height: 60px;
          font-size: 24px;
          cursor: pointer;
          box-shadow: 0 4px 10px rgba(0,0,0,0.3);
          z-index: 9999;
      }

      .accessibility-panel {
          position: fixed;
          bottom: 90px;
          left: 20px; /* Diubah dari right ke left */
          background: white;
          border: 2px solid #ccc;
          border-radius: 8px;
          padding: 15px;
          width: 280px;
          box-shadow: 0 4px 15px rgba(0,0,0,0.2);
          display: none;
          z-index: 9999;
          color: #333 !important;
      }

      .accessibility-panel.active {
          display: block;
      }
      .accessibility-panel h3 {
          margin-top: 0;
          border-bottom: 1px solid #eee;
          padding-bottom: 8px;
          font-size: 18px;
      }
      .acc-group {
          margin-bottom: 15px;
      }
      .acc-group label {
          display: block;
          font-weight: bold;
          font-size: 14px;
          margin-bottom: 5px;
      }
      .acc-btn-grid {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 8px;
      }
      .acc-btn {
          padding: 8px;
          background: #f0f0f0;
          border: 1px solid #bbb;
          border-radius: 4px;
          cursor: pointer;
          font-size: 13px;
          transition: background 0.2s;
      }
      .acc-btn:hover, .acc-btn.active {
          background: #ddd;
          border-color: #333;
      }
      .acc-btn.active {
          background: #0056b3;
          color: white;
      }

      /* --- CSS Modifiers untuk Fitur Disabilitas --- */
      /* Kontras Tinggi & Invert */
      body.acc-high-contrast {
          background-color: #000 !important;
          color: #fff !important;
      }
      body.acc-high-contrast a, body.acc-high-contrast button {
          color: #00ff00 !important;
      }
      body.acc-invert {
          filter: invert(1) hue-rotate(180deg);
      }
      body.acc-monochrome {
          filter: grayscale(100%);
      }

      /* Kursor Besar */
      body.acc-big-cursor, body.acc-big-cursor * {
          cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path d="M0,0 L0,24 L6,18 L12,30 L16,28 L10,16 L18,16 Z" fill="black" stroke="white" stroke-width="2"/></svg>'), auto !important;
      }

      /* Sorot Teks (Highlight) */
      body.acc-highlight-hover p:hover, 
      body.acc-highlight-hover h1:hover, 
      body.acc-highlight-hover h2:hover, 
      body.acc-highlight-hover li:hover {
          background-color: yellow !important;
          color: black !important;
      }


      /* Container Utama */
      .footer-social-group {
        display: flex;
        flex-wrap: wrap;
      }

      /* Gaya Dasar Tombol Sosial Media */
      .social-glow-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background-color: #ffffff;
        color: #64748b; /* Warna abu-abu dasar */
        font-size: 1.15rem;
        text-decoration: none;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
      }

      /* Efek Hover Secara Umum */
      .social-glow-btn:hover {
        transform: translateY(-4px);
        color: #ffffff !important;
      }

      /* Warna & Efek Cahaya Spesifik per Media Sosial */
      .fb-glow:hover {
        background-color: #1877f2;
        box-shadow: 0 10px 15px -3px rgba(24, 119, 242, 0.4), 0 4px 6px -4px rgba(24, 119, 242, 0.4);
      }

      .ig-glow:hover {
        background: linear-gradient(45deg, #f9ce34, #ee2a7b, #6228d7);
        box-shadow: 0 10px 15px -3px rgba(238, 42, 123, 0.4), 0 4px 6px -4px rgba(238, 42, 123, 0.4);
      }

      .tt-glow:hover {
        background-color: #000000;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -4px rgba(0, 0, 0, 0.3);
      }

      .yt-glow:hover {
        background-color: #ff0000;
        box-shadow: 0 10px 15px -3px rgba(255, 0, 0, 0.4), 0 4px 6px -4px rgba(255, 0, 0, 0.4);
      }

      .default-glow:hover {
        background-color: #4f46e5;
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4);
      }
    </style>

  </head>
  <body>

    <nav class="navbar navbar-expand-lg fixed-top smart-navbar animate__animated animate__fadeInDown">
      <div class="container">
        <a class="navbar-brand-pro" href="{{ url('/') }}">
          <div class="brand-icon-wrapper">
            <i class="fa-solid fa-landmark-dome"></i>
          </div>
          <div class="brand-text">
            WEBSITE<span class="text-crimson">{{ $data['nama_instansi'] }}</span>
            <small>Portal Resmi Pelayanan Nagari</small>
          </div>
        </a>

        <button class="navbar-toggler menu-toggle-btn" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="toggle-icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
          <ul class="navbar-nav ms-auto align-items-lg-center">
            <li class="nav-item">
              <a class="nav-link-pro active" href="{{ url('/') }}"><i class="fa-solid fa-house-chimney nav-mini-icon"></i> Home</a>
            </li>
            
            <li class="nav-item dropdown custom-dropdown">
              <a class="nav-link-pro dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Info Nagari
              </a>
              <ul class="dropdown-menu dropdown-glass-card animate__animated animate__fadeInUp">
                <li><a class="dropdown-item-pro" href="{{ url('visimisi') }}"><span class="drop-icon-bg bg-rgba-crimson"><i class="fa-solid fa-bullseye text-crimson"></i></span> Visi Misi Nagari</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('perangkat-nagari') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-users text-primary"></i></span> Perangkat Nagari</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('produk_hukum') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-book text-primary"></i></span> Produk Hukum</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('maklumat_pelayanan') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-info text-success"></i></span> Maklumat Pelayanan</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('struktur_nagari') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-sitemap text-green"></i></span> Struktur Nagari</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('galeri') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-image text-green"></i></span> Galeri</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('berita') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-edit text-gold"></i></span> Berita</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown custom-dropdown">
              <a class="nav-link-pro dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Perencanaan
              </a>
              <ul class="dropdown-menu dropdown-glass-card animate__animated animate__fadeInUp">
                <li><a class="dropdown-item-pro" href="{{ url('rpjm') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-info-circle text-primary"></i></span> RPJM</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('durkp') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-info-circle text-primary"></i></span> DURKP</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('lppn') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-info-circle text-primary"></i></span> LPPN</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('apbn') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-info-circle text-primary"></i></span> APBN</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('lkppn') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-info-circle text-primary"></i></span> LKPPN</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('lpj') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-info-circle text-primary"></i></span> LPJ</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown custom-dropdown">
              <a class="nav-link-pro dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                PPID Nagari
              </a>
              <ul class="dropdown-menu dropdown-glass-card animate__animated animate__fadeInUp">
                <li><a class="dropdown-item-pro" href="{{ url('ppid_nagari') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-user text-crimson"></i></span> Profil PPID Nagari</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('ppid_informasi_publik') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-info-circle text-primary"></i></span> Daftar Informasi Publik</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('ppid_alur_pelayanan') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-route text-success"></i></span> Alur Pelayanan</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('ppid_permohonan_informasi') }}"><span class="drop-icon-bg bg-rgba-gold"><i class="fa-solid fa-file-signature text-gold"></i></span> Permohonan Informasi</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('ppid_cek_permohonan_informasi') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-magnifying-glass text-green"></i></span> Cek Permohonan Informasi</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('ppid_pengajuan_keberatan') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-warning text-danger"></i></span> Pengajuan Keberatan</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('ppid_cek_pengajuan_keberatan') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-magnifying-glass text-green"></i></span> Cek Pengajuan Keberatan</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown custom-dropdown">
              <a class="nav-link-pro dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                PKK Nagari
              </a>
              <ul class="dropdown-menu dropdown-glass-card animate__animated animate__fadeInUp">
                <li><a class="dropdown-item-pro" href="{{ url('profil_pkk') }}"><span class="drop-icon-bg bg-rgba-crimson"><i class="fa-solid fa-heart text-crimson"></i></span> Profil PKK</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('pkk_program_kerja') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-network-wired text-green"></i></span> Program Kerja</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('pkk_kegiatan') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-network-wired text-green"></i></span> Kegiatan</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('pkk_pengurus') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-users text-primary"></i></span> Pengurus PKK</a></li>
              </ul>
            </li>

            <li class="nav-item ms-lg-4 mt-3 mt-lg-0">
              <a class="btn-login-pro" href="https://rangkiang.agamkab.go.id/" target="_blank">
                <i class="fa-solid fa-shield-halved me-2"></i> Portal Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="mt-4 pt-4">
      @yield('content')
    </div>

    <footer class="modern-footer">
        <div class="footer-wave-divider"></div>
        
        <div class="container footer-content">
          <div class="row g-5">
            
            <div class="col-lg-4 col-md-6 animate__animated animate__fadeIn">
              <a class="navbar-brand-pro mb-3 d-inline-flex text-decoration-none" href="#">
                <div class="brand-icon-wrapper">
                  <i class="fa-solid fa-landmark-dome"></i>
                </div>
                <div class="brand-text">
                  NAGARI<span class="text-crimson">{{ $data['nama_instansi'] }}</span>
                  <small class="text-muted">Portal Resmi Pemerintah</small>
                </div>
              </a>
              <p class="footer-description mt-3">
                Sistem Informasi Terpadu Pelayanan Publik dan Keterbukaan Informasi Pemerintahan Nagari berbasis Smart Village. Mewujudkan tata kelola desa yang transparan dan inklusif.
              </p>
              <div class="footer-social-group mt-4 d-flex gap-3 align-items-center">
                @foreach ($data['mediaSosial'] as $item)
                  @php
                    // Mengubah nama medsos menjadi huruf kecil semua agar pengecekan lebih akurat
                    $medsos = strtolower($item['nama_medsos']);
                  @endphp
              
                  @if ($medsos == 'facebook')
                    <a href="{{ $item['link_medsos'] }}" target="_blank" class="social-glow-btn fb-glow" aria-label="Facebook">
                      <i class="fa-brands fa-facebook-f"></i>
                    </a>
                  @elseif ($medsos == 'instagram')
                    <a href="{{ $item['link_medsos'] }}" target="_blank" class="social-glow-btn ig-glow" aria-label="Instagram">
                      <i class="fa-brands fa-instagram"></i>
                    </a>
                  @elseif ($medsos == 'tiktok')
                    <a href="{{ $item['link_medsos'] }}" target="_blank" class="social-glow-btn tt-glow" aria-label="Tiktok">
                      <i class="fa-brands fa-tiktok"></i>
                    </a>
                  @elseif ($medsos == 'youtube')
                    <a href="{{ $item['link_medsos'] }}" target="_blank" class="social-glow-btn yt-glow" aria-label="Youtube">
                      <i class="fa-brands fa-youtube"></i>
                    </a>
                  @else
                    <a href="{{ $item['link_medsos'] }}" target="_blank" class="social-glow-btn default-glow" aria-label="{{ $item['nama_medsos'] }}">
                      <i class="fa-solid fa-link"></i>
                    </a>
                  @endif
                @endforeach
              </div>
            </div>
  
            <div class="col-lg-2 col-md-6 ps-lg-4 animate__animated animate__fadeIn">
              <h5 class="footer-widget-title">Layanan Publik</h5>
              <ul class="list-unstyled footer-links-list">
                <li><a href="{{ url('/') }}"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>Home</a></li>
                <li><a href="#"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>Info Nagari</a></li>
                <li><a href="#"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>Perencanaan</a></li>
                <li><a href="#"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>PPID Nagari</a></li>
                <li><a href="#"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>PKK Nagari</a></li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 animate__animated animate__fadeIn">
              <h5 class="footer-widget-title">Hubungi Kami</h5>
              <ul class="list-unstyled footer-contact-info">
                <li>
                  <div class="contact-icon-box bg-rgba-crimson"><i class="fa-solid fa-location-dot text-crimson"></i></div>
                  <span>Jl. Tuanku Imam Bonjol, Nagari Lubuk Basung, Kecamatan Lubuk Basung, Kabupaten Agam, Sumatera Barat 26452</span>
                </li>
                <li>
                  <div class="contact-icon-box bg-rgba-green"><i class="fa-solid fa-phone text-green"></i></div>
                  <span>+62 812-6699-6111</span>
                </li>
                <li>
                  <div class="contact-icon-box bg-rgba-gold"><i class="fa-solid fa-envelope text-gold"></i></div>
                  <span class="text-break">kantorwalinarilubukbasung@gmail.com</span>
                </li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 animate__animated animate__fadeIn">
              <h5 class="footer-widget-title">Jam Pelayanan</h5>
              <div class="glass-card p-3 border-0 bg-white-70 shadow-none mb-3">
                <div class="d-flex justify-content-between small mb-2">
                  <span class="text-muted fw-semibold">Senin - Jumat:</span>
                  <span class="fw-bold text-darkblue">07:30 - 16:00</span>
                </div>
                <div class="d-flex justify-content-between small mb-2">
                  <span class="text-muted fw-semibold">Khusus Jumat:</span>
                  <span class="fw-bold text-darkblue">07:30 - 16:30</span>
                </div>
                <div class="d-flex justify-content-between small text-crimson fw-bold">
                  <span>Sabtu - Minggu:</span>
                  <span>Tutup</span>
                </div>
              </div>
              <small class="text-muted d-block"><i class="fa-solid fa-circle-info text-primary me-1"></i> Pengajuan mandiri online via portal tetap dibuka 24 jam.</small>
            </div>
  
          </div>
  
          <hr class="footer-divider-line mt-5">
          
          <div class="row align-items-center justify-content-between mt-4">
            <div class="col-md-6 text-center text-md-start">
              <p class="mb-0 footer-copyright">&copy; 2026 Pemerintah Nagari Digital. Seluruh Hak Cipta Dilindungi.</p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
              <ul class="list-inline mb-0 footer-bottom-links">
                <li class="list-inline-item"><a href="#" class="text-muted text-decoration-none small">Kebijakan Privasi</a></li>
                <li class="list-inline-item"><span class="text-muted small">&bull;</span></li>
                <li class="list-inline-item"><a href="#" class="text-muted text-decoration-none small">Syarat & Ketentuan</a></li>
              </ul>
            </div>
          </div>
        </div>
    </footer>

    <button class="accessibility-toggle" id="accToggle" aria-label="Menu Aksesibilitas" title="Menu Aksesibilitas">♿</button>
    
    <div class="accessibility-panel" id="accPanel">
        <h3>Menu Aksesibilitas</h3>
        
        <!-- Fitur Teks -->
        <div class="acc-group">
            <label>Ukuran Teks</label>
            <div class="acc-btn-grid">
                <button class="acc-btn" onclick="changeTextSize(1.2)">Perbesar</button>
                <button class="acc-btn" onclick="changeTextSize(1)">Normal</button>
            </div>
        </div>

        <!-- Fitur Visual / Buta Warna -->
        <div class="acc-group">
            <label>Tampilan &amp; Warna</label>
            <div class="acc-btn-grid">
                <button class="acc-btn" id="btnContrast" onclick="toggleFeature('acc-high-contrast', 'btnContrast')">Kontras Tinggi</button>
                <button class="acc-btn" id="btnMonochrome" onclick="toggleFeature('acc-monochrome', 'btnMonochrome')">Monokrom</button>
                <button class="acc-btn" id="btnInvert" onclick="toggleFeature('acc-invert', 'btnInvert')">Invert Warna</button>
                <button class="acc-btn" id="btnCursor" onclick="toggleFeature('acc-big-cursor', 'btnCursor')">Kursor Besar</button>
            </div>
        </div>

        <!-- Fitur Sorot & Pembaca Suara -->
        <div class="acc-group">
            <label>Navigasi &amp; Membaca</label>
            <div class="acc-btn-grid">
                <button class="acc-btn" id="btnHighlight" onclick="toggleFeature('acc-highlight-hover', 'btnHighlight')">Sorot Teks</button>
                <button class="acc-btn" id="btnScreenReader" onclick="toggleScreenReader()">Baca Suara</button>
            </div>
        </div>
    </div>

    <!-- Script Logika Fitur -->
    <script>
        const accToggle = document.getElementById('accToggle');
        const accPanel = document.getElementById('accPanel');
        let currentZoom = 1;
        let isScreenReaderActive = false;

        // Buka-tutup panel menu
        accToggle.addEventListener('click', () => {
            accPanel.classList.toggle('active');
        });

        // Fungsi mengubah ukuran teks
        function changeTextSize(scale) {
            if (scale === 1) currentZoom = 1;
            else currentZoom *= scale;
            
            // Batasi agar tidak terlalu besar/kecil
            if (currentZoom > 2) currentZoom = 2;
            if (currentZoom < 0.8) currentZoom = 0.8;
            
            document.body.style.fontSize = currentZoom + 'em';
        }

        // Fungsi Toggle Fitur CSS (Kontras, Buta Warna, Kursor, Sorot)
        function toggleFeature(className, btnId) {
            const element = document.body;
            const button = document.getElementById(btnId);
            
            element.classList.toggle(className);
            button.classList.toggle('active');
        }

        // Fitur Suara (Text-to-Speech saat Hover)
        function toggleScreenReader() {
            const btn = document.getElementById('btnScreenReader');
            isScreenReaderActive = !isScreenReaderActive;

            if (isScreenReaderActive) {
                btn.classList.add('active');
                // Menggunakan 'mouseover' agar mendeteksi saat kursor masuk ke elemen teks
                document.addEventListener('mouseover', speakTextHandler);
            } else {
                btn.classList.remove('active');
                document.removeEventListener('mouseover', speakTextHandler);
                window.speechSynthesis.cancel(); // Matikan suara jika fitur dimatikan
            }
        }

        // Handler untuk mendeteksi elemen yang dilewati kursor dan membacanya
        function speakTextHandler(e) {
            // Jalur aman: Jangan baca teks jika kursor berada di dalam panel menu aksesibilitas
            if (accPanel.contains(e.target) || accToggle.contains(e.target)) return;

            // Targetkan hanya elemen teks agar tidak membaca kontainer kosong
            const validTags = ['P', 'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'LI', 'A', 'SPAN', 'BUTTON'];
            if (!validTags.includes(e.target.tagName)) return;

            const textToSpeak = e.target.innerText || e.target.textContent;
            
            if (textToSpeak && textToSpeak.trim().length > 0) {
                // PENTING: Langsung matikan suara sebelumnya agar tidak menumpuk saat kursor digeser cepat
                window.speechSynthesis.cancel();

                const utterance = new SpeechSynthesisUtterance(textToSpeak.trim());
                utterance.lang = 'id-ID'; // Set suara ke Bahasa Indonesia
                
                // Opsional: Sedikit kurangi kecepatan (rate) agar lebih mudah dipahami saat mode hover aktif
                utterance.rate = 1.0; 

                window.speechSynthesis.speak(utterance);
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>