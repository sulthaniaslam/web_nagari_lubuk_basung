@extends('pages.layout')

@section('content')
<!-- Import Font & Animate.css jika belum ada di layout utama -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    :root {
        --primary-color: #2563eb;
        --primary-focus: #1d4ed8;
        --bg-gradient: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        --text-dark: #0f172a;
    }

    .form-page-bg {
        background: var(--bg-gradient);
        min-height: 100vh;
    }

    .modern-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 24px;
        box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.08);
    }

    .section-divider {
        position: relative;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #64748b;
        margin: 40px 0 20px 0;
        display: flex;
        align-items: center;
    }

    .section-divider::after {
        content: "";
        flex: 1;
        margin-left: 15px;
        height: 1px;
        background: #cbd5e1;
    }

    .input-group-custom {
        position: relative;
    }

    .input-group-custom .form-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        transition: color 0.2s;
        z-index: 5;
    }

    .input-group-custom .form-control,
    .input-group-custom .form-select {
        padding-left: 48px;
        height: 52px;
        border-radius: 12px;
        border: 1.5px solid #cbd5e1;
        background-color: #f8fafc;
        color: var(--text-dark);
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }

    .input-group-custom textarea.form-control {
        padding-left: 16px;
        padding-top: 14px;
        height: auto;
    }

    .input-group-custom .form-control:focus,
    .input-group-custom .form-select:focus {
        background-color: #fff;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(37, 99, 211, 0.15);
    }

    .input-group-custom .form-control:focus ~ .form-icon {
        color: var(--primary-color);
    }

    /* Custom File Upload Drag & Drop Style */
    .file-drop-area {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 32px;
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        background-color: #f8fafc;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }

    .file-drop-area:hover {
        border-color: var(--primary-color);
        background-color: rgba(37, 99, 211, 0.02);
    }

    .file-drop-area input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .preview-container {
        display: none;
        max-width: 150px;
        margin-top: 15px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .btn-submit-premium {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        border: none;
        padding: 14px 40px;
        color: white;
        font-weight: 600;
        border-radius: 14px;
        box-shadow: 0 8px 20px -6px rgba(29, 78, 216, 0.4);
        transition: all 0.2s ease;
    }

    .btn-submit-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px -6px rgba(29, 78, 216, 0.6);
    }
</style>

<main class="form-page-bg py-5">
    <div class="container">
        
        <!-- Breadcrumb Navigasi -->
        <nav aria-label="breadcrumb" class="mb-4 animate__animated animate__fadeIn">
            <ol class="breadcrumb custom-breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted fw-medium">Beranda</a></li>
                <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Form Pengajuan</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="card modern-card p-4 p-md-5 border-0 animate__animated animate__fadeInUp">
                    
                    <!-- Header Form -->
                    <div class="text-center mb-5">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 fw-bold tracking-wide">E-SERVICES NAGARI</span>
                        <h1 class="fw-extrabold text-slate-900 mb-2 text-primary" style="font-weight: 800; letter-spacing: -0.5px;">Formulir Permohonan Informasi</h1>
                        <p class="text-secondary col-md-9 mx-auto">Silakan lengkapi berkas dan formulir di bawah ini. Enkripsi keamanan reCAPTCHA v3 aktif mendeteksi spam secara otomatis.</p>
                    </div>

                    <!-- Notifikasi Alert -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 rounded-4 p-4 mb-4 shadow-sm animate__animated animate__fadeIn" role="alert">
                            <div class="d-flex align-items-start">
                                <i class="fa-solid fa-circle-check fa-lg me-3 text-success mt-1"></i>
                                <div class="w-100">
                                    <h5 class="alert-heading fw-bold mb-1">Selesai!</h5>
                                    <p class="mb-2 text-secondary">{{ session('success') }}</p>
                                    
                                    {{-- Cek jika ada session kode_registrasi dari Controller --}}
                                    @if(session('kode_registrasi'))
                                        <div class="p-3 bg-light rounded-3 d-flex align-items-center justify-content-between border mt-2">
                                            <div>
                                                <span class="small text-muted d-block text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">Kode Registrasi Anda:</span>
                                                <strong id="kodeRegistrasiText" class="font-monospace fs-5 text-dark tracking-wider">{{ session('kode_registrasi') }}</strong>
                                            </div>
                                            <button type="button" class="btn btn-outline-primary btn-sm rounded-3 px-3 d-flex align-items-center gap-2" id="btnCopyKode" onclick="copyToClipboard()">
                                                <i class="fa-solid fa-copy"></i> <span id="btnCopyText">Salin Kode</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form Input -->
                    <form action="{{ url('ppid_permohonan_informasi/send') }}" method="POST" enctype="multipart/form-data" id="pengajuanForm">
                        @csrf
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                        <!-- SEKSI 1: IDENTITAS DIRI -->
                        <div class="section-divider">1. Profil & Identitas Pemohon</div>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="nama" class="form-label small fw-bold text-secondary">Nama Lengkap Pemohon</label>
                                <div class="input-group-custom">
                                    <i class="fa-solid fa-user form-icon"></i>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="nik" class="form-label small fw-bold text-secondary">NIK KTP (16 Digit)</label>
                                <div class="input-group-custom">
                                    <i class="fa-solid fa-id-card form-icon"></i>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Nomor Induk Kependudukan" maxlength="16" required>
                                    @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="pekerjaan" class="form-label small fw-bold text-secondary">Profesi / Pekerjaan Saat Ini</label>
                                <div class="input-group-custom">
                                    <i class="fa-solid fa-briefcase form-icon"></i>
                                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Contoh: Wiraswasta, PNS, Pelajar" required>
                                    @error('pekerjaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="kategori" class="form-label small fw-bold text-secondary">Kategori Kelembagaan</label>
                                <div class="input-group-custom">
                                    <i class="fa-solid fa-users-rectangle form-icon"></i>
                                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                                        <option value="" selected disabled>-- Pilih Klasifikasi Pemohon --</option>
                                        @foreach(['perorangan', 'kelompok', 'LSM', 'Ormas', 'Parpol'] as $kat)
                                            <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>{{ ucfirst($kat) }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- SEKSI 2: KONTAK & ALAMAT -->
                        <div class="section-divider">2. Informasi Kontak Korespondensi</div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="no_telp" class="form-label small fw-bold text-secondary">Nomor WhatsApp Aktif</label>
                                <div class="input-group-custom">
                                    <i class="fa-brands fa-whatsapp form-icon text-success fw-bold" style="font-size: 1.1rem;"></i>
                                    <input type="tel" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" placeholder="Contoh: 08123456789" required>
                                    @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label small fw-bold text-secondary">Alamat Surat Elektronik (Email)</label>
                                <div class="input-group-custom">
                                    <i class="fa-solid fa-envelope form-icon"></i>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="username@gmail.com" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="alamat" class="form-label small fw-bold text-secondary">Alamat Rumah Domisili Lengkap</label>
                                <div class="input-group-custom">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Tuliskan nama jalan, nomor rumah, RT/RW, Jorong, Kecamatan, Kabupaten..." required>{{ old('alamat') }}</textarea>
                                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- SEKSI 3: RINCIAN PERMOHONAN -->
                        <div class="section-divider">3. Deskripsi & Dokumen Pendukung</div>

                        <div class="row g-4">
                            <div class="col-12">
                                <label for="tujuan" class="form-label small fw-bold text-secondary">Subjek Utama / Tujuan Pengajuan</label>
                                <div class="input-group-custom">
                                    <i class="fa-solid fa-circle-info form-icon"></i>
                                    <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan') }}" placeholder="Contoh: Permohonan Data Anggaran / Proposal Riset Akademik" required>
                                    @error('tujuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="rincian" class="form-label small fw-bold text-secondary">Rincian Deskripsi Informasi yang Dibutuhkan</label>
                                <div class="input-group-custom">
                                    <textarea class="form-control @error('rincian') is-invalid @enderror" id="rincian" name="rincian" rows="4" placeholder="Jelaskan parameter data secara lengkap agar memudahkan petugas melakukan ekstraksi berkas..." required>{{ old('rincian') }}</textarea>
                                    @error('rincian') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-bold text-secondary">Berkas Lampiran Foto KTP / Legalitas Resmi</label>
                                <div class="file-drop-area">
                                    <i class="fa-solid fa-cloud-arrow-up fa-3x text-primary mb-3 opacity-75"></i>
                                    <span class="fw-semibold text-dark">Klik atau Seret Berkas ke Area Ini</span>
                                    <span class="text-muted small mt-1">Hanya file gambar (JPG, JPEG, PNG) berukuran maksimal 2 megabyte.</span>
                                    <input type="file" class="@error('foto') is-invalid @enderror" id="foto" name="foto" accept=".jpg,.jpeg,.png" required onchange="previewImage(this)">
                                    
                                    <!-- Thumbnail Live Preview -->
                                    <div class="preview-container" id="imagePreviewContainer">
                                        <img id="imagePreview" src="#" alt="Pratinjau Foto" class="w-100 h-100 object-fit-cover">
                                    </div>
                                </div>
                                @error('foto') <div class="invalid-feedback d-block mt-2">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Tombol Eksekusi Submit -->
                        <div class="mt-5 text-end d-flex align-items-center justify-content-between flex-wrap gap-3 border-top pt-4">
                            <span class="text-muted small"><i class="fa-solid fa-shield-halved text-success me-1"></i> Koneksi SSL Terenkripsi Aman</span>
                            <button type="submit" class="btn btn-submit-premium px-5 py-3">
                                Kirim Pengajuan Resmi <i class="fa-solid fa-arrow-right-long ms-2"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Scripts Google reCAPTCHA v3 & Live Preview Logic -->
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    // JS 1: Script Live Preview Gambar
    function previewImage(input) {
        const container = document.getElementById('imagePreviewContainer');
        const preview = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            container.style.display = 'none';
        }
    }

    // JS 2: Proteksi reCAPTCHA v3
    document.getElementById('pengajuanForm').addEventListener('submit', function(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", { action: 'submit_pengajuan' }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
                document.getElementById('pengajuanForm').submit();
            });
        });
    });


    // JS 3: Fungsi Salin Kode Registrasi ke Clipboard
    function copyToClipboard() {
        const kodeText = document.getElementById('kodeRegistrasiText').innerText;
        const btnCopy = document.getElementById('btnCopyKode');
        const btnText = document.getElementById('btnCopyText');
        
        navigator.clipboard.writeText(kodeText).then(() => {
            // Efek visual sukses saat disalin
            btnCopy.classList.remove('btn-outline-primary');
            btnCopy.classList.add('btn-success', 'text-white');
            btnText.innerText = 'Tersalin!';
            
            // Kembalikan tombol ke status awal setelah 2 detik
            setTimeout(() => {
                btnCopy.classList.remove('btn-success', 'text-white');
                btnCopy.classList.add('btn-outline-primary');
                btnText.innerText = 'Salin Kode';
            }, 2000);
        }).catch(err => {
            console.error('Gagal menyalin text: ', err);
        });
    }
</script>
@endsection