@extends('pages.layout')

@section('content')
<main class="ppid-cosmic-canvas" style="background: #fafbfc; overflow: hidden; padding-bottom: 80px;">
  
  <!-- ==========================================================================
       1. HERO BANNER
       ========================================================================== -->
  <div class="ppid-hero-epic position-relative d-flex align-items-center overflow-hidden">
    <div class="glow-orb-1"></div>
    <div class="glow-orb-2"></div>
    <div class="container position-relative" style="z-index: 10;">
      <div class="row justify-content-center text-center">
        <div class="col-xl-9 animate__animated animate__fadeInDown">
          
          <!-- Breadcrumb Kapsul Kaca -->
          <nav aria-label="breadcrumb" class="d-inline-flex mb-4">
            <ol class="breadcrumb custom-kapsul-glass px-4 py-2 rounded-pill mb-0 shadow-2xs">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/ppid/profil') }}">PPID</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pengajuan Keberatan</li>
            </ol>
          </nav>

          <span class="d-block section-mini-tag text-crimson fw-extrabold tracking-widest">
            <i class="fa-solid fa-scale-balanced me-2"></i> FORMULIR LEGALITAS PUBLIK
          </span>
          
          <h1 class="display-5 fw-black text-darkblue tracking-tight-epic">
            Pengajuan Keberatan <span class="text-gradient-crimson">Informasi</span>
          </h1>

        </div>
      </div>
    </div>
  </div>

  <!-- ==========================================================================
       2. MAIN FORM SECTION
       ========================================================================== -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9 animate__animated animate__fadeInUp">
        
        <!-- Flash Message Notification -->
        @if(session('success'))
          <div class="alert alert-success border-0 rounded-4 p-4 shadow-sm mb-4 d-flex align-items-center">
            <i class="fa-solid fa-circle-check fa-2x me-3 text-success"></i>
            <div>
              <h6 class="fw-bold mb-1 font-jakarta text-success">Berhasil Terkirim!</h6>
              <p class="small mb-0 opacity-85">{{ session('success') }}</p>
            </div>
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger border-0 rounded-4 p-4 shadow-sm mb-4">
            <div class="d-flex align-items-center mb-2">
              <i class="fa-solid fa-triangle-exclamation fa-lg me-2 text-danger"></i>
              <h6 class="fw-bold mb-0 font-jakarta text-danger">Terjadi Kesalahan Validasi</h6>
            </div>
            <ul class="mb-0 font-jakarta small ps-3">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Card Form Premium -->
        <div class="card border-0 shadow-lg rounded-5 bg-white p-4 p-md-5 position-relative overflow-hidden">
          <div class="decorative-grid-pattern"></div>
          <div class="position-relative" style="z-index: 2;">
            
            <form action="{{ url('ppid_pengajuan_keberatan/send') }}" method="POST" id="formKeberatanPPID">
              @csrf
              
              <!-- Token Google reCAPTCHA v3 -->
              <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

              <div class="row g-4">
                
                <!-- 1. Kode Registrasi -->
                <div class="col-md-6">
                  <label for="kode_registrasi" class="form-label-custom fw-bold font-jakarta text-darkblue"><i class="fa-solid fa-hashtag me-2 text-crimson"></i>Kode Registrasi Permohonan <span class="text-danger">*</span></label>
                  <input type="text" class="form-control custom-input-premium" id="kode_registrasi" name="kode_registrasi" value="{{ old('kode_registrasi') }}" placeholder="Contoh: PPID-2026-001" required autocomplete="off">
                  <div class="form-text font-12 text-muted">Masukkan kode nomor pendaftaran informasi awal Anda.</div>
                </div>

                <!-- 2. Kategori Pemohon -->
                <div class="col-md-6">
                  <label for="kategori" class="form-label-custom fw-bold font-jakarta text-darkblue"><i class="fa-solid fa-users me-2 text-crimson"></i>Kategori Pemohon <span class="text-danger">*</span></label>
                  <select class="form-select custom-input-premium" id="kategori" name="kategori" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <option value="Perorangan" {{ old('kategori') == 'Perorangan' ? 'selected' : '' }}>Perorangan / Individu</option>
                    <option value="Lembaga" {{ old('kategori') == 'Lembaga' ? 'selected' : '' }}>Lembaga / Organisasi / LSM</option>
                    <option value="Badan Hukum" {{ old('kategori') == 'Badan Hukum' ? 'selected' : '' }}>Badan Hukum / Perusahaan</option>
                  </select>
                </div>

                <!-- Divider Visual -->
                <div class="col-12"><hr class="opacity-10 my-2"></div>

                <!-- 3. Nama Lengkap -->
                <div class="col-md-6">
                  <label for="nama" class="form-label-custom fw-bold font-jakarta text-darkblue"><i class="fa-solid fa-user me-2 text-crimson"></i>Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" class="form-control custom-input-premium" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama sesuai identitas" required>
                </div>

                <!-- 4. NIK / Nomor Identitas -->
                <div class="col-md-6">
                  <label for="nik" class="form-label-custom fw-bold font-jakarta text-darkblue"><i class="fa-solid fa-id-card me-2 text-crimson"></i>Nomor KTP / NIK <span class="text-danger">*</span></label>
                  <input type="text" class="form-control custom-input-premium" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukkan 16 digit NIK" maxlength="16" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>

                <!-- 5. Pekerjaan (INPUT BARU) -->
                <div class="col-md-6">
                  <label for="pekerjaan" class="form-label-custom fw-bold font-jakarta text-darkblue"><i class="fa-solid fa-briefcase me-2 text-crimson"></i>Pekerjaan / Profesi <span class="text-danger">*</span></label>
                  <input type="text" class="form-control custom-input-premium" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Contoh: PNS, Wiraswasta, Karyawan Swasta" required>
                </div>

                <!-- 6. No Telepon / WhatsApp -->
                <div class="col-md-6">
                  <label for="no_telp" class="form-label-custom fw-bold font-jakarta text-darkblue"><i class="fa-solid fa-phone me-2 text-crimson"></i>No. Telepon / WhatsApp <span class="text-danger">*</span></label>
                  <input type="tel" class="form-control custom-input-premium" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" placeholder="Contoh: 08123456789" required>
                </div>

                <!-- 7. Email Aktif -->
                <div class="col-12">
                  <label for="email" class="form-label-custom fw-bold font-jakarta text-darkblue"><i class="fa-solid fa-envelope me-2 text-crimson"></i>Alamat Email Aktif <span class="text-danger">*</span></label>
                  <input type="email" class="form-control custom-input-premium" id="email" name="email" value="{{ old('email') }}" placeholder="alamat@email.com" required>
                </div>

                <!-- Divider Visual -->
                <div class="col-12"><hr class="opacity-10 my-2"></div>

                <!-- 8. Alasan Pengajuan Keberatan -->
                <div class="col-12">
                  <label for="alasan" class="form-label-custom fw-bold font-jakarta text-darkblue"><i class="fa-solid fa-circle-question me-2 text-crimson"></i>Alasan Pengajuan Keberatan <span class="text-danger">*</span></label>
                  <select class="form-select custom-input-premium" id="alasan" name="alasan" required>
                    <option value="" disabled selected>-- Pilih Alasan Keberatan Komparatif --</option>
                    <option value="Permohonan Informasi Ditolak" {{ old('alasan') == 'Permohonan Informasi Ditolak' ? 'selected' : '' }}>Permohonan Informasi Ditolak</option>
                    <option value="Informasi Berkala Tidak Disediakan" {{ old('alasan') == 'Informasi Berkala Tidak Disediakan' ? 'selected' : '' }}>Informasi Berkala Tidak Disediakan</option>
                    <option value="Permohonan Tidak Ditanggapi" {{ old('alasan') == 'Permohonan Tidak Ditanggapi' ? 'selected' : '' }}>Permohonan Tidak Ditanggapi Sebagaimana Mestinya</option>
                    <option value="Permohonan Ditanggapi Tidak Sesuai" {{ old('alasan') == 'Permohonan Ditanggapi Tidak Sesuai' ? 'selected' : '' }}>Permohonan Ditanggapi Tidak Sesuai dengan yang Diminta</option>
                    <option value="Biaya yang Diminta Tidak Wajar" {{ old('alasan') == 'Biaya yang Diminta Tidak Wajar' ? 'selected' : '' }}>Pengenaan Biaya yang Tidak Wajar</option>
                    <option value="Penyampaian Informasi Melebihi Waktu" {{ old('alasan') == 'Penyampaian Informasi Melebihi Waktu' ? 'selected' : '' }}>Penyampaian Informasi Melebihi Waktu yang Ditentukan</option>
                  </select>
                </div>

                <!-- 9. Keterangan Kronologi Tambahan -->
                <div class="col-12">
                  <label for="keterangan" class="form-label-custom fw-bold font-jakarta text-darkblue"><i class="fa-solid fa-align-left me-2 text-crimson"></i>Penjelasan / Keterangan Kasus Kasuistis <span class="text-danger">*</span></label>
                  <textarea class="form-control custom-input-premium" id="keterangan" name="keterangan" rows="5" placeholder="Tuliskan detail kronologi mengapa Anda mengajukan keberatan secara jelas..." required>{{ old('keterangan') }}</textarea>
                </div>

                <!-- Tombol Submit Kirim -->
                <div class="col-12 text-center mt-4">
                  <button type="submit" class="btn btn-submit-premium rounded-pill px-5 py-3 shadow-md fw-bold font-jakarta">
                    <i class="fa-solid fa-paper-plane me-2"></i> Kirim Berkas Keberatan
                  </button>
                </div>

              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

</main>

<!-- ==========================================================================
     3. RECAPTCHA V3 INTEGRATION SCRIPT
     ========================================================================= -->
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
  document.getElementById('formKeberatanPPID').addEventListener("submit", function(e) {
    e.preventDefault(); 
    
    grecaptcha.ready(function() {
      grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", { action: 'submit_keberatan' })
      .then(function(token) {
        document.getElementById('g-recaptcha-response').value = token;
        document.getElementById('formKeberatanPPID').submit();
      });
    });
  });
</script>

<!-- ==========================================================================
     4. CSS STYLE SHEET ENGINE
     ========================================================================== -->
<style>
  .ppid-cosmic-canvas, .ppid-cosmic-canvas input, .ppid-cosmic-canvas select, .ppid-cosmic-canvas textarea {
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
  
  .text-gradient-crimson {
    background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  /* Hero Section */
  .ppid-hero-epic { min-height: 360px; padding: 60px 0; background-color: #ffffff; }
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
  select.custom-input-premium {
    cursor: pointer;
  }

  /* Submit Button Premium */
  .btn-submit-premium {
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    color: #ffffff;
    border: none;
    padding: 14px 40px;
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
</style>
@endsection