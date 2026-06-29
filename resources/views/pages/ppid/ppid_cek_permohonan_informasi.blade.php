@extends('pages.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    :root {
        --primary-color: #2563eb;
        --bg-gradient: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        --text-dark: #0f172a;
    }

    .check-page-bg {
        background: var(--bg-gradient);
        min-height: 80vh;
        display: flex;
        align-items: center;
    }

    .modern-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 24px;
        box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.08);
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

    .input-group-custom .form-control {
        padding-left: 48px;
        height: 56px;
        border-radius: 12px;
        border: 1.5px solid #cbd5e1;
        background-color: #f8fafc;
        color: var(--text-dark);
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.2s ease-in-out;
    }

    .input-group-custom .form-control:focus {
        background-color: #fff;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(37, 99, 211, 0.15);
    }

    .input-group-custom .form-control:focus ~ .form-icon {
        color: var(--primary-color);
    }

    .btn-check-premium {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        border: none;
        height: 56px;
        color: white;
        font-weight: 600;
        border-radius: 12px;
        box-shadow: 0 8px 20px -6px rgba(29, 78, 216, 0.4);
        transition: all 0.2s ease;
    }

    .btn-check-premium:hover {
        transform: translateY(-1px);
        box-shadow: 0 12px 24px -6px rgba(29, 78, 216, 0.6);
    }
</style>

<main class="check-page-bg py-5">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="card modern-card p-4 p-sm-5 border-0 animate__animated animate__fadeInUp">
                    
                    <div class="text-center mb-4">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 fw-bold">CEK STATUS</span>
                        <h2 class="fw-extrabold text-slate-900 mb-2" style="font-weight: 800;">Lacak Permohonan</h2>
                        <p class="text-secondary masukkan-info">Masukkan kode registrasi resmi Anda untuk melihat perkembangan status permohonan informasi.</p>
                    </div>

                    @if($errors->has('error'))
                        <div class="alert alert-danger border-0 rounded-4 p-3 mb-4 shadow-sm" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-circle-exclamation fa-lg me-3 text-danger"></i>
                                <div>{{ $errors->first('error') }}</div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ url('ppid_permohonan_informasi/check') }}" method="POST" id="cekStatusForm">
                        @csrf
                        <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="kode_registrasi" class="form-label small fw-bold text-secondary">Kode Registrasi Permohonan</label>
                                <div class="input-group-custom">
                                    <i class="fa-solid fa-ticket-simple form-icon"></i>
                                    <input type="text" class="form-control text-uppercase @error('kode_registrasi') is-invalid @enderror" 
                                           id="kode_registrasi" name="kode_registrasi" value="{{ old('kode_registrasi') }}" 
                                           placeholder="CONTOH: ABC-12345" required autocomplete="off">
                                </div>
                                @error('kode_registrasi') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-check-premium w-100">
                                    <i class="fa-solid fa-magnifying-glass me-2"></i> Periksa Status Berkas
                                </button>
                            </div>
                        </div>

                        <div class="text-center mt-4 pt-3 border-top">
                            <span class="text-muted small"><i class="fa-solid fa-shield-halved text-success me-1"></i> Dilindungi oleh Google reCAPTCHA v3</span>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</main>

<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    document.getElementById('cekStatusForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Tahan submit
        
        grecaptcha.ready(function() {
            grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", { action: 'cek_status_permohonan' }).then(function(token) {
                // Taruh token ke input hidden 'recaptcha_token'
                document.getElementById('recaptcha_token').value = token;
                
                // Lanjutkan submit form
                document.getElementById('cekStatusForm').submit();
            });
        });
    });
</script>
@endsection