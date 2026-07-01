@extends('pages.layout')

@section('content')
<main class="ppid-cosmic-canvas" style="background: #fafbfc; overflow: hidden; padding-bottom: 80px;">
  
  <div class="ppid-hero-epic position-relative d-flex align-items-center overflow-hidden">
    <div class="glow-orb-1"></div>
    <div class="glow-orb-2"></div>
    <div class="container position-relative py-5" style="z-index: 10;">
      <div class="row justify-content-center text-center">
        <div class="col-xl-9 animate__animated animate__fadeInDown">
          
          <nav aria-label="breadcrumb" class="d-inline-flex mb-4">
            <ol class="breadcrumb custom-kapsul-glass px-4 py-2 rounded-pill mb-0 shadow-2xs">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/ppid/profil') }}">PPID</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cek Keberatan</li>
            </ol>
          </nav>

          <span class="d-block section-mini-tag text-crimson fw-extrabold tracking-widest mb-3">
            <i class="fa-solid fa-magnifying-glass me-2"></i> TRASABILITAS INFORMASI
          </span>
          
          <h1 class="display-5 fw-black text-darkblue tracking-tight-epic mb-3">
            Cek Status <span class="text-gradient-crimson">Keberatan</span>
          </h1>
          
          <p class="epic-subtitle text-secondary-custom font-jakarta mx-auto max-w-2xl">
            Pantau secara transparan jalannya proses tindak lanjut atas berkas keberatan informasi yang telah Anda ajukan melalui sistem layanan PPID.
          </p>

        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9 animate__animated animate__fadeInUp">

        @if(session('error'))
          <div class="alert alert-danger border-0 rounded-4 p-4 shadow-sm mb-4 d-flex align-items-center">
            <i class="fa-solid fa-circle-exclamation fa-2x me-3 text-danger"></i>
            <div>
              <h6 class="fw-bold mb-1 font-jakarta text-danger">Data Tidak Ditemukan / Terjadi Kesalahan</h6>
              <p class="small mb-0 opacity-85">{{ session('error') }}</p>
            </div>
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger border-0 rounded-4 p-4 shadow-sm mb-4">
            <ul class="mb-0 font-jakarta small ps-3 text-danger">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="card border-0 shadow-lg rounded-5 bg-white p-4 p-md-5 position-relative overflow-hidden mb-5">
          <div class="decorative-grid-pattern"></div>
          <div class="position-relative" style="z-index: 2;">
            
            <form action="{{ url('ppid_pengajuan_keberatan/check') }}" method="POST" id="formCekKeberatan">
                @csrf
              
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                <div class="row g-4 align-items-end">
                    
                    <div class="col-md-8">
                    <label for="kode_registrasi" class="form-label-custom fw-bold font-jakarta text-darkblue">
                        <i class="fa-solid fa-hashtag me-2 text-crimson"></i>Masukkan Kode Registrasi Permohonan
                    </label>
                    <input type="text" class="form-control custom-input-premium" id="kode_registrasi" name="kode_registrasi" 
                            value="{{ request('kode_registrasi') }}" placeholder="Contoh: PPID-2026-001" required autocomplete="off">
                    <div class="form-text font-12 text-muted">Gunakan kode pendaftaran resmi yang Anda terima saat mengajukan keberatan.</div>
                    </div>

                    <div class="col-md-4">
                    <button type="submit" class="btn btn-submit-premium rounded-pill w-100 py-3 shadow-md fw-bold font-jakarta">
                        <i class="fa-solid fa-magnifying-glass me-2"></i> Periksa Status
                    </button>
                    </div>

                </div>
            </form>

          </div>
        </div>


        @if(isset($dataKeberatan))
        <div class="animate__animated animate__fadeIn">
          
          <h5 class="fw-bold text-darkblue font-jakarta mb-4"><i class="fa-solid fa-folder-open me-2 text-crimson"></i> Detail Informasi Berkas</h5>
          
          <div class="card border-0 shadow-md rounded-5 bg-white p-4 p-md-5 mb-4 position-relative">
            <div class="row g-4">
              
              <div class="col-12 d-flex flex-wrap align-items-center justify-content-between border-bottom pb-4 mb-2">
                <div>
                  <span class="text-muted d-block small font-12">KODE REGISTRASI</span>
                  <h4 class="fw-bold text-darkblue font-jakarta mb-0">{{ $dataKeberatan->kode_registrasi }}</h4>
                </div>
                <div class="mt-2 mt-sm-0">
                  @if($dataKeberatan->status == 0)
                    <span class="badge bg-warning-subtle text-warning border border-warning px-4 py-2 rounded-pill fw-bold font-jakarta"><i class="fa-solid fa-spinner fa-spin me-2"></i> Sedang Diproses</span>
                  @elseif($dataKeberatan->status == 1)
                    <span class="badge bg-success-subtle text-success border border-success px-4 py-2 rounded-pill fw-bold font-jakarta"><i class="fa-solid fa-circle-check me-2"></i> Selesai Ditindaklanjuti</span>
                  @else
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary px-4 py-2 rounded-pill fw-bold font-jakarta"><i class="fa-solid fa-hourglass-start me-2"></i> Menunggu Verifikasi</span>
                  @endif
                </div>
              </div>

              <div class="col-md-6">
                <span class="text-muted d-block font-12 mb-1">NAMA LENGKAP</span>
                <p class="fw-bold text-darkblue font-jakarta mb-0">{{ $dataKeberatan->nama }}</p>
              </div>

              <div class="col-md-6">
                <span class="text-muted d-block font-12 mb-1">KATEGORI & PEKERJAAN</span>
                <p class="fw-semibold text-darkblue font-jakarta mb-0">{{ $dataKeberatan->kategori }} &mdash; <span class="text-muted">{{ $dataKeberatan->pekerjaan }}</span></p>
              </div>

              <div class="col-md-6">
                <span class="text-muted d-block font-12 mb-1">TANGGAL PENGAJUAN</span>
                <p class="fw-semibold text-darkblue font-jakarta mb-0">{{ \Carbon\Carbon::parse($dataKeberatan->created_at)->translatedFormat('d F Y') }}</p>
              </div>

              <div class="col-md-6">
                <span class="text-muted d-block font-12 mb-1">ALASAN KEBERATAN</span>
                <p class="fw-semibold text-crimson font-jakarta mb-0">{{ $dataKeberatan->alasan }}</p>
              </div>

              <div class="col-12">
                <hr class="opacity-10 my-2">
                <span class="text-muted d-block font-12 mb-2">KRONOLOGI / PENJELASAN KASUS</span>
                <div class="p-3 bg-light rounded-4 font-jakarta text-secondary-custom fs-6" style="white-space: pre-line; line-height: 1.6;">{{ $dataKeberatan->keterangan }}</div>
              </div>

              @if($dataKeberatan->tanggapan_admin)
              <div class="col-12 mt-4">
                <div class="card border-0 rounded-4 p-4" style="background-color: #f0f4f8; border-left: 5px solid #0f172a !important;">
                  <h6 class="fw-bold text-darkblue font-jakarta mb-2"><i class="fa-solid fa-reply-all me-2"></i> Catatan Tanggapan / Jawaban PPID:</h6>
                  <p class="mb-0 font-jakarta small opacity-90 text-secondary-custom" style="white-space: pre-line; line-height: 1.6;">{{ $dataKeberatan->tanggapan_admin }}</p>
                </div>
              </div>
              @endif

            </div>
          </div>

        </div>
        @endif

      </div>
    </div>
  </div>

