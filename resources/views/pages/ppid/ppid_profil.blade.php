@extends('pages.layout')

@section('content')
<main class="ppid-cosmic-canvas" style="background: #fafbfc; overflow: hidden;">
  
  <div class="ppid-hero-epic position-relative d-flex align-items-center overflow-hidden">
    
    <div class="hero-image-container position-absolute top-0 start-0 w-100 h-100">
      <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80" 
           alt="Background Overlay" 
           class="w-100 h-100 object-fit-cover opacity-35">
      <div class="hero-gradient-blur-mask"></div>
    </div>
    
    <div class="glow-orb-1"></div>
    <div class="glow-orb-2"></div>
    <div class="container position-relative py-5" style="z-index: 10;">
      <div class="row justify-content-center text-center">
        <div class="col-xl-9 animate__animated animate__fadeInDown">
          
          <nav aria-label="breadcrumb" class="d-inline-flex mb-4">
            <ol class="breadcrumb custom-kapsul-glass px-4 py-2 rounded-pill mb-0 shadow-2xs">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profil PPID</li>
            </ol>
          </nav>

          <span class="d-block section-mini-tag text-crimson fw-extrabold tracking-widest mb-3">
            <i class="fa-solid fa-shield-halved me-2"></i> TRANSPARANSI & AKUNTABILITAS PUBLIK
          </span>
          
          <h1 class="display-4 fw-black text-darkblue tracking-tight-epic mb-3">
            Pejabat Pengelola Informasi <br class="d-none d-md-block"> 
            dan Dokumentasi <span class="text-gradient-crimson">(PPID)</span>
          </h1>
          
          <p class="epic-subtitle text-secondary-custom font-jakarta mx-auto max-w-2xl position-relative" style="z-index: 12;">
            Layanan keterbukaan informasi publik Nagari yang cepat, tepat, dan transparan guna mewujudkan tata kelola pemerintahan yang bersih dan bertanggung jawab.
          </p>

        </div>
      </div>
    </div>
  </div>

  <div class="container pb-5 mt-4">
    @if(isset($data['ppid_profile']))
      @php $ppid = $data['ppid_profile']; @endphp

      <div class="row g-5 align-items-stretch mb-5 pb-4 animate__animated animate__fadeInUp">
        <div class="col-lg-5">
          <div class="sticky-box-wrapper h-100">
            <div class="card-epic-frame rounded-5 overflow-hidden h-100 shadow-sm position-relative">
              <img src="{{ env('API_STORAGE') . $ppid['gambar_profile_ppid'] }}" 
                   alt="Profil Utama PPID" 
                   class="w-100 h-100 object-fit-cover cinematic-zoom"
                   onerror="this.onerror=null; this.src='https://placehold.co/700x900/1e3a8a/ffffff?text=Profil+PPID';">
              <div class="card-glass-label p-4 position-absolute bottom-0 start-0 w-100">
                <span class="text-white font-12 tracking-wider d-block mb-1 text-uppercase fw-bold opacity-75">ID Instansi</span>
                <h5 class="text-white fw-bold mb-0 font-jakarta"><i class="fa-solid fa-building-flag me-2 text-crimson"></i>Kode: {{ $ppid['kode_instansi'] ?? '13622001' }}</h5>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-7">
          <div class="card-infobox bg-white border p-4 p-md-5 rounded-5 h-100 d-flex flex-column justify-content-center position-relative overflow-hidden">
            <div class="ambient-card-bg"></div>
            <div class="position-relative" style="z-index: 2;">
              <span class="badge-premium-pill mb-3"><i class="fa-solid fa-fingerprint me-2 text-crimson"></i>PPID {{ $data['nama_instansi'] }}</span>
              <h2 class="fw-extrabold text-darkblue mb-3 font-jakarta header-title-custom">Profil PPID</h2>
              <div class="ppid-editorial-text text-secondary font-jakarta">
                {!! $ppid['profile_ppid'] !!}
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-4 mb-5">
        <!-- Visi Box -->
        <div class="col-lg-6 animate__animated animate__fadeInLeft">
          <div class="card border-0 shadow-2xs rounded-5 bg-white p-4 p-md-5 h-100 d-flex flex-column justify-content-between hover-card-premium">
            <div>
              <div class="d-flex align-items-center mb-4">
                <div class="icon-orb-gradient bg-crimson shadow-sm text-white me-3"><i class="fa-solid fa-eye"></i></div>
                <div>
                  <span class="font-12 fw-bold text-muted text-uppercase tracking-wider">Arah Kebijakan</span>
                  <h4 class="fw-extrabold text-darkblue mb-0 font-jakarta">Visi PPID</h4>
                </div>
              </div>
              <div class="ppid-editorial-text text-secondary mb-5 font-jakarta border-start border-2 border-crimson ps-3 py-1">
                {!! $ppid['visi_ppid'] !!}
              </div>
            </div>
            <!-- 🌟 MODIFIKASI: Menambahkan fungsi click untuk Lightbox pada gambar Visi -->
            <div class="image-mask-frame rounded-4 overflow-hidden position-relative" style="height: 220px;">
              <img src="{{ env('API_STORAGE') . $ppid['gambar_visi_ppid'] }}" 
                   alt="Visi" class="w-100 h-100 object-fit-cover cinematic-zoom"
                   style="cursor: pointer;"
                   onclick="triggerPpidViewer(this.src)"
                   onerror="this.onerror=null; this.src='https://placehold.co/600x350/1e3a8a/ffffff?text=Visi+PPID';">
            </div>
          </div>
        </div>
      
        <!-- Misi Box -->
        <div class="col-lg-6 animate__animated animate__fadeInRight">
          <div class="card border-0 shadow-2xs rounded-5 bg-white p-4 p-md-5 h-100 d-flex flex-column justify-content-between hover-card-premium">
            <div>
              <div class="d-flex align-items-center mb-4">
                <div class="icon-orb-gradient bg-darkblue shadow-sm text-white me-3"><i class="fa-solid fa-bullseye"></i></div>
                <div>
                  <span class="font-12 fw-bold text-muted text-uppercase tracking-wider">Rencana Aksi</span>
                  <h4 class="fw-extrabold text-darkblue mb-0 font-jakarta">Misi PPID</h4>
                </div>
              </div>
              <div class="ppid-editorial-text text-secondary mb-5 font-jakarta border-start border-2 border-darkblue ps-3 py-1">
                {!! $ppid['misi_ppid'] !!}
              </div>
            </div>
            <!-- 🌟 MODIFIKASI: Menambahkan fungsi click untuk Lightbox pada gambar Misi -->
            <div class="image-mask-frame rounded-4 overflow-hidden position-relative" style="height: 220px;">
              <img src="{{ env('API_STORAGE') . $ppid['gambar_misi_ppid'] }}" 
                   alt="Misi" class="w-100 h-100 object-fit-cover cinematic-zoom"
                   style="cursor: pointer;"
                   onclick="triggerPpidViewer(this.src)"
                   onerror="this.onerror=null; this.src='https://placehold.co/600x350/dc2626/ffffff?text=Misi+PPID';">
            </div>
          </div>
        </div>
      </div>


      <div class="row g-5 align-items-stretch mb-5 pb-4 animate__animated animate__fadeInUp">
        <div class="col-lg-7 order-2 order-lg-1">
          <div class="card-infobox bg-white border p-4 p-md-5 rounded-5 h-100 d-flex flex-column justify-content-center position-relative overflow-hidden">
            <div class="ambient-card-bg-blue"></div>
            <div class="position-relative" style="z-index: 2;">
              <span class="badge-premium-pill mb-3"><i class="fa-solid fa-list-check me-2 text-darkblue"></i>Tanggung Jawab Teknis</span>
              <h2 class="fw-extrabold text-darkblue mb-3 font-jakarta header-title-custom">Tugas & Fungsi Pokok</h2>
              <div class="ppid-editorial-text text-secondary font-jakarta custom-bullet-timeline">
                {!! $ppid['tugas_fungsi_ppid'] !!}
              </div>
            </div>
          </div>
        </div>
        
        {{-- <div class="col-lg-5 order-1 order-lg-2">
          <div class="sticky-box-wrapper h-100">
            <div class="image-mask-frame rounded-4 overflow-hidden position-relative" style="height: 220px;">
              <img src="{{ env('API_STORAGE') . $ppid['gambar_tugas_fungsi_ppid'] }}" 
                   alt="Misi" class="w-100 h-100 object-fit-cover cinematic-zoom"
                   style="cursor: pointer;"
                   onclick="triggerPpidViewer(this.src)"
                   onerror="this.onerror=null; this.src='https://placehold.co/600x350/dc2626/ffffff?text=Misi+PPID';">
            </div>
          </div>
        </div> --}}
      </div>

      <div class="card border-0 shadow-lg rounded-5 bg-white p-4 p-md-5 text-center animate__animated animate__fadeInUp position-relative overflow-hidden">
        <div class="decorative-grid-pattern"></div>
        <div class="position-relative" style="z-index: 2;">
          
          <div class="mb-5">
            <span class="badge-premium-pill mb-2"><i class="fa-solid fa-sitemap me-2 text-crimson"></i>Struktur</span>
            <h3 class="fw-black text-darkblue font-jakarta tracking-tight-epic">Struktur Organisasi PPID</h3>
            <div class="ppid-editorial-text text-muted font-jakarta max-w-2xl mx-auto mt-2">
              {!! $ppid['struktur_ppid'] !!}
            </div>
          </div>
          
          <div class="mx-auto position-relative matrix-structure-box rounded-5 p-3 bg-light border" style="max-width: 960px;">
            <img src="{{ env('API_STORAGE') . $ppid['gambar_struktur_ppid'] }}" 
                 alt="Bagan Struktur Organisasi" 
                 class="w-100 h-100 object-fit-contain final-image-render rounded-4 shadow-sm bg-white"
                 onerror="this.onerror=null; this.src='https://placehold.co/950x550/f8fafc/334155?text=Struktur+Bagan';">
            
            <div class="matrix-glass-overlay d-flex align-items-center justify-content-center">
              <button class="btn btn-epic-action rounded-pill font-jakarta px-4 shadow-lg fw-bold"
                      onclick="triggerPpidViewer(this.closest('.matrix-structure-box').querySelector('.final-image-render').src)">
                <i class="fa-solid fa-expand me-2"></i> Perbesar Bagan Organisasi
              </button>
            </div>
          </div>

        </div>
      </div>

    @else
      <div class="text-center py-5 card border-0 shadow-sm rounded-5 bg-white animate__animated animate__bounceIn">
        <div class="p-4 d-inline-flex bg-light text-muted rounded-circle mx-auto mb-3" style="width:70px; height:70px; align-items:center; justify-content:center;">
          <i class="fa-solid fa-folder-closed fa-2x"></i>
        </div>
        <h5 class="fw-bold text-darkblue font-jakarta">Data Belum Tersedia</h5>
        <p class="text-secondary font-jakarta small mb-0">Berkas atau informasi PPID belum diunggah oleh administrator.</p>
      </div>
    @endif
  </div>

  <div class="container pt-2 mt-4">
    <div class="card border-0 pt-2 mt-4 shadow-lg rounded-5 bg-white p-4 p-md-5 text-center animate__animated animate__fadeInUp position-relative overflow-hidden">
      <div class="decorative-grid-pattern"></div>
      <div class="position-relative" style="z-index: 2;">
        
        <div class="mb-5">
          <h3 class="fw-black text-darkblue font-jakarta tracking-tight-epic">Jadwal & Biaya</h3>
          <div class="ppid-editorial-text text-muted font-jakarta max-w-2xl mx-auto mt-2">
            {!! $data['ppid_pelayanan_publik'][0]['jadwal_biaya']   !!}
          </div>
        </div>
        
        <div class="mx-auto position-relative matrix-structure-box rounded-5 p-3 bg-light border" style="max-width: 960px;">
          @php
            $fileUrl = env('API_STORAGE') . $data['ppid_pelayanan_publik'][0]['file_jadwal_biaya'];
            $isPdf = Str::endsWith(strtolower($fileUrl), '.pdf');
          @endphp
        
          @if($isPdf)
            <!-- Tampilan jika file berupa PDF -->
            <iframe src="{{ $fileUrl }}" 
                    class="w-100 rounded-4 shadow-sm bg-white final-image-render" 
                    style="height: 550px; border: none;">
            </iframe>
          @else
            <!-- Tampilan jika file berupa Gambar -->
            <img src="{{ $fileUrl }}" 
                 alt="Jadwal dan Biaya Pelayanan" 
                 class="w-100 h-100 object-fit-contain final-image-render rounded-4 shadow-sm bg-white"
                 onerror="this.onerror=null; this.src='https://placehold.co/950x550/f8fafc/334155?text=Jadwal+Biaya';">
          @endif
          
        </div>

      </div>
    </div>
  </div>

