@extends('pages.layout')

@section('content')
<main class="visi-misi-visual-wrapper py-5" style="background: #f4f7fa;">
  <div class="container">
    
    <!-- Breadcrumb Navigasi -->
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb custom-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Visi & Misi Visual</li>
      </ol>
    </nav>

    <!-- Header Terintegrasi dengan Tombol Aksi Global -->
    <div class="row mb-5 align-items-center g-3 text-center text-md-start">
      <div class="col-md-7 animate__animated animate__fadeInLeft">
        <span class="section-tag text-crimson">Galeri Infografis</span>
        <h1 class="section-title-pro mb-2">Visi & Misi Nagari</h1>
        <p class="section-subtitle-custom mb-0">Dokumentasi grafis resmi arah kebijakan strategis jangka panjang Pemerintah Nagari.</p>
      </div>
      {{-- <div class="col-md-5 text-center text-md-end animate__animated animate__fadeInRight">
        <div class="d-inline-flex gap-2 bg-white p-2 rounded-pill shadow-sm border">
          <!-- Tombol Download Koleksi Gambar -->
          <a href="{{ asset('images/visi-nagari.png') }}" download="Visi_Nagari.png" class="btn btn-sm btn-primary rounded-pill px-3">
            <i class="fa-solid fa-download me-1"></i> Unduh Visi
          </a>
          <a href="{{ asset('images/misi-nagari.png') }}" download="Misi_Nagari.png" class="btn btn-sm btn-success text-white border-0 rounded-pill px-3">
            <i class="fa-solid fa-download me-1"></i> Unduh Misi
          </a>
        </div>
      </div> --}}
    </div>

    <!-- ==========================================================================
         VARIASI TERBAIK: INTERAKTIF SEGMENTED TABS
         ========================================================================== -->
    <div class="row justify-content-center">
      <div class="col-lg-10 animate__animated animate__fadeInUp">
        
        <!-- Navigasi Tab Pengendali Gambar -->
        <ul class="nav nav-pills custom-segmented-tabs justify-content-center mb-4 p-1 bg-white rounded-pill shadow-sm border" id="visiMisiTab" role="tablist" style="max-width: 400px; margin: 0 auto;">
          <li class="nav-item flex-grow-1" role="presentation">
            <button class="nav-link active w-100 rounded-pill fw-bold" id="visi-tab" data-bs-toggle="tab" data-bs-target="#visi-pane" type="button" role="tab" aria-controls="visi-pane" aria-selected="true">
              <i class="fa-solid fa-compass me-2"></i>Gambar Visi
            </button>
          </li>
          <li class="nav-item flex-grow-1" role="presentation">
            <button class="nav-link w-100 rounded-pill fw-bold" id="misi-tab" data-bs-toggle="tab" data-bs-target="#misi-pane" type="button" role="tab" aria-controls="misi-pane" aria-selected="false">
              <i class="fa-solid fa-bullseye me-2"></i>Gambar Misi
            </button>
          </li>
        </ul>

        <!-- Kontainer Isi Gambar -->
        <div class="tab-content pt-2" id="visiMisiTabContent">
          
          <!-- Tab Panel 1: Gambar Visi -->
          <div class="tab-pane fade show active" id="visi-pane" role="tabpanel" aria-labelledby="visi-tab" tabindex="0">
            <div class="card border-0 preview-img-card p-3 shadow-sm position-relative">
              <div class="card-badge-indicator bg-primary text-white">INFOGRAFIS VISI</div>
              <div class="img-frame rounded-4 overflow-hidden bg-white text-center">
                <img src="{{ env('API_STORAGE') . $data['visimisi']['visi'] }}" 
                     alt="Bagan Visi Nagari" 
                     class="img-fluid dynamic-zoom-target"
                     onclick="openVisualLightbox(this.src)"
                     onerror="this.onerror=null; this.src='https://placehold.co/1000x600/e0f2fe/0369a1?text=Gambar+Visi+Nagari';">
              </div>
              <div class="text-center mt-3 text-muted small">
                <i class="fa-solid fa-magnifying-glass-plus me-1"></i> Klik gambar untuk memperbesar resolusi penuh
              </div>
            </div>
          </div>

          <!-- Tab Panel 2: Gambar Misi -->
          <div class="tab-pane fade" id="misi-pane" role="tabpanel" aria-labelledby="misi-tab" tabindex="0">
            <div class="card border-0 preview-img-card p-3 shadow-sm position-relative">
              <div class="card-badge-indicator bg-success text-white">INFOGRAFIS MISI</div>
              <div class="img-frame rounded-4 overflow-hidden bg-white text-center">
                <img src="{{ env('API_STORAGE') . $data['visimisi']['misi'] }}" 
                     alt="Bagan Misi Nagari" 
                     class="img-fluid dynamic-zoom-target"
                     onclick="openVisualLightbox(this.src)"
                     onerror="this.onerror=null; this.src='https://placehold.co/1000x600/dcfce7/15803d?text=Gambar+Misi+Nagari';">
              </div>
              <div class="text-center mt-3 text-muted small">
                <i class="fa-solid fa-magnifying-glass-plus me-1"></i> Klik gambar untuk memperbesar resolusi penuh
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>
</main>

