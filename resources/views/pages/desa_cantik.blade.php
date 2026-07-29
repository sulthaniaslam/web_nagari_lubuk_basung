@extends('pages.layout')

@section('content')
<main class="preview-page-wrapper py-5" style="background: #f1f5f9; min-height: 100vh;">
  <div class="container">
    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb custom-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Desa Cantik</li>
      </ol>
    </nav>

    <!-- Header Title -->
    <div class="row mb-5 text-center justify-content-center">
      <div class="col-lg-8 animate__animated animate__fadeIn">
        <span class="section-tag text-emerald">PROGRAM BPS & NAGARI</span>
        <h1 class="section-title-pro mb-2">Desa Cantik (Desa Cinta Statistik)</h1>
        <p class="text-muted">Penyediaan dan publikasi dokumen data statistik sektoral Nagari yang akurat, transparan, dan terintegrasi untuk perencanaan pembangunan berkelanjutan.</p>
      </div>
    </div>

    <!-- CARDS / DAFTAR FILE DESA CANTIK -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-5">
      <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
          <h5 class="fw-bold text-dark mb-1">
            <i class="fa-solid fa-file-invoice text-emerald me-2"></i>Dokumen & Data Statistik Nagari
          </h5>
          <p class="text-muted fs-7 mb-0">Daftar file dan publikasi data Desa Cantik</p>
        </div>
        <span class="badge bg-emerald-soft text-emerald rounded-pill px-3 py-2 fs-7">
          {{ isset($data['desa_cantik']) ? count($data['desa_cantik']) : 0 }} Dokumen
        </span>
      </div>

      <!-- Container Grid Dokumen -->
      <div class="row g-4">
        @if(!empty($data['desa_cantik']) && count($data['desa_cantik']) > 0)
          @foreach($data['desa_cantik'] as $item)
            @php
              // Ambil ekstensi file untuk menentukan preview/icon
              $extension = pathinfo($item['file'] ?? '', PATHINFO_EXTENSION);
              $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
              
              // Tentukan URL file
              $fileUrl = asset('storage/desa_cantik/' . $item['file']);
              
              // Format tanggal
              $createdDate = !empty($item['created_at']) 
                  ? \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d M Y') 
                  : '-';
            @endphp

            <div class="col-xl-4 col-md-6">
              <div class="card card-file border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                <div class="file-preview-wrapper bg-light text-center d-flex align-items-center justify-content-center" style="height: 180px; position: relative;">
                  @if($isImage)
                    <img src="{{ $fileUrl }}" alt="{{ $item['nama_file'] }}" class="w-100 h-100" style="object-fit: cover;">
                  @else
                    <div class="p-3 text-secondary">
                      <i class="fa-solid fa-file-pdf fa-4x text-danger mb-2"></i>
                      <span class="d-block text-uppercase fw-bold fs-7">{{ $extension }} Document</span>
                    </div>
                  @endif

                  <div class="file-overlay d-flex align-items-center justify-content-center">
                    <a href="{{ $fileUrl }}" target="_blank" class="btn btn-emerald btn-sm rounded-pill px-3 shadow">
                      <i class="fa-solid fa-eye me-1"></i> Lihat Dokumen
                    </a>
                  </div>
                </div>

                <div class="card-body p-3 d-flex flex-column justify-content-between">
                  <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                      <span class="badge bg-light text-muted border rounded-pill px-2 py-1 fs-8">
                        <i class="fa-regular fa-calendar-days me-1"></i>{{ $createdDate }}
                      </span>
                      <small class="text-muted fs-8">ID: {{ $item['id'] }}</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1 text-truncate" title="{{ $item['nama_file'] }}">
                      {{ $item['nama_file'] }}
                    </h6>
                    <p class="text-muted fs-8 mb-0 text-truncate">
                      <i class="fa-solid fa-paperclip me-1"></i>{{ $item['file'] }}
                    </p>
                  </div>

                  <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <span class="fs-8 text-emerald fw-semibold">
                      <i class="fa-solid fa-building-columns me-1"></i>{{ $item['kode_instansi'] }}
                    </span>
                    <a href="{{ $fileUrl }}" download class="btn btn-link text-secondary p-0 fs-7" title="Unduh File">
                      <i class="fa-solid fa-download"></i> Unduh
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <!-- Tampilan Jika Data Kosong -->
          <div class="col-12 text-center py-5">
            <i class="fa-solid fa-folder-open fa-3x text-muted mb-3 d-block"></i>
            <h6 class="fw-bold text-secondary">Belum ada data Desa Cantik</h6>
            <p class="text-muted fs-7">Dokumen atau file data statistik belum tersedia.</p>
          </div>
        @endif
      </div>
    </div>

  </div>
</main>

<style>
  .text-emerald {
    color: #059669;
    font-weight: 700;
    letter-spacing: 1px;
    font-size: 0.85rem;
  }
  .bg-emerald-soft { background-color: #d1fae5; }
  .btn-emerald {
    background-color: #059669;
    color: #ffffff;
    border: none;
  }
  .btn-emerald:hover {
    background-color: #047857;
    color: #ffffff;
  }

  /* Styling Card File Hover & Overlay */
  .card-file {
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0 !important;
  }
  .card-file:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08) !important;
  }

  .file-preview-wrapper {
    overflow: hidden;
  }

  .file-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(15, 23, 42, 0.4);
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .file-preview-wrapper:hover .file-overlay {
    opacity: 1;
  }

  /* Font utilities */
  .fs-7 { font-size: 0.8rem; }
  .fs-8 { font-size: 0.75rem; }
</style>
@endsection