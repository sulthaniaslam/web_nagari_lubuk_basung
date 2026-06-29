@extends('pages.layout')

@section('content')
<main class="perangkat-wrapper">
  <div class="container">
    
    <div class="row justify-content-center text-center mb-5">
      <div class="col-lg-7 animate__animated animate__fadeIn">
        <span class="section-tag text-crimson">Struktur Organisasi</span>
        <h1 class="section-title-pro">Aparatur Pemerintah Nagari</h1>
        <p class="section-subtitle-custom">Pelayan publik yang berdedikasi tinggi, transparan, dan siap memberikan kinerja prima bagi kemajuan nagari digital.</p>
      </div>
    </div>

    <div class="row justify-content-center mb-5">
      <div class="col-md-5 animate__animated animate__fadeInUp">
        <div class="card staff-card card-leader text-center border-0 overflow-hidden">
          <div class="staff-img-wrapper">
            <i class="fa-solid fa-user-tie fa-5x text-white-50"></i>
            <span class="staff-badge badge-crimson-gold">Wali Nagari</span>
          </div>
          <div class="staff-body">
            <h4 class="staff-name text-darkblue">{{ $data['walinagari']['nama_walinagari'] }}</h4>
            <p class="staff-nip text-muted">NIP. 19750812 200312 1 002</p>
            <div class="staff-divider"></div>
            <p class="staff-desc small px-3">Memimpin penyelenggaraan pemerintahan, pelaksanaan pembangunan, pembinaan kemasyarakatan, dan pemberdayaan masyarakat nagari.</p>
            <div class="staff-socials">
              <a href="#" class="staff-icon"><i class="fa-solid fa-envelope"></i></a>
              <a href="#" class="staff-icon"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center mb-5">
      <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
        <div class="card staff-card text-center border-0 overflow-hidden">
          <div class="staff-img-wrapper bg-gradient-blue-subtle">
            <i class="fa-solid fa-user-shield fa-4x text-white-50"></i>
            <span class="staff-badge badge-blue">Sekretaris Nagari</span>
          </div>
          <div class="staff-body">
            <h5 class="staff-name text-darkblue">Rinaldi Saputra, S.STP</h5>
            <p class="staff-nip text-muted">NIP. 19881105 201201 1 003</p>
            <div class="staff-divider"></div>
            <p class="staff-desc small">Mengkoordinasikan urusan administrasi, penyusunan program, dan pelayanan teknis administratif seluruh perangkat.</p>
            <div class="staff-socials">
              <a href="#" class="staff-icon"><i class="fa-solid fa-envelope"></i></a>
              <a href="#" class="staff-icon"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-4 justify-content-center">

      @foreach ($data['perangkat_nagari'] as $item)
      <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp animate__delay-2s">
        <div class="card staff-card text-center border-0 overflow-hidden h-100">
          
          <div class="staff-img-wrapper bg-gradient-gold-subtle position-relative overflow-hidden">
            @if(!empty($item['foto']))
              <img src="{{ env('API_STORAGE') . $item['foto'] }}" alt="Foto {{ $item['nama_anggota'] }}" class="w-100 h-100 object-fit-cover" onerror="this.style.display='none'">
            @endif
            
            <i class="fa-solid fa-user fa-3x text-white-50 position-absolute start-50 top-50 translate-middle" style="z-index: 1;"></i>
          </div>
          
          <div class="staff-body p-3 d-flex flex-column justify-content-between h-100">
            <div>
              <div class="mb-2">
                <span class="staff-badge badge-blue position-static">
                  {{ $item['jabatan'] }}
                </span>
              </div>

              <h6 class="staff-name text-darkblue fw-bold mb-1">{{ $item['nama_anggota'] }}</h6>
              
              {{-- Tempat & Tanggal Lahir --}}
              <p class="staff-nip text-muted small mb-2">
                <i class="fa-solid fa-cake-candles me-1 text-gold"></i> 
                {{ $item['tempat_lahir'] }}, {{ \Carbon\Carbon::parse($item['tanggal_lahir'])->translatedFormat('d F Y') }}
              </p>
              
              {{-- MENAMPILKAN RIWAYAT PENDIDIKAN --}}
              <p class="staff-desc small mt-2 mb-2 text-darkfw-semibold">
                <i class="fa-solid fa-graduation-cap me-1 text-primary"></i> 
                @if(!empty($item['riwayat_pendidikan']))
                  {!! $item['riwayat_pendidikan'] !!}
                @else
                  <span class="text-muted fst-italic fw-normal">Tidak ada data pendidikan</span>
                @endif
              </p>
            </div>
            
            {{-- Alamat --}}
            <p class="staff-desc small mt-2 text-secondary mb-0 border-top pt-2">
              <i class="fa-solid fa-location-dot me-1 text-danger"></i> {{ $item['alamat'] }}
            </p>
          </div>

        </div>
      </div>
      @endforeach


      {{-- <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp animate__delay-2s">
        <div class="card staff-card text-center border-0 overflow-hidden h-100">
          <div class="staff-img-wrapper bg-gradient-blue-subtle">
            <i class="fa-solid fa-user fa-3x text-white-50"></i>
            <span class="staff-badge badge-blue">Kaur Umum & Perencanaan</span>
          </div>
          <div class="staff-body">
            <h6 class="staff-name text-darkblue">Andi Wijaya, S.Kom</h6>
            <p class="staff-nip text-muted">NIP. 19910122 201801 1 001</p>
            <p class="staff-desc small mt-2">Mengurus tata usaha, kearsipan perkantoran, dan operator pusat data digital nagari.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp animate__delay-2s">
        <div class="card staff-card text-center border-0 overflow-hidden h-100">
          <div class="staff-img-wrapper bg-gradient-green-subtle">
            <i class="fa-solid fa-user fa-3x text-white-50"></i>
            <span class="staff-badge badge-green">Kasi Pelayanan</span>
          </div>
          <div class="staff-body">
            <h6 class="staff-name text-darkblue">Ferry Hermawan, S.Sos</h6>
            <p class="staff-nip text-muted">Aparatur Nagari</p>
            <p class="staff-desc small mt-2">Pelaksana teknis pelayanan administrasi kependudukan dan pencatatan sipil mandiri.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp animate__delay-2s">
        <div class="card staff-card text-center border-0 overflow-hidden h-100">
          <div class="staff-img-wrapper bg-gradient-crimson-subtle">
            <i class="fa-solid fa-user fa-3x text-white-50"></i>
            <span class="staff-badge badge-crimson">Kasi Kesejahteraan</span>
          </div>
          <div class="staff-body">
            <h6 class="staff-name text-darkblue">Hendrik, S.E</h6>
            <p class="staff-nip text-muted">Aparatur Nagari</p>
            <p class="staff-desc small mt-2">Mengembangkan program pemberdayaan ekonomi, jaminan sosial rakyat, dan pembangunan fisik.</p>
          </div>
        </div>
      </div> --}}

    </div>

  </div>
</main>
@endsection