<!-- ==========================================================================
   GLOBAL LIGHTBOX POP-UP MODAL (OTOMATIS MENGIKUTI GAMBAR YANG DI-KLIK)
   ========================================================================== -->
<div class="modal fade" id="globalLightboxModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 bg-transparent">
      <div class="modal-header border-0 p-0 pe-2 pb-2 justify-content-end">
        <button type="button" class="btn-close btn-close-white bg-dark p-2 rounded-circle opacity-75" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 text-center">
        <img src="" id="lightboxSourceImg" alt="Pratinjau Besar" class="img-fluid rounded-3 shadow-lg" style="max-height: 85vh; object-fit: contain;">
      </div>
    </div>
  </div>
</div>

<!-- ==========================================================================
   ENGINE JAVASCRIPT & STYLE INTERAKTIF 
   ========================================================================== -->
<script>
  // Fungsi pemanggil modal gambar dinamis
  function openVisualLightbox(imageSrc) {
    const modalImg = document.getElementById('lightboxSourceImg');
    modalImg.src = imageSrc;
    
    const myModal = new bootstrap.Modal(document.getElementById('globalLightboxModal'));
    myModal.show();
  }
</script>

<style>
  /* Styling Tab Menu Bersegmen */
  .custom-segmented-tabs .nav-link {
    color: #64748b;
    background: transparent;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    font-size: 0.9rem;
  }
  .custom-segmented-tabs .nav-link.active {
    color: #ffffff !important;
    background-color: #1e3a8a !important; /* Biru gelap */
    box-shadow: 0 4px 12px rgba(30, 58, 138, 0.2);
  }

  /* Card Frame Gambar */
  .preview-img-card {
    border-radius: 24px;
    background: #ffffff;
    border: 1px solid rgba(0,0,0,0.03) !important;
  }
  
  .img-frame {
    border: 1px solid #f1f5f9;
    box-shadow: inset 0 2px 8px rgba(0,0,0,0.01);
  }

  .dynamic-zoom-target {
    cursor: zoom-in;
    transition: all 0.4s ease;
  }
  .dynamic-zoom-target:hover {
    transform: scale(1.01);
    filter: brightness(0.98);
  }

  /* Indikator Badge nempel di sisi card kiri atas */
  .card-badge-indicator {
    position: absolute;
    top: -12px;
    left: 24px;
    padding: 4px 14px;
    font-size: 0.7rem;
    font-weight: 800;
    letter-spacing: 0.8px;
    border-radius: 30px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
  }
</style>
@endsection