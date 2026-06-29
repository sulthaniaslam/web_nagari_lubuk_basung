@extends('pages.layout')

@section('content')
<main class="semua-galeri-wrapper">
  <div class="container">
    
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb custom-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Semua Galeri</li>
      </ol>
    </nav>

    <div class="row align-items-center mb-5 g-4 text-center text-md-start">
      <div class="col-md-7 animate__animated animate__fadeInLeft">
        <span class="section-tag text-crimson">Arsip Dokumentasi</span>
        <h1 class="section-title-pro mb-2">Pustaka Visual Kegiatan</h1>
        <p class="section-subtitle-custom mb-0">Kumpulan rekam jejak digital dari seluruh transparansi program kerja dan perayaan kebudayaan Nagari.</p>
      </div>
      <div class="col-md-5 d-flex justify-content-md-end justify-content-center animate__animated animate__fadeInRight">
        <div class="d-flex flex-wrap gap-2 filter-group-container m-0">
          <button class="btn btn-filter active">Semua</button>
          <button class="btn btn-filter">Pembangunan</button>
          <button class="btn btn-filter">Budaya</button>
          <button class="btn btn-filter">PKK</button>
        </div>
      </div>
    </div>

    <div class="row g-4">
      
        {{-- <div class="col-xl-4 col-md-6">
          <div class="gallery-item-box grid-height-standard">
            <div class="gallery-bg-placeholder bg-rgba-blue">
              <i class="fa-regular fa-image fa-3x text-primary opacity-25"></i>
            </div>
            <div class="gallery-overlay-content">
              <span class="gallery-badge badge-blue">Pembangunan</span>
              <h5 class="gallery-item-title">Peresmian Jembatan Penghubung</h5>
              <p class="gallery-item-date"><i class="fa-regular fa-calendar me-1"></i> 12 Juni 2026</p>
              <a href="#" class="gallery-zoom-trigger" data-bs-toggle="modal" data-bs-target="#galleryModal" data-title="Peresmian Jembatan Penghubung" data-category="Pembangunan" data-badge-class="badge-blue" data-color-class="bg-rgba-blue" data-icon-class="text-primary" data-date="12 Juni 2026"><i class="fa-solid fa-maximize"></i></a>
            </div>
          </div>
        </div> --}}

        @foreach ($data['galeri'] as $item)
        <div class="col-xl-4 col-md-6">
          <div class="gallery-item-box grid-height-standard">
            
            <div class="gallery-bg-placeholder">
              @if($item['file'])
                <img src="{{ env('API_STORAGE') . $item['file'] }}" alt="{{ $item['nama'] }}" style="width: 100%; height: 100%; object-fit: cover;">
              @else
                <div class="bg-rgba-crimson w-100 h-100 d-flex align-items-center justify-content-center">
                  <i class="fa-regular fa-image fa-3x text-crimson opacity-25"></i>
                </div>
              @endif
            </div>

            <div class="gallery-overlay-content">
              <span class="gallery-badge badge-crimson">Dokumentasi</span>
              <h5 class="gallery-item-title">{{ $item['nama'] }}</h5>
              <p class="gallery-item-date">
                <i class="fa-regular fa-calendar me-1"></i> 
                {{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y') }}
              </p>
              
              <a href="#" class="gallery-zoom-trigger" 
                data-bs-toggle="modal" 
                data-bs-target="#galleryModal" 
                data-title="{{ $item['nama'] }}"
                data-image="{{ env('API_STORAGE') . $item['file'] }}"
                data-category="Dokumentasi" 
                data-badge-class="badge-crimson" 
                data-color-class="bg-rgba-crimson" 
                data-icon-class="text-crimson" 
                data-date="{{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y') }}">
                <i class="fa-solid fa-maximize"></i>
              </a>
            </div>
          </div>
        </div>
        @endforeach


        {{-- <div class="col-xl-4 col-md-6">
          <div class="gallery-item-box grid-height-standard">
            <div class="gallery-bg-placeholder bg-rgba-green">
              <i class="fa-regular fa-image fa-3x text-green opacity-25"></i>
            </div>
            <div class="gallery-overlay-content">
              <span class="gallery-badge badge-green">Kegiatan PKK</span>
              <h5 class="gallery-item-title">Lomba Olahan Pangan Sehat</h5>
              <p class="gallery-item-date"><i class="fa-regular fa-calendar me-1"></i> 28 Mei 2026</p>
              <a href="#" class="gallery-zoom-trigger" data-bs-toggle="modal" data-bs-target="#galleryModal" data-title="Lomba Olahan Pangan Sehat" data-category="Kegiatan PKK" data-badge-class="badge-green" data-color-class="bg-rgba-green" data-icon-class="text-green" data-date="28 Mei 2026"><i class="fa-solid fa-maximize"></i></a>
            </div>
          </div>
        </div> --}}

      </div>

    <nav class="mt-5 pt-4 d-flex justify-content-center animate__animated animate__fadeInUp">
      <ul class="pagination custom-pagination gap-2">
        <li class="page-item disabled">
          <a class="page-link-circle" href="#" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></a>
        </li>
        <li class="page-item active"><a class="page-link-circle" href="#">1</a></li>
        <li class="page-item"><a class="page-link-circle" href="#">2</a></li>
        <li class="page-item"><a class="page-link-circle" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link-circle" href="#" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></a>
        </li>
      </ul>
    </nav>

  </div>
</main>

<div class="modal fade gallery-lightbox" id="galleryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content glass-card border-0">
      <div class="modal-header border-0 pb-0">
        <div>
          <span class="badge badge-crimson text-uppercase tracking-wider small" id="modalBadge" style="letter-spacing: 0.5px;">Kategori</span>
          <h5 class="modal-title fw-bold text-darkblue mt-1" id="modalTitle">Judul Foto</h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        
        <img id="modalGalleryImage" src="" alt="" class="img-fluid" style="max-height: 80vh;">
        
      </div>
      <div class="modal-footer">
        <span class="modal-date text-muted">Tanggal akan muncul disini</span>
      </div>
    </div>
  </div>
</div>
{{-- <div class="modal fade gallery-lightbox" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content glass-card border-0">
        <div class="modal-header border-0 pb-0">
          <div>
            <span class="badge text-uppercase tracking-wider small" id="modalBadge" style="letter-spacing: 0.5px;">Kategori</span>
            <h5 class="modal-title fw-bold text-darkblue mt-1" id="modalTitle">Judul Foto</h5>
          </div>
          <button type="button" class="btn-close btn-close-custom" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center pt-3">
          <div class="modal-preview-box" id="modalImageContainer">
            <i class="fa-regular fa-image fa-6x opacity-25" id="modalPlaceholderIcon"></i>
          </div>
          <p class="text-muted small mt-3 mb-0" id="modalDate"><i class="fa-regular fa-calendar me-1"></i> Tanggal</p>
        </div>
      </div>
    </div>
</div> --}}

<script>
  document.addEventListener('DOMContentLoaded', function () {
      var galleryModal = document.getElementById('galleryModal');
      
      if (galleryModal) {
          galleryModal.addEventListener('show.bs.modal', function (event) {
              // Tombol (a href) yang memicu modal
              var button = event.relatedTarget;
              
              // Ekstrak data dari atribut data-*
              var title = button.getAttribute('data-title');
              var imageSrc = button.getAttribute('data-image');
              var date = button.getAttribute('data-date');
              
              // Cari elemen di dalam modal yang ingin diupdate
              var modalTitle = galleryModal.querySelector('.modal-title'); // Sesuaikan class target judul Anda
              var modalImage = galleryModal.querySelector('#modalGalleryImage'); // ID gambar target di dalam modal
              var modalDate = galleryModal.querySelector('.modal-date');   // Sesuaikan class target tanggal Anda
  
              // Masukkan data ke elemen modal
              if (modalTitle) modalTitle.textContent = title;
              if (modalDate) modalDate.textContent = date;
              
              if (modalImage) {
                  // Masukkan URL gambar ke atribut 'src' tag img di modal
                  modalImage.setAttribute('src', imageSrc);
                  modalImage.setAttribute('alt', title);
              }
          });
      }
  });
</script>
@endsection