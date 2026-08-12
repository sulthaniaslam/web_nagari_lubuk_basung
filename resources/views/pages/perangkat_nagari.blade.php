@extends('pages.layout')

@section('content')
<style>
  /* Styling Card Utama */
  .staff-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 12px;
    cursor: pointer; /* Menandakan card dapat diklik */
  }
  .staff-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.12) !important;
  }

  /* Container Foto Avatar Lingkaran di Card Utama */
  .avatar-img-container {
    width: 130px;
    height: 130px;
    margin: 20px auto 10px auto;
    position: relative;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid #ffffff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.12);
    background-color: #f8f9fa;
  }
  .avatar-img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  /* Container Foto Utuh (Full Image) Khusus di Popup Modal */
  .modal-full-img-wrapper {
    width: 100%;
    max-height: 320px; /* Batas tinggi maksimal agar modal tidak terlalu panjang */
    background-color: #212529; /* Background gelap netral agar foto kontras */
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .modal-full-img-wrapper img {
    max-width: 100%;
    max-height: 320px;
    width: auto;
    height: auto;
    object-fit: contain; /* Foto utuh tanpa terpotong/distorsi */
  }

  /* Badge Jabatan */
  .badge-jabatan {
    font-size: 0.8rem;
    padding: 6px 14px;
    border-radius: 20px;
    display: inline-block;
    font-weight: 600;
  }

  /* Format Tampilan List di Dalam Modal */
  .modal-education-body ol, 
  .modal-education-body ul {
    padding-left: 1.2rem;
    margin-bottom: 0;
  }
  .modal-education-body li {
    margin-bottom: 0.4rem;
  }
</style>

<main class="perangkat-wrapper py-5">
  <div class="container">
    
    <!-- Header Title -->
    <div class="row justify-content-center text-center mb-5">
      <div class="col-lg-7 animate__animated animate__fadeIn">
        <span class="section-tag text-crimson fw-bold text-uppercase tracking-wider">{{ $data['nama_instansi'] }}</span>
        <h1 class="section-title-pro fw-bold text-darkblue">Perangkat {{ $data['nama_instansi'] }}</h1>
      </div>
    </div>

    <!-- CARD WALI NAGARI (LEADER) -->
    <div class="row justify-content-center mb-5">
      <div class="col-md-5 col-lg-4 animate__animated animate__fadeInUp">
        <div class="card staff-card card-leader text-center border-0 shadow-sm overflow-hidden h-100" 
             data-bs-toggle="modal" 
             data-bs-target="#modalPendidikanWali">
          
          <!-- Foto Wali Nagari (Card) -->
          <div class="bg-gradient-gold-subtle pt-3 pb-1 position-relative">
            <div class="avatar-img-container">
              @if(!empty($data['walinagari']['gambar_walinagari']))
                <img src="{{ env('API_STORAGE') . $data['walinagari']['gambar_walinagari'] }}" 
                     alt="{{ $data['walinagari']['nama_walinagari'] }}"
                     onerror="this.onerror=null; this.src='https://via.placeholder.com/150?text=No+Image';">
              @else
                <div class="d-flex align-items-center justify-content-center h-100 bg-secondary text-white">
                  <i class="fa-solid fa-user-tie fa-4x"></i>
                </div>
              @endif
            </div>
            
            <!-- Badge Jabatan -->
            <div class="mb-2">
              <span class="badge-jabatan bg-danger text-white shadow-sm">Wali Nagari</span>
            </div>
          </div>

          <!-- Keterangan Wali Nagari -->
          <div class="card-body p-4 d-flex flex-column justify-content-between">
            <div>
              <h5 class="staff-name text-darkblue fw-bold mb-2">{{ $data['walinagari']['nama_walinagari'] }}</h5>

              <p class="staff-location text-muted small mb-1">
                <i class="fa-solid fa-cake-candles me-1 text-danger"></i>
                {{ $data['walinagari']['tempat_lahir'] }}, 
                {{ \Carbon\Carbon::parse($data['walinagari']['tanggal_lahir'])->translatedFormat('d F Y') }}
              </p>
              
              <p class="staff-nip text-muted small mb-2">
                <i class="fa-solid fa-graduation-cap me-1 text-primary"></i>
                Pendidikan: <strong>{{ $data['walinagari']['pendidikan'] ?? '-' }}</strong>
              </p>

              <div class="badge bg-light text-primary border small fw-normal py-1 px-2 mb-3">
                <i class="fa-solid fa-circle-info me-1"></i> Klik card untuk riwayat lengkap
              </div>

              <hr class="my-2 opacity-25">

              <p class="staff-desc small text-secondary px-2 mb-3">
                Memimpin penyelenggaraan pemerintahan, pelaksanaan pembangunan, pembinaan kemasyarakatan, dan pemberdayaan masyarakat nagari.
              </p>
            </div>

            <!-- Sosmed Wali Nagari -->
            <div class="staff-socials d-flex justify-content-center gap-2 pt-2 border-top" onclick="event.stopPropagation();">
              @if(!empty($data['walinagari']['kontak']))
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $data['walinagari']['kontak']) }}" class="btn btn-sm btn-outline-success rounded-circle" target="_blank" title="WhatsApp">
                  <i class="fa-brands fa-whatsapp"></i>
                </a>
              @endif

              @if(!empty($data['walinagari']['facebook']) && $data['walinagari']['facebook'] !== '-')
                <a href="{{ $data['walinagari']['facebook'] }}" class="btn btn-sm btn-outline-primary rounded-circle" target="_blank" title="Facebook">
                  <i class="fa-brands fa-facebook-f"></i>
                </a>
              @endif

              @if(!empty($data['walinagari']['instagram']) && $data['walinagari']['instagram'] !== '-')
                <a href="{{ $data['walinagari']['instagram'] }}" class="btn btn-sm btn-outline-danger rounded-circle" target="_blank" title="Instagram">
                  <i class="fa-brands fa-instagram"></i>
                </a>
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- DAFTAR PERANGKAT NAGARI -->
    <div class="row g-4 justify-content-center">

      @foreach ($data['perangkat_nagari'] as $index => $item)
      <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp">
        <div class="card staff-card text-center border-0 shadow-sm overflow-hidden h-100" 
             data-bs-toggle="modal" 
             data-bs-target="#modalPendidikan{{ $index }}">
          
          <!-- Foto Perangkat (Card) -->
          <div class="bg-gradient-blue-subtle pt-3 pb-1 position-relative">
            <div class="avatar-img-container">
              @if(!empty($item['foto']))
                <img src="{{ env('API_STORAGE') . $item['foto'] }}" 
                     alt="Foto {{ $item['nama_anggota'] }}" 
                     onerror="this.onerror=null; this.parentNode.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 bg-secondary text-white\'><i class=\'fa-solid fa-user fa-3x\'></i></div>';">
              @else
                <div class="d-flex align-items-center justify-content-center h-100 bg-secondary text-white">
                  <i class="fa-solid fa-user fa-3x"></i>
                </div>
              @endif
            </div>
            
            <!-- Jabatan -->
            <div class="mb-2">
              <span class="badge-jabatan bg-primary text-white shadow-sm">
                {{ $item['jabatan'] }}
              </span>
            </div>
          </div>
          
          <!-- Keterangan Perangkat Nagari -->
          <div class="card-body p-3 d-flex flex-column justify-content-between">
            <div>
              <h6 class="staff-name text-darkblue fw-bold mb-2">{{ $item['nama_anggota'] }}</h6>
              
              <!-- Tempat & Tanggal Lahir -->
              <p class="staff-nip text-muted small mb-2">
                <i class="fa-solid fa-cake-candles me-1 text-warning"></i> 
                {{ $item['tempat_lahir'] }}, {{ \Carbon\Carbon::parse($item['tanggal_lahir'])->translatedFormat('d F Y') }}
              </p>
              
              <!-- Indikator Klik Detail Pendidikan -->
              <div class="badge bg-light text-primary border small fw-normal py-1 px-2 my-2">
                <i class="fa-solid fa-graduation-cap me-1"></i> Lihat Riwayat Pendidikan
              </div>
            </div>
            
            <!-- Alamat -->
            <div class="staff-desc small mt-3 text-muted border-top pt-2 text-start">
              <i class="fa-solid fa-location-dot me-1 text-danger"></i> 
              <span>{{ $item['alamat'] ?? '-' }}</span>
            </div>

          </div>

        </div>
      </div>

      <!-- MODAL POPUP PERANGKAT NAGARI (FOTO FULL) -->
      <div class="modal fade" id="modalPendidikan{{ $index }}" tabindex="-1" aria-labelledby="modalLabel{{ $index }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content border-0 shadow">
            
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title fs-6 fw-bold" id="modalLabel{{ $index }}">
                <i class="fa-solid fa-id-card me-2"></i>Detail Perangkat Nagari
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
              
              <!-- Tampilan Foto Utuh / Full -->
              <div class="modal-full-img-wrapper mb-3">
                @if(!empty($item['foto']))
                  <img src="{{ env('API_STORAGE') . $item['foto'] }}" 
                       alt="Foto {{ $item['nama_anggota'] }}"
                       onerror="this.onerror=null; this.parentNode.innerHTML='<div class=\'text-center text-white py-5\'><i class=\'fa-solid fa-user fa-4x mb-2 d-block\'></i><span>Foto Tidak Tersedia</span></div>';">
                @else
                  <div class="text-center text-white py-5">
                    <i class="fa-solid fa-user fa-4x mb-2 d-block"></i>
                    <span>Foto Tidak Tersedia</span>
                  </div>
                @endif
              </div>

              <!-- Information Header -->
              <div class="text-center mb-3">
                <span class="badge bg-primary text-white mb-1 fs-6">{{ $item['jabatan'] }}</span>
                <h5 class="fw-bold text-dark mb-1">{{ $item['nama_anggota'] }}</h5>
                <p class="text-muted small mb-0">
                  <i class="fa-solid fa-cake-candles me-1 text-warning"></i> 
                  {{ $item['tempat_lahir'] }}, {{ \Carbon\Carbon::parse($item['tanggal_lahir'])->translatedFormat('d F Y') }}
                </p>
              </div>

              <hr class="my-3 opacity-25">

              <!-- Content Riwayat Pendidikan -->
              <h6 class="fw-bold text-dark mb-2">
                <i class="fa-solid fa-graduation-cap me-2 text-primary"></i>Riwayat Pendidikan
              </h6>
              <div class="modal-education-body text-dark bg-light p-3 rounded border">
                @if(!empty($item['riwayat_pendidikan']))
                  {!! $item['riwayat_pendidikan'] !!}
                @else
                  <p class="text-muted fst-italic mb-0">Tidak ada data riwayat pendidikan yang dicantumkan.</p>
                @endif
              </div>

            </div>

            <div class="modal-footer bg-light p-2">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>

          </div>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</main>