</main>

<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
  document.getElementById('formCekKeberatan').addEventListener("submit", function(e) {
    e.preventDefault(); // Menahan submit form sesaat
    
    grecaptcha.ready(function() {
      grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", { action: 'cek_status_keberatan' })
      .then(function(token) {
        // Ambil token reCAPTCHA dan sematkan ke input hidden sebelum submit dikirim
        document.getElementById('g-recaptcha-response').value = token;
        document.getElementById('formCekKeberatan').submit();
      });
    });
  });
</script>

<style>
  .ppid-cosmic-canvas, .ppid-cosmic-canvas input, .ppid-cosmic-canvas select {
    font-family: 'Plus Jakarta Sans', 'Inter', sans-serif !important;
  }
  .fw-black { font-weight: 900 !important; }
  .fw-extrabold { font-weight: 800 !important; }
  .tracking-tight-epic { letter-spacing: -1.25px !important; }
  .tracking-widest { letter-spacing: 2px !important; }
  .max-w-2xl { max-width: 46rem; }
  .text-darkblue { color: #0f172a !important; } 
  .text-crimson { color: #dc2626 !important; }  
  .font-12 { font-size: 0.75rem; }
  .text-secondary-custom { color: #475569; }
  
  .text-gradient-crimson {
    background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  /* Hero Section */
  .ppid-hero-epic { min-height: 320px; padding: 50px 0; background-color: #ffffff; }
  .epic-subtitle { color: #475569; font-size: 1.1rem; line-height: 1.7; }
  .section-mini-tag { font-size: 0.725rem; }

  /* Kapsul Kaca Breadcrumb */
  .custom-kapsul-glass {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(226, 232, 240, 0.8);
  }
  .custom-kapsul-glass a { color: #64748b; text-decoration: none; font-weight: 600; font-size: 0.825rem; }
  .custom-kapsul-glass .active { color: #0f172a; font-weight: 700; font-size: 0.825rem; }

  /* Orbs Ambient */
  .glow-orb-1 {
    position: absolute; top: -150px; left: -100px; width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(220,38,38,0.04) 0%, rgba(255,255,255,0) 70%);
    filter: blur(60px); border-radius: 50%; pointer-events: none;
  }
  .glow-orb-2 {
    position: absolute; top: 50px; right: -150px; width: 450px; height: 450px;
    background: radial-gradient(circle, rgba(15,23,42,0.03) 0%, rgba(255,255,255,0) 70%);
    filter: blur(60px); border-radius: 50%; pointer-events: none;
  }

  /* Input Premium Styling */
  .form-label-custom {
    font-size: 0.875rem;
    margin-bottom: 8px;
    display: inline-block;
  }
  .custom-input-premium {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 14px 18px;
    font-size: 0.925rem;
    color: #334155;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  }
  .custom-input-premium:focus {
    background: #ffffff;
    border-color: #dc2626;
    box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.08);
    color: #0f172a;
  }

  /* Submit Button Premium */
  .btn-submit-premium {
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    color: #ffffff;
    border: none;
    padding: 14px 30px;
    font-size: 0.95rem;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  }
  .btn-submit-premium:hover {
    background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(220, 38, 38, 0.2) !important;
    color: #ffffff;
  }

  /* Pattern Background Mesh */
  .decorative-grid-pattern {
    position: absolute; top: 0; left: 0; width: 100%; height: 100%;
    background-image: radial-gradient(#e2e8f0 1.2px, transparent 1.2px);
    background-size: 24px 24px; opacity: 0.3; pointer-events: none; z-index: 1;
  }

  /* Custom Badges */
  .bg-warning-subtle { background-color: #fffbeb !important; }
  .bg-success-subtle { background-color: #f0fdf4 !important; }
  .bg-secondary-subtle { background-color: #f1f5f9 !important; }
</style>
@endsection