</main>

<div class="modal fade" id="ppidLightboxModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 bg-transparent">
      <div class="modal-header border-0 p-0 pe-2 pb-2 justify-content-end">
        <button type="button" class="btn-close btn-close-white bg-dark p-3 rounded-circle opacity-100 shadow-lg border border-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 text-center">
        <img src="" id="ppidLightboxImgTarget" alt="Bagan Pembesaran" class="img-fluid rounded-5 shadow-2xl bg-white p-2" style="max-height: 88vh; object-fit: contain;">
      </div>
    </div>
  </div>
</div>

<script>
  function triggerPpidViewer(imgSrc) {
    document.getElementById('ppidLightboxImgTarget').src = imgSrc;
    const modalElement = new bootstrap.Modal(document.getElementById('ppidLightboxModal'));
    modalElement.show();
  }
</script>

<style>
  /* Base Synchronization Rules */
  .ppid-cosmic-canvas,
  .ppid-cosmic-canvas h1, .ppid-cosmic-canvas h2, .ppid-cosmic-canvas h3,
  .ppid-cosmic-canvas h4, .ppid-cosmic-canvas p, .ppid-cosmic-canvas span,
  .ppid-cosmic-canvas div {
    font-family: 'Plus Jakarta Sans', 'Inter', 'Poppins', sans-serif !important;
  }
  
  .fw-black { font-weight: 900 !important; }
  .fw-extrabold { font-weight: 800 !important; }
  .tracking-tight-epic { letter-spacing: -1.25px !important; }
  .tracking-widest { letter-spacing: 2px !important; }
  .max-w-2xl { max-width: 46rem; }
  .shadow-2xl { box-shadow: 0 25px 60px rgba(15, 23, 42, 0.15) !important; }
  .font-12 { font-size: 0.75rem; }

  .text-darkblue { color: #0f172a !important; } 
  .text-crimson { color: #dc2626 !important; }  
  .text-gradient-crimson {
    background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  /* 1. Epic Hero Section Elements */
  .ppid-hero-epic {
    min-height: 440px;
    padding: 70px 0;
    background-color: #ffffff !important;
  }
  
  /* 🌟 BARU: Handler Pembungkus & Masker Gradasi untuk Elemen Gambar HTML */
  .hero-image-container {
    z-index: 1;
    pointer-events: none;
  }
  .hero-gradient-blur-mask {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    /* Efek gradasi untuk memastikan teks di atas gambar memiliki keterbacaan tinggi */
    background: radial-gradient(circle at center, rgba(255, 255, 255, 0.78) 10%, rgba(254, 254, 255, 0.94) 75%, rgba(250, 251, 252, 1) 100%);
  }

  .epic-subtitle { color: #475569; font-size: 1.15rem; line-height: 1.7; }
  .section-mini-tag { font-size: 0.725rem; font-weight: 800; }

  /* Capsule Glass Design */
  .custom-kapsul-glass {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(226, 232, 240, 0.8);
  }
  .custom-kapsul-glass a { color: #64748b; text-decoration: none; font-weight: 600; font-size: 0.825rem; }
  .custom-kapsul-glass .active { color: #0f172a; font-weight: 700; font-size: 0.825rem; }

  /* Ambient Lighting Ambient Orbs */
  .glow-orb-1 {
    position: absolute; top: -150px; left: -100px; width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(220,38,38,0.05) 0%, rgba(255,255,255,0) 70%);
    filter: blur(60px); border-radius: 50%; z-index: 2; pointer-events: none;
  }
  .glow-orb-2 {
    position: absolute; top: 100px; right: -150px; width: 450px; height: 450px;
    background: radial-gradient(circle, rgba(15,23,42,0.03) 0%, rgba(255,255,255,0) 70%);
    filter: blur(60px); border-radius: 50%; z-index: 2; pointer-events: none;
  }

  /* 2. Advanced Premium Box Components */
  .badge-premium-pill {
    background: #f8fafc; color: #334155; font-size: 0.725rem; font-weight: 800;
    padding: 6px 16px; border-radius: 100px; display: inline-block; border: 1px solid #e2e8f0;
    text-transform: uppercase; letter-spacing: 0.5px;
  }
  
  .header-title-custom { font-size: 1.95rem; line-height: 1.3; }
  .card-epic-frame { border: 1px solid #e2e8f0; background: #f8fafc; min-height: 360px; }
  .cinematic-zoom { transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
  .card-epic-frame:hover .cinematic-zoom, .image-mask-frame:hover .cinematic-zoom { transform: scale(1.04); }
  .card-glass-label { background: linear-gradient(to top, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.3) 100%); backdrop-filter: blur(4px); border-top: 1px solid rgba(255,255,255,0.1); }

  .card-infobox { border: 1px solid #e2e8f0; box-shadow: 0 4px 30px rgba(15, 23, 42, 0.01); }
  .ambient-card-bg { position: absolute; top: -50px; right: -50px; width: 180px; height: 180px; background: rgba(220, 38, 38, 0.015); filter: blur(35px); border-radius: 50%; }
  .ambient-card-bg-blue { position: absolute; bottom: -50px; left: -50px; width: 180px; height: 180px; background: rgba(15, 23, 42, 0.015); filter: blur(35px); border-radius: 50%; }

  .ppid-editorial-text { font-size: 0.95rem; line-height: 1.8; color: #475569 !important; }
  .ppid-editorial-text p { margin-bottom: 1rem; }
  .ppid-editorial-text p:last-child { margin-bottom: 0; }

  .icon-orb-gradient { width: 46px; height: 46px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.15rem; }
  .bg-crimson { background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); }
  .bg-darkblue { background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); }

  .image-mask-frame { background-color: #f8fafc; border: 1px solid #e2e8f0; }
  .hover-card-premium { transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); border: 1px solid #e2e8f0; }
  .hover-card-premium:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(15, 23, 42, 0.06) !important; border-color: #cbd5e1; }

  .custom-bullet-timeline ul { list-style: none; padding-left: 0; position: relative; }
  .custom-bullet-timeline li { position: relative; padding-left: 28px; margin-bottom: 12px; }
  .custom-bullet-timeline li::before { content: "\f058"; font-family: "Font Awesome 6 Free"; font-weight: 900; position: absolute; left: 0; top: 2px; color: #dc2626; font-size: 0.95rem; }

  .matrix-structure-box { background: #fdfdfd !important; border: 1px solid #e2e8f0; overflow: hidden; }
  .matrix-glass-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.35); backdrop-filter: blur(5px); opacity: 0; transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); border-radius: 24px; }
  .matrix-structure-box:hover .matrix-glass-overlay { opacity: 1; }
  .btn-epic-action { background-color: #ffffff; color: #0f172a; border: none; transition: all 0.3s ease; font-size: 0.875rem; }
  .btn-epic-action:hover { background-color: #f8fafc; color: #dc2626; transform: scale(1.03); }

  .decorative-grid-pattern { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: radial-gradient(#e2e8f0 1.2px, transparent 1.2px); background-size: 24px 24px; opacity: 0.3; pointer-events: none; z-index: 1; }
  
  @media (max-width: 991px) {
    .sticky-box-wrapper { height: auto !important; margin-bottom: 0; }
    .card-epic-frame { min-height: 280px; }
  }
</style>
@endsection