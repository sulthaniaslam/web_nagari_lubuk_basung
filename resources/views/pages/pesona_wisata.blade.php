@extends('pages.layout')

@section('content')
<main class="wisata-premium-wrapper py-5" style="background: #fdfdfd;">
  <div class="container py-4">
    
    <nav aria-label="breadcrumb" class="mb-5">
      <ol class="breadcrumb custom-breadcrumb-modern">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $nama_kategori }}</li>
      </ol>
    </nav>

    <div class="row mb-5 text-center justify-content-center">
      <div class="col-lg-8 animate__animated animate__fadeIn">
        <span class="section-tag text-crimson">Kategori Destinasi</span>
        <h1 class="section-title-pro mb-2">{{ $nama_kategori }}</h1>
        <p class="section-subtitle-custom">Menampilkan seluruh pesona destinasi pilihan yang berada di dalam kategori ini.</p>
      </div>
    </div>

    @foreach($pesona_wisata as $wisata)
      
      <div class="row g-5 align-items-stretch mb-5 pb-5 border-bottom border-light">
        
        <div class="col-lg-5 col-xl-4 d-flex flex-column justify-content-between animate__animated animate__fadeInLeft">
          <div class="destination-info-card bg-white p-4 rounded-4 shadow-xs h-100 d-flex flex-column justify-content-between position-relative overflow-hidden">
            <div class="decorative-blur-circle"></div>
            
            <div class="position-relative" style="z-index: 2;">
              <span class="badge-modern-tag mb-3 d-inline-block">
                <i class="fa-solid fa-leaf me-1 text-success"></i> 
                {{ $wisata['kategori_pesona_wisata']['nama'] ?? 'Destinasi Nagari' }}
              </span>
              
              <h2 class="fw-extrabold text-darkblue mb-3 tracking-tight header-title-custom">
                {{ $wisata['nama_wisata'] }}
              </h2>
              
              <div class="wisata-description text-secondary small mb-4">
                {!! $wisata['keterangan'] !!}
              </div>
            </div>

            <div class="main-cover-wrapper position-relative rounded-4 overflow-hidden mb-2 shadow-sm"
                 onclick="viewImageLightbox('{{ $wisata['nama_wisata'] }}', 'Cover Utama / Sampul', this.querySelector('.main-src-img').src)">
              <img src="{{ env('API_STORAGE') . $wisata['thumbnail'] }}" 
                   alt="{{ $wisata['nama_wisata'] }}" 
                   class="w-100 h-100 object-fit-cover main-src-img"
                   onerror="this.onerror=null; this.src='https://placehold.co/600x450/1e3a8a/ffffff?text=Thumbnail+Wisata';">
              <div class="cover-lens-overlay">
                <span class="badge bg-white text-darkblue shadow-sm rounded-pill px-3 py-2 small fw-bold">
                  <i class="fa-solid fa-maximize me-1"></i> Lihat Sampul
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7 col-xl-8 animate__animated animate__fadeInRight" style="animation-delay: 0.1s;">
          <div class="gallery-grid-holder h-100">
            
            <div class="gallery-header-meta mb-3 d-flex justify-content-between align-items-center">
              <h5 class="fw-bold text-secondary mb-0 small text-uppercase tracking-wider">
                <i class="fa-solid fa-camera-retro me-1"></i> Dokumentasi Galeri
              </h5>
              <span class="badge bg-light text-secondary rounded-pill border">
                {{ isset($wisata['pesona_wisata_file']) ? count($wisata['pesona_wisata_file']) : 0 }} Foto
              </span>
            </div>

            <div class="row g-3">
              @if(isset($wisata['pesona_wisata_file']) && count($wisata['pesona_wisata_file']) > 0)
                @foreach($wisata['pesona_wisata_file'] as $subIndex => $file)
                  
                  {{-- Mengatur variasi ukuran kolom agar tatanan baris tetap estetik --}}
                  @php 
                    $colClass = ($subIndex % 3 == 0) ? 'col-md-12 col-lg-8' : 'col-md-6 col-lg-4';
                  @endphp

                  <div class="{{ $colClass }}">
                    <div class="premium-cinematic-card position-relative rounded-4 overflow-hidden"
                         onclick="viewImageLightbox('{{ $wisata['nama_wisata'] }}', 'Dokumentasi Foto #{{ $subIndex + 1 }}', this.querySelector('.main-src-img').src)">
                      <div class="gallery-img-container">
                        <img src="{{ env('API_STORAGE') . $file['gambar'] }}" 
                             alt="Dokumentasi {{ $wisata['nama_wisata'] }}" 
                             class="w-100 h-100 object-fit-cover main-src-img"
                             onerror="this.onerror=null; this.src='https://placehold.co/600x400/0d9488/ffffff?text=Galeri+Foto';">
                      </div>
                      <div class="cinematic-overlay p-4 d-flex flex-column justify-content-end">
                        <div class="zoom-indicator-circle">
                          <i class="fa-solid fa-search text-white"></i>
                        </div>
                        <span class="text-white-50 small font-12 mb-0">{{ $wisata['nama_wisata'] }} {{ $subIndex + 1 }}</span>
                      </div>
                    </div>
                  </div>

                @endforeach
              @else
                <div class="col-12">
                  <div class="bg-light p-5 rounded-4 text-center border border-dashed">
                    <i class="fa-regular fa-images text-muted fa-2x mb-2"></i>
                    <p class="text-muted small mb-0">Belum ada foto galeri tambahan untuk destinasi ini.</p>
                  </div>
                </div>
              @endif
            </div>

          </div>
        </div>

      </div>

    @endforeach

  </div>
