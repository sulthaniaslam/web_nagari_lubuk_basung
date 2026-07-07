@extends('pages.layout')

@section('content')

@if (session('message'))
    <script>
      alert("{{session('message')}}")
    </script>
@endif

<section class="hero-section" style="
background-image: url('{{ asset('assets/images/bg-image4.png') }}');">
  <div class="hero-overlay"></div>
  
  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center g-5 text-start">
          
      <div class="col-lg-6 animate__animated animate__fadeInLeft">
        <div class="hero-badge mb-3">
          <span class="badge-dot"></span> <i class="fa-solid fa-sparkles text-gold me-1"></i> Layanan Digital Terintegrasi
        </div>
        {{-- Mengubah teks judul menjadi putih/terang agar kontras dengan background gelap --}}
        <h1 class="hero-title-pro text-white">
          Selamat Datang di <br>Website <span class="text-gradient-blue-light">{{ $data['nama_instansi'] }}</span><span class="text-crimson">.</span>
        </h1>
        <p class="hero-subtitle-pro text-white-50">
          Pusat pelayanan administrasi modern, transparansi informasi publik, dan wadah aspirasi aktif masyarakat menuju tata kelola *Smart Village* yang berdaulat dan sejahtera.
        </p>
        <div class="hero-action-group">
          <a href="#tentang" class="btn btn-hero-primary">
            Jelajahi Nagari <i class="fa-solid fa-arrow-right-long ms-2"></i>
          </a>
          <a href="#kritik-saran" class="btn btn-hero-secondary">
            <i class="fa-solid fa-comments me-2"></i> Kirim Aspirasi
          </a>
        </div>
        
        {{-- Mengubah teks statistik mini menjadi putih/terang --}}
        <div class="row g-3 mt-4 pt-4 hero-mini-stats">
          <div class="col-4">
            <h4 class="fw-bold text-white mb-0">100%</h4>
            <small class="text-white-50">Transparan</small>
          </div>
          <div class="col-4 border-start border-white border-opacity-25 border-2 ps-3">
            <h4 class="fw-bold text-green mb-0">24/7</h4>
            <small class="text-white-50">Akses Publik</small>
          </div>
          <div class="col-4 border-start border-white border-opacity-25 border-2 ps-3">
            <h4 class="fw-bold text-crimson mb-0">Smart</h4>
            <small class="text-white-50">Village</small>
          </div>
        </div>
      </div>

      <div class="col-lg-6 animate__animated animate__fadeInRight">
        <div class="hero-graphic-container">
          <div class="glow-sphere sphere-1"></div>
          <div class="glow-sphere sphere-2"></div>
          
          <div class="main-graphic-card floating-element">
            <div class="card-glass-header">
              <span class="dot-red"></span><span class="dot-yellow"></span><span class="dot-green"></span>
              <span class="ms-2 text-muted small">nagari-digital-portal.id</span>
            </div>
            <div class="card-glass-body text-center py-5 px-4">
              <div class="icon-circle-bg mb-4">
                <i class="fa-solid fa-landmark-flag fa-3x text-gradient-icon"></i>
              </div>
              <h4 class="fw-bold text-darkblue mb-2">Sistem Informasi Terpadu</h4>
              <p class="text-muted small px-3">Menghubungkan masyarakat dengan pemerintah nagari secara real-time, cepat, dan akuntabel.</p>
              
              <a href="{{ url('ppid_informasi_publik') }}" style="text-decoration: none;">
                <div class="mini-widget-glass animate__animated animate__fadeInUp animate__delay-1s">
                  <i class="fa-solid fa-circle-check text-green me-2"></i>
                  <span class="small fw-semibold text-dark-text">PPID Dokumen Terverifikasi</span>
                </div>
              </a>
            </div>
          </div>

          {{-- <div class="side-widget-glass floating-element-reverse">
            <div class="d-flex align-items-center">
              <div class="pkk-mini-icon me-3">
                <i class="fa-solid fa-heart-pulse text-crimson"></i>
              </div>
              <div>
                <h6 class="mb-0 fw-bold text-dark-text" style="font-size: 0.85rem;">Kader PKK Aktif</h6>
                <small class="text-gold fw-bold" style="font-size: 0.75rem;">Program Stunting Mandiri</small>
              </div>
            </div>
          </div> --}}

        </div>
      </div>

    </div>
  </div>