<!-- MODAL POPUP WALI NAGARI (FOTO FULL) -->
<div class="modal fade" id="modalPendidikanWali" tabindex="-1" aria-labelledby="modalLabelWali" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content border-0 shadow">
      
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title fs-6 fw-bold" id="modalLabelWali">
          <i class="fa-solid fa-id-card me-2"></i>Detail Wali Nagari
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-4">
        
        <!-- Tampilan Foto Utuh / Full Wali Nagari -->
        <div class="modal-full-img-wrapper mb-3">
          @if(!empty($data['walinagari']['gambar_walinagari']))
            <img src="{{ env('API_STORAGE') . $data['walinagari']['gambar_walinagari'] }}" 
                 alt="{{ $data['walinagari']['nama_walinagari'] }}"
                 onerror="this.onerror=null; this.parentNode.innerHTML='<div class=\'text-center text-white py-5\'><i class=\'fa-solid fa-user-tie fa-4x mb-2 d-block\'></i><span>Foto Tidak Tersedia</span></div>';">
          @else
            <div class="text-center text-white py-5">
              <i class="fa-solid fa-user-tie fa-4x mb-2 d-block"></i>
              <span>Foto Tidak Tersedia</span>
            </div>
          @endif
        </div>

        <!-- Information Header -->
        <div class="text-center mb-3">
          <span class="badge bg-danger text-white mb-1 fs-6">Wali Nagari</span>
          <h5 class="fw-bold text-dark mb-1">{{ $data['walinagari']['nama_walinagari'] }}</h5>
          <p class="text-muted small mb-0">
            <i class="fa-solid fa-graduation-cap me-1 text-primary"></i> Pendidikan Terakhir: <strong>{{ $data['walinagari']['pendidikan'] ?? '-' }}</strong>
          </p>
        </div>

        <hr class="my-3 opacity-25">

        <!-- Content Riwayat Pendidikan Wali Nagari -->
        <h6 class="fw-bold text-dark mb-2">
          <i class="fa-solid fa-graduation-cap me-2 text-danger"></i>Riwayat Pendidikan
        </h6>
        <div class="modal-education-body text-dark bg-light p-3 rounded border">
          @if(!empty($data['walinagari']['riwayat_pendidikan']))
            {!! $data['walinagari']['riwayat_pendidikan'] !!}
          @else
            <p class="text-muted fst-italic mb-0">Tidak ada data riwayat pendidikan yang dicantumkan.</p>
          @endif
        </div>

      </div>

      <div class="modal-footer bg-light p-2">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
@endsection