@extends('pages.layout')

@section('content')
<main class="preview-page-wrapper py-5" style="background: #f8fafc;">
  <div class="container">
    
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb custom-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Alur Pelayanan Publik PPID</li>
      </ol>
    </nav>

    <div class="row mb-5 text-center justify-content-center">
      <div class="col-lg-8 animate__animated animate__fadeIn">
        <span class="section-tag text-crimson">Media Informasi</span>
        <h1 class="section-title-pro mb-2">Alur Pelayanan Publik PPID</h1>
        <p class="section-subtitle-custom">Pilih tab di bawah ini untuk melihat alur pelayanan dan dokumentasi resmi secara interaktif.</p>
      </div>
    </div>

    @if(!empty($data['ppid_pelayanan_publik']) && count($data['ppid_pelayanan_publik']) > 0)
      @foreach($data['ppid_pelayanan_publik'] as $ppid)
        <div class="row justify-content-center mb-4">
          <div class="col-lg-9">
            <ul class="nav nav-pills nav-justified custom-tabs p-2 bg-white shadow-sm rounded-4" id="ppidTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active fw-semibold py-3 rounded-3" id="alur-info-tab" data-bs-toggle="tab" data-bs-target="#alur-info" type="button" role="tab" aria-controls="alur-info" aria-selected="true">
                  <i class="fa-solid fa-circle-info me-2"></i>Alur Informasi
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold py-3 rounded-3" id="alur-keberatan-tab" data-bs-toggle="tab" data-bs-target="#alur-keberatan" type="button" role="tab" aria-controls="alur-keberatan" aria-selected="false">
                  <i class="fa-solid fa-triangle-exclamation me-2"></i>Alur Keberatan
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold py-3 rounded-3" id="alur-sengketa-tab" data-bs-toggle="tab" data-bs-target="#alur-sengketa" type="button" role="tab" aria-controls="alur-sengketa" aria-selected="false">
                  <i class="fa-solid fa-gavel me-2"></i>Alur Sengketa
                </button>
              </li>
            </ul>
          </div>
        </div>

        <div class="tab-content" id="ppidTabContent">
          
          <div class="tab-pane fade show active" id="alur-info" role="tabpanel" aria-labelledby="alur-info-tab">
            <div class="row justify-content-center">
              <div class="col-lg-9">
                <div class="card border-0 glass-card p-4 shadow-sm style-image-card">
                  <h3 class="fw-bold mb-3 text-dark">Alur Permohonan Informasi Publik</h3>
                  
                  <div class="img-preview-frame rounded-4 overflow-hidden position-relative bg-light mb-4">
                    <img src="{{ env('API_STORAGE') . $ppid['gambar_alur_informasi'] }}" 
                         alt="Gambar Alur Informasi" 
                         class="w-100 h-auto d-block img-fluid click-to-zoom"
                         onclick="triggerLightbox(this.src)"
                         style="cursor: zoom-in;"
                         onerror="this.onerror=null; this.src='https://placehold.co/1200x700?text=Gambar+Alur+Informasi+Tidak+Ditemukan';">
                    
                    <div class="image-overlay-hint" onclick="triggerLightbox(this.previousElementSibling.src)">
                      <div class="hint-content text-white text-center">
                        <i class="fa-solid fa-magnifying-glass-plus fa-2x mb-2"></i>
                        <p class="mb-0 fw-semibold small">Perbesar Gambar</p>
                      </div>
                    </div>
                  </div>

                  <div class="text-justify text-secondary lh-lg" style="white-space: pre-line;">
                    {!! e($ppid['alur_informasi']) !!}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="alur-keberatan" role="tabpanel" aria-labelledby="alur-keberatan-tab">
            <div class="row justify-content-center">
              <div class="col-lg-9">
                <div class="card border-0 glass-card p-4 shadow-sm style-image-card">
                  <h3 class="fw-bold mb-3 text-dark">Alur Pengajuan Keberatan</h3>
                  
                  <div class="img-preview-frame rounded-4 overflow-hidden position-relative bg-light mb-4">
                    <img src="{{ env('API_STORAGE') . $ppid['gambar_alur_pengajuan_keberatan'] }}" 
                         alt="Gambar Alur Keberatan" 
                         class="w-100 h-auto d-block img-fluid click-to-zoom"
                         onclick="triggerLightbox(this.src)"
                         style="cursor: zoom-in;"
                         onerror="this.onerror=null; this.src='https://placehold.co/1200x700?text=Gambar+Alur+Keberatan+Tidak+Ditemukan';">
                    
                    <div class="image-overlay-hint" onclick="triggerLightbox(this.previousElementSibling.src)">
                      <div class="hint-content text-white text-center">
                        <i class="fa-solid fa-magnifying-glass-plus fa-2x mb-2"></i>
                        <p class="mb-0 fw-semibold small">Perbesar Gambar</p>
                      </div>
                    </div>
                  </div>

                  <div class="text-justify text-secondary lh-lg" style="white-space: pre-line;">
                    {!! e($ppid['alur_pengajuan_keberatan']) !!}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="alur-sengketa" role="tabpanel" aria-labelledby="alur-sengketa-tab">
            <div class="row justify-content-center">
              <div class="col-lg-9">
                <div class="card border-0 glass-card p-4 shadow-sm style-image-card">
                  <h3 class="fw-bold mb-3 text-dark">Alur Penyelesaian Sengketa</h3>
                  
                  <div class="img-preview-frame rounded-4 overflow-hidden position-relative bg-light mb-4">
                    <img src="{{ env('API_STORAGE') . $ppid['gambar_alur_sengketa'] }}" 
                         alt="Gambar Alur Sengketa" 
                         class="w-100 h-auto d-block img-fluid click-to-zoom"
                         onclick="triggerLightbox(this.src)"
                         style="cursor: zoom-in;"
                         onerror="this.onerror=null; this.src='https://placehold.co/1200x700?text=Gambar+Alur+Sengketa+Tidak+Ditemukan';">
                    
                    <div class="image-overlay-hint" onclick="triggerLightbox(this.previousElementSibling.src)">
                      <div class="hint-content text-white text-center">
                        <i class="fa-solid fa-magnifying-glass-plus fa-2x mb-2"></i>
                        <p class="mb-0 fw-semibold small">Perbesar Gambar</p>
                      </div>
                    </div>
                  </div>

                  <div class="text-justify text-secondary lh-lg" style="white-space: pre-line;">
                    {!! e($ppid['alur_sengketa']) !!}
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      @endforeach
    @else
      <div class="row justify-content-center">
        <div class="col-lg-9 text-center py-5">
          <p class="text-muted">Data pelayanan publik saat ini belum tersedia.</p>
        </div>
      </div>
    @endif

  </div>
