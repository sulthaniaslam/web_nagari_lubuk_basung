@extends('pages.layout')

@section('content')
<!-- Google Fonts & Library Pihak Ketiga -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"/>

<style>
    :root {
        --pkk-teal: #0f766e;       /* Teal mewah */
        --pkk-teal-light: #ccfbf1; /* Soft tint */
        --pkk-emerald: #047857;    /* Emerald elegan */
        --pkk-blue: #0369a1;       /* Deep Ocean Blue */
        --slate-primary: #0f172a;  /* Gelap Elegan */
        --slate-muted: #64748b;    /* Abu adem */
        --glass-bg: rgba(255, 255, 255, 0.75);
    }

    /* Override Font Global ke Plus Jakarta Sans */
    .pkk-scope {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc;
        color: var(--slate-primary);
        letter-spacing: -0.01em;
    }

    /* Premium Hero Header */
    .hero-premium {
        position: relative;
        background: radial-gradient(circle at top right, rgba(13, 148, 136, 0.15), transparent),
                    radial-gradient(circle at bottom left, rgba(2, 132, 199, 0.1), transparent),
                    #ffffff;
        padding: 100px 0 140px 0;
        overflow: hidden;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .hero-premium::before {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0; height: 80px;
        background: linear-gradient(to top, #f8fafc, transparent);
    }

    /* Badge Custom */
    .pkk-tag {
        background: var(--pkk-teal-light);
        color: var(--pkk-teal);
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        padding: 8px 16px;
        border-radius: 100px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    /* Section Typography */
    .title-large {
        font-weight: 800;
        font-size: 2.5rem;
        color: var(--slate-primary);
        letter-spacing: -0.03em;
    }

    /* Premium Cards (Glassmorphism & Soft Floating Shadows) */
    .card-glass {
        background: var(--glass-bg);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 24px;
        box-shadow: 0 4px 30px rgba(15, 23, 42, 0.02), 
                    0 1px 3px rgba(15, 23, 42, 0.02);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .card-glass:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(15, 23, 42, 0.06);
        border-color: rgba(15, 118, 110, 0.15);
    }

    /* Sambutan Image Frame */
    .sambutan-frame {
        position: relative;
        border-radius: 32px;
        padding: 12px;
        background: white;
        box-shadow: 0 10px 40px -10px rgba(15, 23, 42, 0.1);
    }
    .sambutan-frame img {
        border-radius: 22px;
        filter: grayscale(10%) contrast(102%);
    }

    /* Visi Misi List */
    .misi-list li {
        list-style: none;
        position: relative;
        padding-left: 36px;
        margin-bottom: 16px;
    }
    .misi-list li::before {
        content: "\f00c";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: 0; top: 2px;
        width: 24px; height: 24px;
        background: var(--pkk-teal-light);
        color: var(--pkk-teal);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
    }

    /* Pengurus Grid / Avatar Row */
    .avatar-wrapper {
        position: relative;
        width: 140px;
        height: 140px;
        margin: 0 auto 20px auto;
    }
    .avatar-circle {
        width: 100%; height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        transition: transform 0.4s ease;
    }
    .card-glass:hover .avatar-circle {
        transform: scale(1.04);
    }
    .role-badge {
        font-size: 0.72rem;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 100px;
        background-color: #f1f5f9;
        color: var(--slate-primary);
    }

    /* Ultra Grid Galeri */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
    }
    .gallery-card {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        height: 280px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.02);
    }
    .gallery-card img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .gallery-blur-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.3) 60%, transparent 100%);
        opacity: 0.85;
        transition: opacity 0.4s ease;
    }
    .gallery-content {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        padding: 24px;
        transform: translateY(10px);
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .gallery-card:hover img { transform: scale(1.06); }
    .gallery-card:hover .gallery-content { transform: translateY(0); }
    
    /* Elegant Divider */
    .premium-divider {
        width: 48px; height: 4px;
        background: linear-gradient(90deg, var(--pkk-teal), var(--pkk-blue));
        border-radius: 100px;
    }
</style>

<div class="pkk-scope">

    <!-- ================= HERO HEADER ================= -->
    <header class="hero-premium text-center animate__animated animate__fadeIn">
        <div class="container position-relative" style="z-index: 2;">
            <div class="pkk-tag mb-3">
                <i class="fa-solid fa-building-columns"></i> Lembaga Pemberdayaan Nagari
            </div>
            <h1 class="display-5 fw-extrabold text-slate-900 mb-3 text-primary" style="font-weight: 800; letter-spacing: -0.04em;">
                Tim Penggerak PKK Nagari
            </h1>
            <p class="text-muted mx-auto fs-5" style="max-width: 680px; line-height: 1.6;">
                Wadah ikhtiar bersama dalam mendampingi, memberdayakan, dan membina ketahanan keluarga menuju peradaban nagari yang maju dan berbudaya.
            </p>
        </div>
    </header>

    <!-- ================= 1. SAMBUTAN KETUA PKK ================= -->
    <section class="py-5" style="margin-top: -60px; position: relative; z-index: 10;">
        <div class="container">
            <div class="card-glass p-4 p-md-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-5 text-center">
                        <div class="sambutan-frame d-inline-block animate__animated animate__fadeInLeft">
                            <img src="{{ env('API_STORAGE') . $data['pkk']['sambutan_pkk'][0]['foto'] }}" alt="Ketua TP-PKK" class="img-fluid" style="width: 100%; max-width: 340px; height: 380px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="pkk-tag mb-2" style="background-color: #f0fdfa;">
                            <i class="fa-solid fa-quote-left"></i> Khidmat & Pengabdian
                        </div>
                        <h2 class="fw-extrabold text-slate-900 mt-1 mb-3" style="font-weight: 700;">Sambutan Ketua TP-PKK Nagari</h2>
                        <div class="premium-divider mb-4"></div>
                        <p class="text-secondary fs-6" style="line-height: 1.85; text-align: justify;">
                            {!! $data['pkk']['sambutan_pkk'][0]['text'] !!}
                        </p>
                        
                        <div class="d-flex align-items-center gap-3 mt-4 pt-3 border-top border-light">
                            <div>
                                <h6 class="fw-bold text-dark m-0 fs-5">{{ $data['pkk']['sambutan_pkk'][0]['nama_ketua_pkk'] }}</h6>
                                <small class="text-muted fw-medium tracking-wide text-uppercase" style="font-size: 0.75rem;">Ketua Tim Penggerak PKK</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================== 2. Card Visi Misi ======================== --}}

    <section class="py-5 mb-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="title-large">Visi & Misi PKK Nagari</h2>
                <div class="premium-divider mx-auto mt-3"></div>
            </div>

            <div class="gallery-grid">
                <!-- Item 1 -->
                @foreach ($data['pkk']['visi_misi_pkk'] as $item)
                <div class="gallery-card shadow-sm">
                    <img src="{{ env('API_STORAGE') . $item['visi_misi'] }}" alt="Posyandu">
                    <div class="gallery-blur-overlay"></div>
                    <div class="gallery-content text-white">
                        <span class="badge bg-warning text-dark fw-bold mb-2 py-1.5 px-2.5 rounded-pill" style="font-size: 0.68rem;">*****</span>
                        <h5 class="fw-bold m-0 lh-base">Visi Misi PKK Nagari</h5>
                        <a href="{{ env('API_STORAGE') . $item['visi_misi'] }}" data-lightbox="pkk-premium" data-title="Visi Misi PKK Nagari" class="stretched-link"></a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    

    <!-- ================= 3. STRUKTUR ORGANISASI ================= -->
    <section class="py-5">
        <div class="container text-center">
            <div class="mb-4">
                <h2 class="title-large">Struktur Organisasi</h2>
                <p class="text-muted small">Bagan tata kelola koordinasi dan pembagian bidang kerja pengurus</p>
                <div class="premium-divider mx-auto mt-3"></div>
            </div>

            <div class="card-glass p-3 p-md-4">
                <div class="overflow-hidden rounded-4 text-center bg-light border p-2">
                    <img src="{{ env('API_STORAGE') . $data['pkk']['struktur_pkk']['struktur_pkk'] }}" alt="Bagan Struktur PKK" class="img-fluid rounded-3" style="width: 100%; max-height: 520px; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 4. PENGURUS PKK ================= -->
    <section class="py-5">
        <div class="container text-center">
            <div class="mb-5">
                <h2 class="title-large">Anggota PKK Nagari</h2>
                <div class="premium-divider mx-auto mt-3"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach ($data['pkk']['pengurus_pkk'] as $item)
                <div class="col-xl-3 col-md-6">
                    <div class="card-glass p-4 h-100 text-center">
                        <div class="avatar-wrapper">
                            <img src="{{ env('API_STORAGE') . $item['foto'] }}" alt="Anggota" class="avatar-circle">
                        </div>
                        <h6 class="fw-bold text-dark mb-2 fs-5">{{ $item['nama'] }}</h6>
                        <span class="role-badge" style="background-color: #f0fdfa; color: var(--pkk-teal);">{{ $item['jabatan'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= 5. GALERI KEGIATAN ================= -->
    <section class="py-5 mb-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="title-large">Dokumentasi Kegiatan PKK</h2>
                <div class="premium-divider mx-auto mt-3"></div>
            </div>

            <div class="gallery-grid">
                @foreach ($data['pkk']['galeri_pkk'] as $item)
                <div class="gallery-card shadow-sm">
                    <img src="{{ env('API_STORAGE') . $item['thumbnail_galeri_pkk'] }}" alt="Posyandu">
                    <div class="gallery-blur-overlay"></div>
                    <div class="gallery-content text-white">
                        <span class="badge bg-warning text-dark fw-bold mb-2 py-1.5 px-2.5 rounded-pill" style="font-size: 0.68rem;">POKJA IV</span>
                        <h5 class="fw-bold m-0 lh-base">{{ $item['judul_galeri_pkk'] }}</h5>
                        <a href="{{ env('API_STORAGE') . $item['thumbnail_galeri_pkk'] }}" data-lightbox="pkk-premium" data-title="{{ $item['judul_galeri_pkk'] }}" class="stretched-link"></a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

</div>

<!-- Script Efek -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<script>
    lightbox.option({
      'fadeDuration': 300,
      'imageFadeDuration': 300,
      'wrapAround': true,
      'albumLabel': "Arsip %1 dari %2"
    })
</script>
@endsection