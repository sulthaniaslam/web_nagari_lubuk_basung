@extends('pages.layout')

@section('content')
<main class="detail-berita-wrapper py-5">
  <div class="container">
    
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb custom-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ url('berita') }}">Berita</a></li>
        <li class="breadcrumb-item active" aria-current="page">Musrenbang 2026</li>
      </ol>
    </nav>

    <div class="row g-5">
      
      {{-- Kolom Kiri: Konten Utama Berita --}}
      <div class="col-lg-8">
        <article class="article-container glass-card p-4 p-md-5">
          
          <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
            <!-- KATEGORI DINAMIS (Jika 'undefined', beri fallback 'Berita') -->
            <span class="news-badge badge-blue position-static">
              {{ $berita['kategori'] === 'undefined' ? 'Informasi' : $berita['kategori'] }}
            </span>
            <!-- TANGGAL DINAMIS -->
            <span class="text-muted small fw-semibold ms-2">
              <i class="fa-regular fa-calendar-days me-1 text-gold"></i> 
              {{ \Carbon\Carbon::parse($berita['created_at'])->translatedFormat('d F Y') }}
            </span>
            <span class="text-muted small fw-semibold"><i class="fa-regular fa-clock ms-2 me-1 text-primary"></i> 4 Menit Baca</span>
          </div>

          <!-- JUDUL UTAMA DINAMIS -->
          <h1 class="article-title mb-4">{{ $berita['judul_berita'] }}</h1>
          
          <!-- GAMBAR UTAMA DINAMIS -->
          <div class="article-featured-image mb-4 text-center">
            @if(!empty($berita['gambar_berita']))
              <img src="{{ env('API_STORAGE') . $berita['gambar_berita'] }}" alt="{{ $berita['judul_berita'] }}" class="img-fluid rounded-3 w-100 object-fit-cover" style="max-height: 450px;">
            @else
              <div class="w-100 py-5 d-flex align-items-center justify-content-center bg-light rounded-3">
                <i class="fa-solid fa-newspaper fa-4x text-secondary opacity-25"></i>
              </div>
            @endif
            <div class="image-caption mt-2">Dokumentasi: {{ $berita['judul_berita'] }}</div>
          </div>

          <!-- ISI BERITA DINAMIS -->
          <div class="article-body-content">
            {!! $berita['isi_berita'] !!}
          </div>

          <div class="article-share-footer border-top pt-4 mt-5 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <span class="fw-bold text-darkblue"><i class="fa-solid fa-share-nodes me-2"></i>Bagikan Berita:</span>
            <div class="footer-social-group m-0">
              <a href="#" class="social-glow-btn fb-glow"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="social-glow-btn ig-glow"><i class="fa-brands fa-instagram"></i></a>
              <a href="#" class="social-glow-btn x-glow"><i class="fa-brands fa-x-twitter"></i></a>
              <a href="#" class="social-glow-btn bg-success text-white border-0" style="box-shadow: 0 4px 12px rgba(25,135,84,0.3);"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>

        </article>
      </div>

      {{-- Kolom Kanan: Sidebar --}}
      <div class="col-lg-4">
        <aside class="sidebar-wrapper d-flex flex-column gap-4">
          
          <div class="glass-card p-4">
            <h5 class="sidebar-title mb-3">Diterbitkan Oleh</h5>
            <div class="d-flex align-items-center">
              <div class="author-avatar bg-rgba-blue me-3">
                <i class="fa-solid fa-user-shield text-primary fa-lg"></i>
              </div>
              <div>
                <h6 class="mb-0 fw-bold text-darkblue">Sekretariat Nagari</h6>
                <small class="text-muted">Divisi Humas & Informasi</small>
              </div>
            </div>
          </div>

          <div class="glass-card p-4">
            <h5 class="sidebar-title mb-3">Kabar Populer Terkait</h5>
            <div class="sidebar-news-list d-flex flex-column gap-3">
              
              <a href="#" class="sidebar-news-item text-decoration-none d-flex gap-3 align-items-center">
                <div class="mini-news-img bg-rgba-green text-green"><i class="fa-solid fa-hands-holding-child"></i></div>
                <div>
                  <h6 class="mb-1 text-dark-text small-title">Kader PKK Gelar Pelatihan Olahan Pangan Bergizi</h6>
                  <small class="text-muted font-11"><i class="fa-regular fa-calendar-days me-1"></i>15 Juni 2026</small>
                </div>
              </a>

              <a href="#" class="sidebar-news-item text-decoration-none d-flex gap-3 align-items-center">
                <div class="mini-news-img bg-rgba-gold text-gold"><i class="fa-solid fa-circle-info"></i></div>
                <div>
                  <h6 class="mb-1 text-dark-text small-title">Transparansi Dana Desa: PPID Rilis Laporan Kuartal I</h6>
                  <small class="text-muted font-11"><i class="fa-regular fa-calendar-days me-1"></i>10 Juni 2026</small>
                </div>
              </a>

            </div>
          </div>

          <div class="glass-card p-4">
            <h5 class="sidebar-title mb-3">Lampiran Dokumen</h5>
            <div class="p-3 bg-white-70 border rounded-3 d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <i class="fa-regular fa-file-pdf fa-2x text-danger me-3"></i>
                <div>
                  <h6 class="mb-0 text-dark-text fw-bold" style="font-size: 0.85rem;">Draft_Usulan_Musrenbang.pdf</h6>
                  <small class="text-muted" style="font-size: 0.75rem;">Size: 2.4 MB</small>
                </div>
              </div>
              <a href="#" class="btn btn-sm btn-outline-primary rounded-circle" title="Unduh File"><i class="fa-solid fa-download"></i></a>
            </div>
          </div>

        </aside>
      </div>

    </div> {{-- Penutup baris utama --}}

    <!-- ==========================================================================
       BAGIAN BARU: BERITA LAINNYA (MORE NEWS SECTION)
       ========================================================================== -->
    <div class="row mt-5 pt-4">
      <div class="col-12 mb-4 animate__animated animate__fadeIn">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="section-tag text-crimson">Rekomendasi</span>
            <h3 class="fw-bold text-darkblue mb-0">Berita & Informasi Lainnya</h3>
          </div>
          <a href="{{ url('berita') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 small">
            Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i>
          </a>
        </div>
        <hr class="mt-3 mb-0 opacity-25">
      </div>
    </div>

    <div class="row g-4">
      {{-- Mengambil 3 sampel berita acak/terbaru di luar berita saat ini --}}
      @if(isset($data['berita']) && count($data['berita']) > 0)
        @foreach (collect($data['berita'])->take(3) as $item)
          @php
            $categories = ['Kegiatan', 'Pengumuman', 'PPID', 'PKK'];
            $randomCat = $categories[$loop->index % count($categories)];
            
            $themes = [
              'Kegiatan' => ['badge' => 'badge-blue', 'icon' => 'fa-newspaper'],
              'Pengumuman' => ['badge' => 'badge-gold', 'icon' => 'fa-bullhorn'],
              'PPID' => ['badge' => 'badge-crimson', 'icon' => 'fa-circle-info'],
              'PKK' => ['badge' => 'badge-green', 'icon' => 'fa-hands-holding-child']
            ];
            $currentTheme = $themes[$randomCat];
          @endphp

          <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp">
            <div class="card pro-card card-blue border-0 overflow-hidden h-100 shadow-sm d-flex flex-column justify-content-between" style="border-radius: 16px;">
              <div>
                <div class="pro-card-img-wrapper" style="position: relative; height: 180px; overflow: hidden; background-color: #f1f5f9;">
                  @if(!empty($item['gambar_berita']))
                    <img src="{{ env('API_STORAGE') . $item['gambar_berita'] }}" alt="{{ $item['judul_berita'] }}" class="w-100 h-100 object-fit-cover transition-img">
                  @else
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                      <i class="fa-solid {{ $currentTheme['icon'] }} fa-2x text-secondary opacity-25"></i>
                    </div>
                  @endif
                  <span class="news-badge {{ $currentTheme['badge'] }}">{{ $randomCat }}</span>
                </div>
                <div class="pro-card-body p-4">
                  <div class="mb-2" style="font-size: 0.8rem;">
                    <span class="text-gold"><i class="fa-regular fa-calendar-days me-1"></i> {{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d M Y') }}</span>
                  </div>
                  <h6 class="fw-bold lh-base">
                    <a href="{{ url('berita-detail/'.$item['slug']) }}" class="text-decoration-none text-darkblue text-line-clamp-2" style="font-size: 0.95rem;">{{ $item['judul_berita'] }}</a>
                  </h6>
                </div>
              </div>
              <div class="px-4 pb-4 pt-0">
                <a href="{{ url('berita-detail/'.$item['slug']) }}" class="small fw-semibold text-primary text-decoration-none">
                  Baca Artikel <i class="fa-solid fa-angle-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      @else
        {{-- Static Fallback/Cadangan jika data dari controller kosong --}}
        <div class="col-md-6 col-lg-4">
          <div class="card pro-card card-green border-0 overflow-hidden h-100 shadow-sm p-4" style="border-radius: 16px;">
            <span class="badge bg-rgba-green text-green align-self-start mb-2 px-2 py-1">PKK</span>
            <small class="text-muted mb-2"><i class="fa-regular fa-calendar me-1"></i> 15 Juni 2026</small>
            <h6 class="fw-bold"><a href="#" class="text-decoration-none text-darkblue text-line-clamp-2">Kelompok PKK Nagari Gelar Pelatihan Olahan Pangan</a></h6>
            <a href="#" class="small fw-semibold text-success text-decoration-none mt-3 d-inline-block">Baca Artikel <i class="fa-solid fa-angle-right ms-1"></i></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card pro-card card-crimson border-0 overflow-hidden h-100 shadow-sm p-4" style="border-radius: 16px;">
            <span class="badge bg-rgba-crimson text-crimson align-self-start mb-2 px-2 py-1">PPID</span>
            <small class="text-muted mb-2"><i class="fa-regular fa-calendar me-1"></i> 10 Juni 2026</small>
            <h6 class="fw-bold"><a href="#" class="text-decoration-none text-darkblue text-line-clamp-2">Transparansi Dana Desa: PPID Rilis Laporan Kuartal I</a></h6>
            <a href="#" class="small fw-semibold text-danger text-decoration-none mt-3 d-inline-block">Baca Artikel <i class="fa-solid fa-angle-right ms-1"></i></a>
          </div>
        </div>
      @endif
    </div>

  </div>
</main>
@endsection