</main>

<div class="modal fade" id="previewLightboxModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 bg-transparent">
      <div class="modal-header border-0 p-0 pe-2 pb-2 justify-content-end">
        <button type="button" class="btn-close btn-close-white bg-dark p-2 rounded-circle opacity-75" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 text-center">
        <img src="" id="lightboxTargetImg" alt="Pratinjau Besar" class="img-fluid rounded-3 shadow-lg style-modal-img">
      </div>
    </div>
  </div>
</div>

<script>
  function triggerLightbox(imageSrc) {
    const targetImg = document.getElementById('lightboxTargetImg');
    targetImg.src = imageSrc;
    
    const bootstrapModal = new bootstrap.Modal(document.getElementById('previewLightboxModal'));
    bootstrapModal.show();
  }
</script>

<style>
  /* Kustomisasi Tampilan Nav Tabs */
  .custom-tabs {
    border: 1px solid #e2e8f0;
  }
  .custom-tabs .nav-link {
    color: #64748b;
    transition: all 0.2s ease;
  }
  .custom-tabs .nav-link.active {
    background-color: #crimson !important; /* Ganti dengan variabel warna crimson Anda jika ada */
    background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
    color: #ffffff !important;
  }
  
  .style-image-card {
    border-radius: 24px;
    background: #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.04) !important;
  }

  .img-preview-frame {
    position: relative;
    border: 1px solid #e2e8f0;
  }
  
  .click-to-zoom {
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  }
  
  .img-preview-frame:hover .click-to-zoom {
    transform: scale(1.01);
  }

  .image-overlay-hint {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(30, 41, 59, 0.4);
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

  .style-modal-img {
    max-height: 85vh;
    object-fit: contain;
  }
</style>
@endsection