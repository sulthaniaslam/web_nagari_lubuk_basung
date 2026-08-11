@extends('pages.layout')

@section('content')
<main class="tabel-data-wrapper py-5" style="background: #f8fafc; min-height: 85vh;">
    <div class="container">
      
      <!-- Breadcrumb Navigasi -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb custom-breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Download Formulir Permohonan Informasi</li>
        </ol>
      </nav>

      <!-- Title Header -->
      <div class="row justify-content-between align-items-center mb-4 g-3 text-center text-md-start">
        <div class="col-md-12 animate__animated animate__fadeInLeft">
          <span class="section-tag text-crimson">Transparansi Dokumentasi</span>
          <h1 class="section-title-pro mb-2">Download Formulir Permohonan Informasi</h1>
          <p class="text-muted mb-0">Silakan unduh atau cetak formulir resmi permohonan informasi publik di bawah ini sebelum mengajukan berkas secara langsung.</p>
        </div>
      </div>

      <!-- Bento / Glass Card untuk Formulir PDF -->
      <div class="glass-card bento-card border-0 p-0 overflow-hidden shadow-sm animate__animated animate__fadeInUp bg-white rounded-4">
        
        <!-- Header Dokumen (Action Bar) -->
        <div class="p-3 p-md-4 border-bottom bg-light d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
          <div class="d-flex align-items-center gap-3">
            <div class="pdf-icon-badge rounded-3 p-3 bg-danger-soft text-danger d-none d-sm-block">
              <i class="fa-solid fa-file-pdf fa-2xl"></i>
            </div>
            <div>
              <h5 class="fw-bold mb-1 text-dark">Formulir Permohonan Informasi PPID</h5>
              <span class="badge bg-secondary text-white rounded-pill px-3 py-1 fs-7">Format: PDF</span>
              <span class="text-muted ms-2 fs-7 d-none d-sm-inline">• Siap Cetak (A4)</span>
            </div>
          </div>

          <!-- Tombol Aksi Unduh & Cetak -->
          <div class="d-flex align-items-center gap-2">
            <a href="https://rangkiang.agamkab.go.id/storage/{{ $formulir }}" target="_blank" class="btn btn-outline-secondary btn-action rounded-pill px-3 py-2">
              <i class="fa-solid fa-print me-1"></i> Cetak / Buka
            </a>
            <a href="https://rangkiang.agamkab.go.id/storage/{{ $formulir }}" download class="btn btn-crimson btn-action rounded-pill px-4 py-2">
              <i class="fa-solid fa-download me-1"></i> Unduh PDF
            </a>
          </div>
        </div>

        <!-- PDF Viewer Container -->
        <div class="pdf-viewer-wrapper position-relative">
          <!-- Embed PDF untuk Layar Desktop / Tablet -->
          <embed 
            src="https://rangkiang.agamkab.go.id/storage/{{ $formulir }}#toolbar=1&navpanes=0" 
            type="application/pdf" 
            width="100%" 
            height="700px" 
            class="d-none d-md-block"
          />

          <!-- Fallback Tampilan Mobile (Sebab Perangkat Smartphone Sering Tidak Mendukung Embed PDF) -->
          <div class="p-5 text-center d-block d-md-none bg-light">
            <i class="fa-solid fa-file-pdf text-danger fa-4x mb-3"></i>
            <h6 class="fw-bold text-dark mb-2">Pratinjau PDF Berkas Formulir</h6>
            <p class="text-muted fs-7 mb-4">Pratinjau otomatis PDF tidak didukung penuh pada peramban seluler. Silakan unduh atau buka berkas melalui tombol di bawah.</p>
            <a href="https://rangkiang.agamkab.go.id/storage/{{ $formulir }}" target="_blank" class="btn btn-crimson rounded-pill px-4 py-2">
              <i class="fa-solid fa-arrow-up-right-from-square me-2"></i> Buka File Formulir
            </a>
          </div>
        </div>

      </div>

    </div>
</main>

<style>
  /* Kustomisasi Teks & Tag */
  .text-crimson {
    color: #991b1b !important;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 0.85rem;
  }

  .bg-danger-soft {
    background-color: #fee2e2;
  }

  /* Kustom Tombol Crimson (Ciri Khas PPID) */
  .btn-crimson {
    background-color: #991b1b;
    color: #ffffff;
    font-weight: 600;
    border: none;
    transition: all 0.2s ease-in-out;
  }

  .btn-crimson:hover {
    background-color: #7f1d1d;
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(153, 27, 27, 0.25);
  }

  .btn-action {
    font-size: 0.9rem;
  }

  .fs-7 {
    font-size: 0.8rem;
  }

  /* Style Wadah Bento Card */
  .bento-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  }
</style>
@endsection