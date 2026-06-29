@extends('pages.layout')

@section('content')
<!-- Google Fonts & FontAwesome 6 -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --pkk-teal: #0f766e;
        --pkk-teal-dark: #115e59;
        --pkk-teal-light: #f0fdfa;
        --pkk-gold: #b45309;
        --pkk-gold-light: #fef3c7;
        --slate-900: #0f172a;
        --slate-800: #1e293b;
        --slate-500: #64748b;
        --slate-100: #f1f5f9;
    }

    .pkk-scope-pengurus {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        color: var(--slate-900);
        padding-bottom: 100px;
        letter-spacing: -0.01em;
    }

    /* Elegant Header */
    .editorial-header {
        padding: 90px 0 60px 0;
        text-align: center;
        position: relative;
    }
    
    .editorial-header h1 {
        font-weight: 800;
        font-size: 2.8rem;
        color: var(--slate-900);
        letter-spacing: -0.04em;
    }

    .premium-tag {
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--pkk-teal);
        background: var(--pkk-teal-light);
        padding: 8px 20px;
        border-radius: 100px;
        display: inline-block;
        margin-bottom: 16px;
    }

    .editorial-line {
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--pkk-teal), #0369a1);
        margin: 24px auto 0 auto;
        border-radius: 100px;
    }

    /* Section Subtitle Typography */
    .section-headline {
        font-size: 2rem;
        font-weight: 800;
        color: var(--slate-900);
        margin-bottom: 35px;
        letter-spacing: -0.03em;
    }

    /* Pimpinan / Elite Row Layout (Split Card Style) */
    .elite-card {
        background: #ffffff;
        border: 1px solid rgba(15, 23, 42, 0.05);
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 0 10px 40px -15px rgba(15, 23, 42, 0.04);
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .elite-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 60px -15px rgba(15, 23, 42, 0.08);
        border-color: rgba(15, 118, 110, 0.2);
    }

    .elite-img-wrapper {
        height: 380px;
        overflow: hidden;
        position: relative;
    }

    .elite-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .elite-card:hover .elite-img-wrapper img {
        transform: scale(1.05);
    }

    .elite-content {
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .badge-pimpinan {
        background: var(--pkk-gold-light);
        color: var(--pkk-gold);
        font-weight: 700;
        font-size: 0.72rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 6px 16px;
        border-radius: 100px;
        display: inline-block;
        margin-bottom: 16px;
    }

    /* Pokja Grid Layout (Luxury Minimalism) */
    .pokja-card {
        background: #ffffff;
        border: 1px solid rgba(15, 23, 42, 0.04);
        border-radius: 28px;
        padding: 24px;
        height: 100%;
        box-shadow: 0 4px 25px rgba(15, 23, 42, 0.015);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    .pokja-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 24px 48px -10px rgba(15, 23, 42, 0.06);
        border-color: rgba(0, 0, 0, 0.08);
    }

    .pokja-avatar-box {
        position: relative;
        width: 100%;
        height: 240px;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .pokja-avatar-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .pokja-badge-floating {
        position: absolute;
        top: 16px; right: 16px;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        font-weight: 800;
        font-size: 0.7rem;
        padding: 6px 14px;
        border-radius: 100px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }

    .member-name-lux {
        font-weight: 700;
        font-size: 1.15rem;
        color: var(--slate-900);
        letter-spacing: -0.02em;
    }

    .divider-thin {
        height: 1px;
        background: linear-gradient(90deg, rgba(0,0,0,0.06), transparent);
        margin: 14px 0;
    }

    /* Social Icon Circles */
    .social-link-circle {
        width: 38px; height: 38px;
        border-radius: 50%;
        border: 1px solid var(--slate-100);
        color: var(--slate-500);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-link-circle:hover {
        background: var(--slate-900);
        color: #ffffff;
        border-color: var(--slate-900);
    }
</style>

<div class="pkk-scope-pengurus">

    <!-- HEADER -->
    <header class="editorial-header animate__animated animate__fadeIn">
        <div class="container">
            <span class="premium-tag">Struktur Esensial</span>
            <h1>Pengurus TP-PKK Nagari</h1>
            <p class="text-muted mx-auto mt-2" style="max-width: 540px; font-size: 0.95rem; line-height: 1.6;">
                Sinergi kolektif para kader wanita terpilih dalam mengarsiteki pilar ketahanan pangan, kesehatan, dan edukasi publik masyarakat.
            </p>
            <div class="editorial-line"></div>
        </div>
    </header>

    <div class="container">

        <!-- ================= SECTION 1: PIMPINAN PUNCAK (SPLIT CARD) ================= -->

        <div class="row g-5 justify-content-center mb-5 pb-4 animate__animated animate__fadeInUp">
            <div class="col-lg-11">
                <!-- Ketua Card -->
                <div class="elite-card mb-4">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-5">
                            <div class="elite-img-wrapper">
                                <img src="{{ env('API_STORAGE') . $data['pkk']['sambutan_pkk'][0]['foto'] }}" alt="Ketua PKK">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="elite-content">
                                <div>
                                    <span class="badge-pimpinan"><i class="fa-solid fa-crown me-1"></i> Ketua Tim Penggerak</span>
                                    <h3 class="fw-bold text-slate-800 mb-1" style="font-size: 1.75rem;">{{ $data['pkk']['sambutan_pkk'][0]['nama_ketua_pkk'] }}</h3>
                                    <p class="text-muted small fw-medium mb-3">Penanggung Jawab Utama Kebijakan & Hubungan Lembaga</p>
                                    {{-- <p class="text-secondary small mb-4" style="line-height: 1.7;">
                                        Mengendalikan jalannya roda organisasi, menetapkan arah visi makro 10 Program Pokok PKK, serta mengkoordinasikan kemitraan strategis lintas sektor di lingkup Pemerintah Nagari.
                                    </p> --}}
                                    <div class="d-flex gap-2">
                                        <a href="#" class="social-link-circle"><i class="fa-brands fa-whatsapp"></i></a>
                                        <a href="#" class="social-link-circle"><i class="fa-solid fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- ================= SECTION 3: KETUA POKJA ================= -->
        <div class="text-center pt-4 animate__animated animate__fadeIn">
            <h2 class="section-headline">Anggota TP-PKK</h2>
        </div>

        <div class="row g-4 animate__animated animate__fadeInUp">
            <!-- Pokja 1 -->
            @foreach ($data['pkk']['pengurus_pkk'] as $item)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="pokja-card">
                    <div class="pokja-avatar-box">
                        <img src="{{ env('API_STORAGE') . $item['foto'] }}" alt="{{ $item['nama'] }}">
                        
                        <div class="pokja-badge-floating" style="background: rgba(254, 243, 199, 0.95); color: #b45309;">
                            {{ Str::contains(strtolower($item['jabatan']), 'ketua') ? 'Pengurus Inti' : 'Anggota' }}
                        </div>
                    </div>
                    
                    <h4 class="member-name-lux mb-1">{{ $item['nama'] }}</h4>
                    
                    <span class="text-muted tracking-wide" style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase;">
                        {{ $item['jabatan'] }}
                    </span>
                    
                    <div class="divider-thin"></div>
        
                    <div class="text-start mx-auto" style="max-width: 240px;">
                        <div class="d-flex align-items-center gap-2 mb-1.5 text-secondary small">
                            <i class="fa-solid fa-star-and-crescent text-muted" style="width: 16px; font-size: 0.8rem;"></i>
                            <span class="fw-medium">Agama:</span>
                            <span class="text-dark fw-semibold ms-auto">{{ $item['agama'] }}</span>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2 mb-1.5 text-secondary small">
                            <i class="fa-solid fa-map-location-dot text-muted" style="width: 16px; font-size: 0.8rem;"></i>
                            <span class="fw-medium">Alamat:</span>
                            <span class="text-dark text-truncate ms-auto" style="max-width: 140px;" title="{{ $item['alamat'] }}">
                                {{ $item['alamat'] }}
                            </span>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2 text-secondary small">
                            <i class="fa-solid fa-phone text-muted" style="width: 16px; font-size: 0.8rem;"></i>
                            <span class="fw-medium">Kontak:</span>
                            <span class="text-dark fw-semibold ms-auto" style="font-size: 0.75rem;">{{ $item['no_telp'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>
@endsection