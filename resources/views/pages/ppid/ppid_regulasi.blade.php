@extends('pages.layout')

@section('content')
<main class="preview-page-wrapper py-5" style="background: #f8fafc;">
  <div class="container">
    
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb custom-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Regulasi & SOP PPID</li>
      </ol>
    </nav>

    <div class="row mb-5 text-center justify-content-center">
      <div class="col-lg-8 animate__animated animate__fadeIn">
        <span class="section-tag text-crimson">PPID Nagari</span>
        <h1 class="section-title-pro mb-2">Regulasi & Standar Operasional</h1>
        <p class="text-muted">Pedoman keterbukaan informasi publik dan alur pelayanan informasi di lingkungan Nagari.</p>
      </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-11">
            
            <!-- Navigasi Tab Premium -->
            <ul class="nav nav-pills custom-nav-pills mb-4 justify-content-center" id="regulasiTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="dasar-hukum-tab" data-bs-toggle="tab" data-bs-target="#dasar-hukum" type="button" role="tab" aria-controls="dasar-hukum" aria-selected="true">
                        <i class="fa-solid fa-scale-balanced me-2"></i> Dasar Hukum PPID
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sop-tab" data-bs-toggle="tab" data-bs-target="#sop" type="button" role="tab" aria-controls="sop" aria-selected="false">
                        <i class="fa-solid fa-diagram-project me-2"></i> SOP Pelayanan Informasi PPID
                    </button>
                </li>
            </ul>

            <!-- Konten Tab (PDF Viewer) -->
            <div class="tab-content" id="regulasiTabContent">
                
                <!-- Tab 1: Dasar Hukum -->
                <div class="tab-pane fade show active" id="dasar-hukum" role="tabpanel" aria-labelledby="dasar-hukum-tab">
                    <div class="card pdf-card border-0 shadow-sm animate__animated animate__fadeInUp">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4 border-bottom-0">
                            <h5 class="mb-0 text-dark font-weight-bold"><i class="fa-solid fa-file-pdf text-danger me-2"></i> Dokumen Dasar Hukum</h5>
                            <a href="{{ env('API_STORAGE') . $data['ppid_regulasi']['dasar_hukum'] }}" class="btn btn-sm btn-crimson" download>
                                <i class="fa-solid fa-download me-1"></i> Unduh Dokumen
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="pdf-container">
                                <embed src="{{ env('API_STORAGE') . $data['ppid_regulasi']['dasar_hukum'] }}#toolbar=1" type="application/pdf" width="100%" height="650px" />
                                <div class="pdf-fallback-mobile text-center p-4 d-md-none">
                                    <p class="text-muted mb-3">Pratinjau PDF tidak didukung otomatis pada perangkat mobile.</p>
                                    <a href="{{ env('API_STORAGE') . $data['ppid_regulasi']['dasar_hukum'] }}" class="btn btn-crimson w-100" target="_blank">
                                        <i class="fa-solid fa-file-invoice me-2"></i> Buka / Lihat PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: SOP -->
                <div class="tab-pane fade" id="sop" role="tabpanel" aria-labelledby="sop-tab">
                    <div class="card pdf-card border-0 shadow-sm animate__animated animate__fadeInUp">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4 border-bottom-0">
                            <h5 class="mb-0 text-dark font-weight-bold"><i class="fa-solid fa-file-pdf text-danger me-2"></i> Dokumen Standar Operasional Prosedur</h5>
                            <a href="{{ env('API_STORAGE') . $data['ppid_regulasi']['sop'] }}" class="btn btn-sm btn-crimson" download>
                                <i class="fa-solid fa-download me-1"></i> Unduh SOP
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="pdf-container">
                                <embed src="{{ env('API_STORAGE') . $data['ppid_regulasi']['sop'] }}#toolbar=1" type="application/pdf" width="100%" height="650px" />
                                <div class="pdf-fallback-mobile text-center p-4 d-md-none">
                                    <p class="text-muted mb-3">Pratinjau PDF tidak didukung otomatis pada perangkat mobile.</p>
                                    <a href="{{ env('API_STORAGE') . $data['ppid_regulasi']['sop'] }}" class="btn btn-crimson w-100" target="_blank">
                                        <i class="fa-solid fa-file-invoice me-2"></i> Buka / Lihat SOP
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

  </div>
</main>

<style>
  /* Kustomisasi Desain Tab Navigasi */
  .custom-nav-pills .nav-link {
    color: #64748b;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    padding: 12px 24px;
    font-weight: 600;
    border-radius: 10px;
    margin: 0 5px;
    transition: all 0.3s ease;
  }
  
  .custom-nav-pills .nav-link.active, 
  .custom-nav-pills .nav-link:hover {
    background-color: #991b1b !important;
    color: #ffffff !important;
    border-color: #991b1b;
    box-shadow: 0 4px 12px rgba(153, 27, 27, 0.15);
  }

  /* Kustomisasi Wadah PDF Card */
  .pdf-card {
    border-radius: 16px;
    overflow: hidden;
  }

  .btn-crimson {
    background-color: #991b1b;
    color: white;
    border-radius: 8px;
    padding: 8px 16px;
    font-weight: 500;
    transition: background 0.2s;
  }

  .btn-crimson:hover {
    background-color: #7f1d1d;
    color: white;
  }


  /* Sembunyikan embed viewer di smartphone dan tampilkan tombol pengganti fallback */
  @media (max-width: 768px) {
    embed {
        display: none !important;
    }
    .pdf-fallback-mobile {
        display: block !important;
    }
  }
  @media (min-width: 769px) {
    .pdf-fallback-mobile {
        display: none !important;
    }
  }
</style>
@endsection