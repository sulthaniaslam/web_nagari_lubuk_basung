@extends('pages.layout')

@section('content')
<main class="preview-page-wrapper py-5" style="background: #f8fafc;">
  <div class="container">
    
    <!-- Breadcrumb Navigasi -->
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb custom-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Maklumat Pelayanan</li>
      </ol>
    </nav>

    <!-- Header Section -->
    <div class="row mb-4 text-center justify-content-center">
      <div class="col-lg-8 animate__animated animate__fadeIn">
        <span class="section-tag text-crimson">Media Dokumentasi</span>
        <h1 class="section-title-pro mb-2">Maklumat Pelayanan</h1>
        <p class="section-subtitle-custom">Klik pada gambar di bawah ini untuk melihat dalam resolusi penuh secara interaktif.</p>
      </div>
    </div>

    <!-- ==========================================================================
         IMAGE CONTAINER WIDGET
         ========================================================================== -->
    <div class="row justify-content-center">
      <div class="col-lg-9 animate__animated animate__fadeInUp">
        <div class="card border-0 glass-card p-3 shadow-sm style-image-card">
          <div class="img-preview-frame rounded-4 overflow-hidden position-relative bg-light">
            {{-- Ubah path 'images/contoh-gambar.jpg' sesuai dengan lokasi file gambar Anda --}}
            <img src="{{ $data['gambar_maklumat_pelayanan'] }}" 
                 alt="Dokumentasi Nagari" 
                 class="w-100 h-auto d-block img-fluid click-to-zoom"
                 onclick="triggerLightbox(this.src)"
                 style="cursor: zoom-in;"
                 onerror="this.onerror=null; this.src='https://placehold.co/1200x700?text=Klik+Untuk+Preview+Gambar';">
                 
            <!-- Overlay Hint (Muncul saat kursor diarahkan ke gambar) -->
            <div class="image-overlay-hint" onclick="triggerLightbox(this.previousElementSibling.src)">
              <div class="hint-content text-white text-center">
                <i class="fa-solid fa-magnifying-glass-plus fa-2x mb-2"></i>
                <p class="mb-0 fw-semibold small">Perbesar Gambar</p>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-12">
              <div class="container mt-4 text-justify">
                {!! $data['maklumat_pelayanan'] !!}
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

  </div>
</main>

<!-- ==========================================================================
   MODAL POP-UP LIGHTBOX (PRATINJAU DILAYAR PENUH)
   ========================================================================== -->
<div class="modal fade" id="previewLightboxModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 bg-transparent">
      <!-- Tombol Tutup di Kanan Atas -->
      <div class="modal-header border-0 p-0 pe-2 pb-2 justify-content-end">
        <button type="button" class="btn-close btn-close-white bg-dark p-2 rounded-circle opacity-75" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Tempat Gambar Ditampilkan -->
      <div class="modal-body p-0 text-center">
        <img src="" id="lightboxTargetImg" alt="Pratinjau Besar" class="img-fluid rounded-3 shadow-lg style-modal-img">
      </div>
    </div>
  </div>
</div>

<!-- ==========================================================================
   JAVASCRIPT & STYLE INTERAKTIF GAMBAR
   ========================================================================== -->
<script>
  // Fungsi untuk memasukkan sumber gambar ke modal dan menampilkannya
  function triggerLightbox(imageSrc) {
    const targetImg = document.getElementById('lightboxTargetImg');
    targetImg.src = imageSrc;
    
    const bootstrapModal = new bootstrap.Modal(document.getElementById('previewLightboxModal'));
    bootstrapModal.show();
  }
</script>

<style>
  /* Pembungkus Frame Gambar Utama */
  .style-image-card {
    border-radius: 24px;
    background: #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.04) !important;
  }

  .img-preview-frame {
    position: relative;
    border: 1px solid #e2e8f0;
  }
  
  /* Efek Animasi Zoom Gambar */
  .click-to-zoom {
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  }
  
  .img-preview-frame:hover .click-to-zoom {
    transform: scale(1.02);
  }

  /* Efek Gelap & Ikon Hint saat Hover */
  .image-overlay-hint {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(30, 41, 59, 0.4); /* Gelap transparan */
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    cursor: zoom-in;
  }

  .img-preview-frame:hover .image-overlay-hint {
    opacity: 1;
  }

  /* Batasan Tinggi Gambar di Layar Besar */
  .style-modal-img {
    max-height: 85vh;
    object-fit: contain;
  }
</style>
@endsection