</main>

<div class="modal fade" id="wisataLightboxModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 bg-transparent">
      <div class="modal-header border-0 p-0 pe-2 pb-2 justify-content-end">
        <button type="button" class="btn-close btn-close-white bg-dark p-2 rounded-circle opacity-75" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 position-relative text-center">
        <img src="" id="lightboxImgTarget" alt="Preview Wisata" class="img-fluid rounded-4 shadow-lg style-lightbox-view">
        <div class="bg-dark text-white p-3 rounded-bottom-4 text-start position-absolute bottom-0 start-0 w-100" style="background: rgba(15, 23, 42, 0.85) !important; backdrop-filter: blur(8px);">
          <h5 class="fw-bold mb-0" id="lightboxTitleTarget">Nama Wisata</h5>
          <small class="text-muted" id="lightboxLocTarget">Detail Gambar</small>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function viewImageLightbox(title, info, imgSrc) {
    document.getElementById('lightboxImgTarget').src = imgSrc;
    document.getElementById('lightboxTitleTarget').innerText = title;
    document.getElementById('lightboxLocTarget').innerHTML = '<i class="fa-solid fa-camera me-1 text-gold"></i> ' + info;
    
    const modalElement = new bootstrap.Modal(document.getElementById('wisataLightboxModal'));
    modalElement.show();
  }
</script>

<style>
  .fw-extrabold { font-weight: 800; }
  .tracking-tight { letter-spacing: -0.5px; }
  .shadow-xs { box-shadow: 0 4px 20px rgba(15, 23, 42, 0.02); }
  
  .badge-modern-tag {
    background: #f1f5f9;
    color: #334155;
    padding: 6px 14px;
    border-radius: 100px;
    font-size: 0.75rem;
    font-weight: 700;
    border: 1px solid rgba(0,0,0,0.03);
  }

  /* Kartu Informasi Kiri */
  .destination-info-card {
    border: 1px solid #f1f5f9;
    min-height: 480px;
  }
  
  .header-title-custom {
    font-size: 1.75rem;
    line-height: 1.25;
  }

  .wisata-description p {
    margin-bottom: 0;
    color: #64748b;
  }

  .decorative-blur-circle {
    position: absolute;
    top: -50px; right: -50px;
    width: 150px; height: 150px;
    background: rgba(220, 38, 38, 0.03);
    filter: blur(40px);
    border-radius: 50%;
  }

  /* Cover Sampul Utama Kiri */
  .main-cover-wrapper {
    height: 200px;
    cursor: pointer;
    background-color: #f8fafc;
  }
  
  .cover-lens-overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(15, 23, 42, 0.25);
    display: flex; align-items: center; justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
  }
  
  .main-cover-wrapper:hover .cover-lens-overlay {
    opacity: 1;
  }

  /* Grid Galeri Dokumentasi Kanan */
  .premium-cinematic-card {
    height: 220px;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0,0,0,0.01);
    background-color: #f8fafc;
  }

  .gallery-img-container {
    width: 100%; height: 100%;
    overflow: hidden;
  }

  .premium-cinematic-card .main-src-img {
    transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .cinematic-overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(to top, rgba(15, 23, 42, 0.8) 0%, rgba(15, 23, 42, 0) 60%);
    z-index: 2;
    transition: all 0.4s ease;
  }

  .zoom-indicator-circle {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    width: 46px; height: 46px;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(8px);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  }

  /* Hover Interaksi */
  .premium-cinematic-card:hover .main-src-img {
    transform: scale(1.04);
  }

  .premium-cinematic-card:hover .cinematic-overlay {
    background: linear-gradient(to top, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.1) 100%);
  }

  .premium-cinematic-card:hover .zoom-indicator-circle {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }

  .style-lightbox-view {
    max-height: 80vh;
    width: 100%;
    object-fit: contain;
  }
</style>
@endsection