</section>

<section id="tentang" class="tentang-section py-5">
  <div class="container">
    
    <div class="row justify-content-center mb-5">
      <div class="col-lg-7 text-center">
        <span class="section-tag text-crimson">Mengenal Lebih Dekat</span>
        <h2 class="section-title-pro animate__animated animate__fadeIn">Profil & Tata Kelola Nagari</h2>
        <p class="section-subtitle-custom">Pondasi kepemimpinan, akar tradisi, serta peta jalan strategis menuju masa depan Nagari digital yang berkemajuan.</p>
      </div>
    </div>

    <div class="row g-4">
      
      <div class="col-lg-4 col-md-6 animate__animated animate__slideInLeft">
        <div class="bento-card bento-leader-card h-100 p-4 text-center d-flex flex-column justify-content-between">
          <div>
            <div class="bento-badge-top bg-rgba-crimson text-crimson mb-4">
              <i class="fa-solid fa-user-tie me-1"></i> Pimpinan Utama
            </div>
            
            <div class="leader-avatar-frame mx-auto mb-3">
              @if(!empty($data['walinagari']['gambar_walinagari']))
                <img src="{{ env('API_STORAGE') . $data['walinagari']['gambar_walinagari'] }}" alt="Foto {{ $data['walinagari']['nama_walinagari'] }}" class="leader-img-fluent">
                {{-- <img src="{{ asset('storage/' . $data['walinagari']['gambar_walinagari']) }}" alt="Foto {{ $data['walinagari']['nama_walinagari'] }}" class="leader-img-fluent"> --}}
              @else
                <i class="fa-solid fa-user-shield fa-4x text-white-50"></i>
              @endif
            </div>
            
            <h4 class="bento-title text-darkblue mb-1">{{ $data['walinagari']['nama_walinagari'] }}</h4>
            <span class="badge badge-crimson-gold mb-3">Wali Nagari (Pendidikan: {{ $data['walinagari']['pendidikan'] }})</span>
            
            <div class="text-start bg-light rounded-3 p-3 my-3 leader-mini-bio">
              <p class="mb-1 small text-muted"><i class="fa-solid fa-cake-candles me-2 text-crimson"></i>{{ $data['walinagari']['tempat_lahir'] }}, {{ \Carbon\Carbon::parse($data['walinagari']['tanggal_lahir'])->translatedFormat('d F Y') }}</p>
              <p class="mb-1 small text-muted"><i class="fa-solid fa-mosque me-2 text-primary"></i>Agama: {{ $data['walinagari']['agama'] }}</p>
              <p class="mb-0 small text-muted"><i class="fa-solid fa-location-dot me-2 text-success"></i>{!! strip_tags($data['walinagari']['alamat_sekarang']) !!}</p>
            </div>
      
            <button type="button" class="btn btn-sm btn-outline-primary w-100 rounded-pill mb-3" data-bs-toggle="modal" data-bs-target="#modalPendidikan">
              <i class="fa-solid fa-graduation-cap me-2"></i>Lihat Riwayat Pendidikan
            </button>
          </div>
          
          <div class="leader-contact-shortcut pt-3 border-top border-light-subtle d-flex justify-content-center gap-2">
            <a href="https://wa.me/{{ $data['walinagari']['kontak'] }}" target="_blank" class="social-glow-btn bg-success text-white border-0 small" title="Hubungi via WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="tel:{{ $data['walinagari']['kontak'] }}" class="social-glow-btn bg-light text-muted small" title="Telepon Langsung"><i class="fa-solid fa-phone"></i></a>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="modalPendidikan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content glass-card border-0" style="border-radius: 24px;">
            <div class="modal-header border-0 pb-0">
              <h5 class="fw-bold text-darkblue"><i class="fa-solid fa-graduation-cap me-2 text-primary"></i>Riwayat Pendidikan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3 target-html-render">
              {!! $data['walinagari']['riwayat_pendidikan'] !!}
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-md-6 animate__animated animate__slideInRight">
        <div class="bento-card bento-main-profile h-100 p-4 p-md-5 d-flex flex-column justify-content-between">
          <div>
            <div class="bento-badge-top bg-rgba-blue text-primary">
              <i class="fa-solid fa-landmark-dome me-1"></i> Selayang Pandang
            </div>
            <h3 class="bento-title mt-3 text-darkblue">Sekilas Tentang {{ $data['nama_instansi'] }}</h3>
            <div class="bento-lead mt-3 text-dark-text">
              {!! $data['tentang_instansi'] !!}
            </div>
          </div>
          
          <div class="row g-3 mt-4 pt-3 border-top border-light-subtle">
            <div class="col-sm-4 col-6">
              <div class="d-flex align-items-center">
                <i class="fa-solid fa-map-location-dot fa-lg text-gold me-2"></i>
                <div>
                  <small class="text-muted d-block lh-1">Luas Wilayah</small>
                  <span class="fw-bold text-dark-text text-nowrap">70 Km²</span>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-6">
              <div class="d-flex align-items-center">
                <i class="fa-solid fa-users-line fa-lg text-primary me-2"></i>
                <div>
                  <small class="text-muted d-block lh-1">Populasi</small>
                  <span class="fw-bold text-dark-text text-nowrap">35.000 Jiwa</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section id="berita" class="berita-section py-5">
  <div class="container">
    
    <div class="row justify-content-between align-items-end mb-4">
      <div class="col-md-7 text-center text-md-start">
        <span class="section-tag text-crimson">Kabar Terkini</span>
        <h2 class="section-title-pro animate__animated animate__fadeIn">Info & Berita Nagari</h2>
        <p class="section-subtitle-custom mb-0">Ikuti perkembangan aktivitas pembangunan, pengumuman resmi, dan kegiatan masyarakat nagari.</p>
      </div>
      <div class="col-md-4 text-center text-md-end mt-3 mt-md-0">
        <a href="{{ url('berita') }}" class="btn btn-sm btn-outline-primary rounded-pill px-4">
          Lihat Semua Berita <i class="fa-solid fa-arrow-right ms-1"></i>
        </a>
      </div>
    </div>

    <div class="row g-4">
      @php $beritaList = collect($data['berita'])->take(4); @endphp

      @foreach ($beritaList as $item)
        @if($loop->first)
          <div class="col-lg-7 animate__animated animate__fadeInUp">
            <div class="card pro-card news-main-card border-0 overflow-hidden h-100 shadow-sm">
              <div class="news-img-wrapper">
                @if(!empty($item['gambar_berita']))
                  <img src="{{ env('API_STORAGE') . $item['gambar_berita'] }}" alt="{{ $item['judul_berita'] }}" class="news-img-fluid">
                @else
                  <div class="news-bg-gradient-icon bg-rgba-blue">
                    <i class="fa-solid fa-newspaper fa-4x text-primary opacity-25"></i>
                  </div>
                @endif
                <span class="news-badge badge-blue">Berita Utama</span>
              </div>
              <div class="pro-card-body p-4 d-flex flex-column justify-content-between">
                <div>
                  <div class="pro-card-meta mb-2 small text-muted">
                    <span class="text-gold me-3"><i class="fa-regular fa-calendar-days me-1"></i> {{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y') }}</span>
                  </div>
                  <h4 class="fw-bold text-darkblue mb-3"><a href="{{ url('berita-detail/'.$item['slug']) }}" class="text-decoration-none text-darkblue hover-link">{{ $item['judul_berita'] }}</a></h4>
                  <p class="text-secondary mb-4">{!! Str::substr(strip_tags($item['isi_berita']), 0, 180) !!}...</p>
                </div>
                <div class="pro-card-footer pt-3 border-top border-light">
                  <a href="{{ url('berita-detail/'.$item['slug']) }}" class="read-more-btn btn-blue-link fw-bold text-decoration-none">Baca Selengkapnya <i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-5 d-flex flex-column gap-4">
        @else
          @php
            $themes = [
              2 => ['badge' => 'badge-green', 'text' => 'Kegiatan', 'bg_icon' => 'bg-rgba-green', 'icon' => 'fa-hands-holding-child', 'text_color' => 'text-green'],
              3 => ['badge' => 'badge-crimson', 'text' => 'PPID', 'bg_icon' => 'bg-rgba-crimson', 'icon' => 'fa-circle-info', 'text_color' => 'text-crimson'],
              4 => ['badge' => 'badge-gold', 'text' => 'Pengumuman', 'bg_icon' => 'bg-rgba-gold', 'icon' => 'fa-bullhorn', 'text_color' => 'text-gold']
            ];
            $currentTheme = $themes[$loop->iteration] ?? $themes[2];
          @endphp

          <div class="card news-side-card border-0 overflow-hidden shadow-sm p-3 animate__animated animate__fadeInUp">
            <div class="d-flex flex-row gap-3 align-items-center">
              
              <div class="news-side-thumb flex-shrink-0 rounded-3 overflow-hidden">
                @if(!empty($item['gambar_berita']))
                  <img src="{{ env('API_STORAGE') . $item['gambar_berita'] }}" alt="{{ $item['judul_berita'] }}" class="w-100 h-100 object-fit-cover">
                @else
                  <div class="w-100 h-100 d-flex align-items-center justify-content-center {{ $currentTheme['bg_icon'] }}">
                    <i class="fa-solid {{ $currentTheme['icon'] }} {{ $currentTheme['text_color'] }} opacity-50"></i>
                  </div>
                @endif
              </div>

              <div class="flex-grow-1">
                <div class="mb-1">
                  <span class="badge {{ $currentTheme['badge'] }} px-2 py-1 small-badge mb-1">{{ $currentTheme['text'] }}</span>
                  <small class="text-muted d-block ms-1" style="font-size: 0.75rem;">
                    <i class="fa-regular fa-calendar me-1"></i> 
                    {{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d M Y') }}
                  </small>
                </div>
                <h6 class="fw-bold mb-1 side-card-title">
                  <a href="{{ url('berita-detail/'.$item['slug']) }}" class="text-decoration-none text-darkblue text-line-clamp">{{ $item['judul_berita'] }}</a>
                </h6>
                <a href="{{ url('berita-detail/'.$item['slug']) }}" class="small fw-semibold text-primary text-decoration-none">Detail <i class="fa-solid fa-angle-right ms-1"></i></a>
              </div>

            </div>
          </div>
        @endif

        @if($loop->last && $loop->count > 1)
          </div>
        @endif
      @endforeach

    </div>
  </div>
</section>


<section id="galeri" class="galeri-section py-5">
  <div class="container">
    
    <div class="row justify-content-center mb-5">
      <div class="col-lg-7 text-center">
        <span class="section-tag text-crimson">Dokumentasi Lensa</span>
        <h2 class="section-title-pro animate__animated animate__fadeIn">Galeri Kegiatan Nagari</h2>
        <p class="section-subtitle-custom">Potret ragam aktivitas pembangunan fisik, tradisi adat kebudayaan, serta ruang pemberdayaan masyarakat desa.</p>
      </div>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-2 mb-4 filter-group-container">
      <button class="btn btn-filter active">Semua Foto</button>
      <button class="btn btn-filter">Pembangunan</button>
      <button class="btn btn-filter">Adat & Budaya</button>
      <button class="btn btn-filter">Kegiatan PKK</button>
    </div>

    <div class="row g-4 spec-gallery-grid">
      
      @foreach(collect($data['galeri'])->take(4) as $item)
        @php
          $gridClass = ($loop->iteration == 1 || $loop->iteration == 4) ? 'col-lg-8' : 'col-lg-4';
          $heightClass = ($loop->iteration == 1) ? 'grid-height-tall' : 'grid-height-standard';
          
          $themes = [
              1 => ['bg' => 'bg-rgba-blue', 'badge' => 'badge-blue', 'text' => 'Pembangunan'],
              2 => ['bg' => 'bg-rgba-crimson', 'badge' => 'badge-crimson', 'text' => 'Adat & Budaya'],
              3 => ['bg' => 'bg-rgba-green', 'badge' => 'badge-green', 'text' => 'Kegiatan PKK'],
              4 => ['bg' => 'bg-rgba-gold', 'badge' => 'badge-gold', 'text' => 'Pembangunan']
          ];
          $currentTheme = $themes[$loop->iteration] ?? $themes[1];
        @endphp

        <div class="col-md-6 {{ $gridClass }} animate__animated animate__zoomIn">
          <div class="gallery-item-box {{ $heightClass }}">
            
            <div class="gallery-bg-placeholder {{ $currentTheme['bg'] }}">
              @if(!empty($item['file']))
                <img src="{{ env('API_STORAGE') . $item['file'] }}" alt="{{ $item['nama'] }}" class="w-100 h-100 object-fit-cover" onerror="this.style.display='none'">
              @endif
              <i class="fa-regular fa-image fa-3x position-absolute opacity-25"></i>
            </div>

            <div class="gallery-overlay-content">
              <span class="gallery-badge {{ $currentTheme['badge'] }}">
                {{ $item['type'] !== 'undefined' ? $item['type'] : $currentTheme['text'] }}
              </span>
              <h5 class="gallery-item-title">{{ $item['nama'] }}</h5>
              <p class="gallery-item-date">
                <i class="fa-regular fa-calendar me-1"></i> 
                {{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y') }}
              </p>
              
              <a href="#" class="gallery-zoom-trigger" 
                 data-bs-toggle="modal" 
                 data-bs-target="#galleryModal" 
                 data-title="{{ $item['nama'] }}" 
                 data-category="{{ $item['type'] !== 'undefined' ? $item['type'] : $currentTheme['text'] }}"
                 data-badge-class="{{ $currentTheme['badge'] }}"
                 data-color-class="{{ $currentTheme['bg'] }}"
                 data-date="{{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y') }}"
                 aria-label="Lihat Foto">
                <i class="fa-solid fa-maximize"></i>
              </a>
            </div>

          </div>
        </div>
      @endforeach

    </div>

    <div class="row mt-5 text-center animate__animated animate__fadeInUp">
      <div class="col-12">
        <div class="gallery-cta-wrapper">
          <p class="text-muted small mb-3">
            <i class="fa-solid fa-circle-info text-primary me-1"></i> Menampilkan {{ count(collect($data['galeri'])->take(4)) }} dari {{ count($data['galeri']) }} dokumentasi arsip kegiatan resmi.
          </p>
          <a href="{{ url('galeri') }}" class="btn btn-gallery-more">
            <span>Lihat Seluruh Arsip Galeri</span>
            <div class="btn-arrow-circle">
              <i class="fa-solid fa-arrow-right"></i>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>


<section class="wisata-section py-5" style="background: #f8fafc; overflow: hidden;">
  <div class="container py-4">
    
    <div class="row mb-5 align-items-end g-3">
      <div class="col-md-8 text-center text-md-start">
        <span class="section-tag text-crimson mb-2 d-block">Destinasi Unggulan</span>
        <h2 class="section-title-pro fw-extrabold text-darkblue mb-2 tracking-tight">Pesona Wisata Nagari</h2>
        <p class="section-subtitle-custom mb-0 text-secondary">Jelajahi keindahan alam, warisan budaya luhur, dan spot rekreasi ikonik di nagari kami.</p>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      @foreach ($data['kategori_pesona_wisata'] as $index => $item)
        <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp" style="animation-delay: {{ $index * 0.15 }}s;">
          <div class="card card-wisata-premium border-0 overflow-hidden shadow-sm h-100">
            
            <div class="wisata-img-wrapper position-relative">
              <img src="{{ env('API_STORAGE') . $item['gambar'] }}" 
                  alt="{{ $item['nama'] }}" 
                  class="w-100 h-100 object-fit-cover wisata-main-img"
                  onerror="this.onerror=null; this.src='https://placehold.co/600x450/1e3a8a/ffffff?text=Kategori+Wisata';">
              
              <span class="badge badge-wisata-tag bg-white text-darkblue fw-bold rounded-pill shadow-sm">
                <i class="fa-solid fa-map-pin text-crimson me-1"></i> Pesona Wisata
              </span>

              <span class="badge badge-rating-tag rounded-pill">
                <i class="fa-solid fa-star text-gold me-1"></i> 5.0
              </span>
            </div>

            <div class="wisata-body-content p-4 d-flex flex-column justify-content-between">
              <div>
                <h4 class="fw-bold text-darkblue wisata-title mb-2">{{ $item['nama'] }}</h4>
                <p class="text-secondary small line-clamp-3 mb-4">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, quibusdam? Laboriosam, obcaecati eveniet quaerat facilis cumque perferendis saepe totam earum ducimus ipsam minus!
                </p>
              </div>

              <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light mt-auto">
                <span class="text-muted small fw-medium"><i class="fa-regular fa-clock me-1 text-crimson"></i> Buka Setiap Hari</span>
                <a href="{{ url('pesona_wisata/' . $item['id']) }}" class="btn btn-wisata-action d-inline-flex align-items-center justify-content-center rounded-circle" title="Lihat Detail Destinasi">
                  <i class="fa-solid fa-arrow-right-long text-white"></i>
                </a>
              </div>
            </div>

          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>


<section id="kritik-saran" class="aspirasi-section">
  <div class="container">
    <div class="row g-5 align-items-stretch">
      
      <div class="col-lg-5 d-flex flex-column justify-content-between animate__animated animate__fadeInLeft">
        <div>
          <span class="section-tag text-crimson">Aspirasi Warga</span>
          <h2 class="section-title-pro text-start mb-3">Suara Anda, Kebijakan Kami</h2>
          <p class="text-secondary-custom mb-4">
            Kritik, saran, maupun laporan pengaduan yang Anda kirimkan dilindungi oleh enkripsi privasi dan akan langsung ditinjau secara berkala oleh Wali Nagari beserta jajaran terkait.
          </p>
        </div>

        <div class="alur-container gap-3 d-flex flex-column my-4">
          <div class="alur-card-mini">
            <div class="alur-icon bg-rgba-blue"><i class="fa-solid fa-pen-to-square text-primary"></i></div>
            <div>
              <h6 class="fw-bold text-darkblue mb-1">1. Tulis Lengkap</h6>
              <small class="text-muted">Isi data diri valid dan pilih kategori pengaduan yang sesuai.</small>
            </div>
          </div>
          <div class="alur-card-mini">
            <div class="alur-icon bg-rgba-gold"><i class="fa-solid fa-envelope-open-text text-gold"></i></div>
            <div>
              <h6 class="fw-bold text-darkblue mb-1">2. Verifikasi Internal</h6>
              <small class="text-muted">Sistem memvalidasi pesan untuk menghindari spam/hoaks.</small>
            </div>
          </div>
          <div class="alur-card-mini">
            <div class="alur-icon bg-rgba-green"><i class="fa-solid fa-circle-check text-green"></i></div>
            <div>
              <h6 class="fw-bold text-darkblue mb-1">3. Tindak Lanjut</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7 animate__animated animate__fadeInRight">
        <div class="glass-card bento-card p-4 p-md-5 h-100 justify-content-center d-flex flex-column">
          <form action="{{ url('kritik_saran') }}" method="POST" id="formAspirasi">
            @csrf
            <input type="hidden" name="kode_instansi" value="{{ env('KODE_INSTANSI') }}">
            <!-- Hidden Input untuk token reCAPTCHA -->
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

            <div class="row g-4">
              <div class="col-md-6">
                <div class="form-floating custom-floating">
                  <!-- Menambahkan atribut name="nama" -->
                  <input type="text" name="nama" class="form-control" id="inputNama" placeholder="Nama Lengkap" required>
                  <label for="inputNama"><i class="fa-regular fa-user me-2 text-primary"></i>Nama Lengkap</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating custom-floating">
                  <!-- Menambahkan atribut name="email" -->
                  <input type="email" name="email" class="form-control" id="inputEmail" placeholder="nama@email.com" required>
                  <label for="inputEmail"><i class="fa-regular fa-envelope me-2 text-primary"></i>Alamat Email</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating custom-floating">
                  <!-- Menambahkan atribut name="pesan" -->
                  <textarea name="pesan" class="form-control" placeholder="Tulis pesan Anda" id="inputPesan" style="height: 150px" required></textarea>
                  <label for="inputPesan"><i class="fa-regular fa-comment-dots me-2 text-primary"></i>Uraian Aspirasi, Kritik, atau Saran</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check custom-check">
                  <input class="form-check-input" type="checkbox" value="" id="checkSetuju" required>
                  <label class="form-check-label text-muted small" for="checkSetuju">
                    Saya menjamin data yang diisikan benar dan pesan ini ditulis tanpa mengandung unsur SARA maupun ujaran kebencian.
                  </label>
                </div>
              </div>
              <div class="col-12 mt-4">
                <button type="submit" class="btn btn-submit-pro w-100 py-3">
                  <span>Kirim Aspirasi Digital</span>
                  <i class="fa-solid fa-paper-plane ms-2"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>


<section class="py-5">
  <div class="container-fluid">
      <div class="position-relative overflow-hidden rounded-5 shadow-sm border border-light-subtle" style="height: 480px;">
        <iframe 
        class="w-100 h-100 border-0"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.027706720548!2d100.02549648284909!3d-0.31785086676517177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd50d72cf2b6abb%3A0xc454edb634a851e0!2sKantor%20Wali%20Nagari%20Lubuk%20Basung!5e0!3m2!1sid!2sid!4v1782701507207!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
      </div>
  </div>
</section>


<style>
  .map-floating-info-card {
      position: absolute;
      top: 40px;
      left: 40px;
      z-index: 10;
      width: 340px;
      box-shadow: 0 20px 40px rgba(15, 23, 42, 0.12) !important;
      border: 1px solid rgba(255, 255, 255, 0.8) !important;
  }
  .btn-teal-premium {
      background: linear-gradient(135deg, var(--pkk-teal), #14b8a6);
      border: none;
      box-shadow: 0 4px 15px rgba(15, 118, 110, 0.2);
      transition: all 0.3s ease;
  }
  .btn-teal-premium:hover {
      background: linear-gradient(135deg, #0d9488, #0f766e);
      box-shadow: 0 6px 20px rgba(15, 118, 110, 0.3);
      transform: translateY(-1px);
  }
</style>

<!-- Google reCAPTCHA v3 Integration Script -->
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
  grecaptcha.ready(function() {
      grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'aspirasi'}).then(function(token) {
          document.getElementById('g-recaptcha-response').value = token;
      });
  });
</script>

@endsection