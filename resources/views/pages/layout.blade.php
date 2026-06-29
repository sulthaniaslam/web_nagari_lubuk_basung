<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Resmi Nagari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
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
            <small>Portal Resmi Pelayanan</small>
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
                <li><a class="dropdown-item-pro" href="{{ url('struktur_nagari') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-sitemap text-green"></i></span> Struktur Nagari</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('galeri') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-image text-green"></i></span> Galeri</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('berita') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-edit text-gold"></i></span> Berita</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown custom-dropdown">
              <a class="nav-link-pro dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Informasi Publik
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
                <li><a class="dropdown-item-pro" href="{{ url('ppid_informasi_publik') }}"><span class="drop-icon-bg bg-rgba-blue"><i class="fa-solid fa-info-circle text-primary"></i></span> Informasi Publik</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('ppid_permohonan_informasi') }}"><span class="drop-icon-bg bg-rgba-gold"><i class="fa-solid fa-file-signature text-gold"></i></span> Permohonan Informasi</a></li>
                <li><a class="dropdown-item-pro" href="{{ url('ppid_cek_permohonan_informasi') }}"><span class="drop-icon-bg bg-rgba-green"><i class="fa-solid fa-magnifying-glass text-green"></i></span> Cek Permohonan Informasi</a></li>
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
              <div class="footer-social-group mt-4">
                <a href="#" class="social-glow-btn fb-glow" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="social-glow-btn ig-glow" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-glow-btn yt-glow" aria-label="Youtube"><i class="fa-brands fa-youtube"></i></a>
                <a href="#" class="social-glow-btn x-glow" aria-label="X Twitter"><i class="fa-brands fa-x-twitter"></i></a>
              </div>
            </div>
  
            <div class="col-lg-2 col-md-6 ps-lg-4 animate__animated animate__fadeIn">
              <h5 class="footer-widget-title">Layanan Publik</h5>
              <ul class="list-unstyled footer-links-list">
                <li><a href="#home"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>Beranda Utama</a></li>
                <li><a href="#tentang"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>Info & Regulasi</a></li>
                <li><a href="#berita"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>Kabar Nagari</a></li>
                <li><a href="#kritik-saran"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>Aspirasi Warga</a></li>
                <li><a href="#"><i class="fa-solid fa-chevron-right me-2 small-arrow"></i>Sistem PPID</a></li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 animate__animated animate__fadeIn">
              <h5 class="footer-widget-title">Hubungi Kami</h5>
              <ul class="list-unstyled footer-contact-info">
                <li>
                  <div class="contact-icon-box bg-rgba-crimson"><i class="fa-solid fa-location-dot text-crimson"></i></div>
                  <span>Jl. Raya Utama No. 12, Kompleks Perkantoran Pusat Nagari</span>
                </li>
                <li>
                  <div class="contact-icon-box bg-rgba-green"><i class="fa-solid fa-phone text-green"></i></div>
                  <span>+62 812-3456-7890</span>
                </li>
                <li>
                  <div class="contact-icon-box bg-rgba-gold"><i class="fa-solid fa-envelope text-gold"></i></div>
                  <span class="text-break">sekretariat@nagari.go.id</span>
                </li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 animate__animated animate__fadeIn">
              <h5 class="footer-widget-title">Jam Pelayanan</h5>
              <div class="glass-card p-3 border-0 bg-white-70 shadow-none mb-3">
                <div class="d-flex justify-content-between small mb-2">
                  <span class="text-muted fw-semibold">Senin - Kamis:</span>
                  <span class="fw-bold text-darkblue">08:00 - 16:00</span>
                </div>
                <div class="d-flex justify-content-between small mb-2">
                  <span class="text-muted fw-semibold">Jumat:</span>
                  <span class="fw-bold text-darkblue">08:00 - 16:30</span>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>