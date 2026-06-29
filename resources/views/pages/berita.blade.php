@extends('pages.layout')

@section('content')
<main class="tabel-data-wrapper py-5">
    <div class="container">
      
      <!-- Breadcrumb Navigasi -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb custom-breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Semua Berita</li>
        </ol>
      </nav>

      <!-- Header & Fitur Pencarian -->
      <div class="row justify-content-between align-items-center mb-5 g-3 text-center text-md-start">
        <div class="col-md-7 animate__animated animate__fadeInLeft">
          <span class="section-tag text-crimson">Arsip Informasi</span>
          <h1 class="section-title-pro mb-2">Semua Berita Nagari</h1>
          <p class="section-subtitle-custom">Eksplorasi seluruh dokumentasi kegiatan, pengumuman, dan kabar terkini.</p>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInRight">
          <div class="input-group search-table-box">
            <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
            {{-- Input Real-time Pencarian Berita --}}
            <input type="text" class="form-control border-start-0" id="searchNews" placeholder="Cari judul atau isi berita...">
          </div>
        </div>
      </div>

      <!-- State: Baris Peringatan Jika Berita Tidak Ditemukan -->
      <div class="row id="noNewsRow" style="display: none;">
        <div class="col-100 text-center py-5 text-muted">
          <i class="fa-regular fa-folder-open fa-3x mb-3 opacity-50"></i>
          <p class="fs-5 mb-0">Berita yang Anda cari tidak ditemukan.</p>
        </div>
      </div>

      <!-- Grid Wrapper Berita Keseluruhan -->
      <div class="row g-4" id="newsContainer">
        @foreach ($data['berita'] as $item)
          @php
            // Logika fallback variasi tema jika gambar kosong
            $categories = ['Kegiatan', 'Pengumuman', 'PPID', 'PKK'];
            $randomCategory = $categories[$loop->index % count($categories)];
            
            $themes = [
              'Kegiatan' => ['badge' => 'badge-blue', 'icon' => 'fa-newspaper'],
              'Pengumuman' => ['badge' => 'badge-gold', 'icon' => 'fa-bullhorn'],
              'PPID' => ['badge' => 'badge-crimson', 'icon' => 'fa-circle-info'],
              'PKK' => ['badge' => 'badge-green', 'icon' => 'fa-hands-holding-child']
            ];
            $currentTheme = $themes[$randomCategory];
          @endphp

          <!-- Item Card Berita -->
          <div class="col-md-6 col-lg-4 news-card-item animate__animated animate__fadeInUp">
            <div class="card pro-card card-blue border-0 overflow-hidden h-100 shadow-sm d-flex flex-column justify-content-between">
              
              <div>
                <!-- Bagian Gambar / Icon Cover -->
                <div class="pro-card-img-wrapper" style="position: relative; height: 210px; overflow: hidden; background-color: #f1f5f9;">
                  @if(!empty($item['gambar_berita']))
                    <img src="{{ env('API_STORAGE') . $item['gambar_berita'] }}" alt="{{ $item['judul_berita'] }}" class="w-100 h-100 object-fit-cover transition-img">
                  @else
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                      <i class="fa-solid {{ $currentTheme['icon'] }} fa-3x text-secondary opacity-25"></i>
                    </div>
                  @endif
                  <span class="news-badge {{ $currentTheme['badge'] }}">{{ $randomCategory }}</span>
                </div>

                <!-- Bagian Konten Teks -->
                <div class="pro-card-body p-4">
                  <div class="pro-card-meta mb-2 small text-muted">
                    <span class="text-gold me-2">
                      <i class="fa-regular fa-calendar-days me-1"></i> 
                      {{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d M Y') }}
                    </span>
                    <span><i class="fa-regular fa-clock ms-1 me-1"></i> 4 mnt baca</span>
                  </div>
                  
                  <h5 class="pro-card-title fw-bold text-darkblue mb-2 news-title">
                    <a href="{{ url('berita-detail/'.$item['slug']) }}" class="text-decoration-none text-darkblue text-line-clamp-2">{{ $item['judul_berita'] }}</a>
                  </h5>
                  
                  {{-- Target Content Selector untuk Search Filter --}}
                  <p class="pro-card-text text-secondary small news-content mb-0">
                    {!! Str::substr(strip_tags($item['isi_berita']), 0, 130) !!}...
                  </p>
                </div>
              </div>

              <!-- Bagian Footer Card -->
              <div class="pro-card-footer px-4 pb-4 pt-0 border-0 bg-transparent">
                <hr class="mt-0 mb-3 opacity-25">
                <a href="{{ url('berita-detail/'.$item['slug']) }}" class="read-more-btn btn-blue-link fw-bold text-decoration-none small">
                  Baca Selengkapnya <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
              </div>

            </div>
          </div>
        @endforeach
      </div>

      <!-- Sistem Navigasi Pagination Dinamis -->
      <div class="row mt-5 align-items-center g-3">
        <div class="col-md-6 text-center text-md-start">
          <p class="text-muted small mb-0" id="paginationInfo">Menampilkan <span class="fw-bold text-darkblue">0-0</span> dari <span class="fw-bold text-darkblue">0</span> berita.</p>
        </div>
        <div class="col-md-6 d-flex justify-content-center justify-content-md-end">
          <nav>
            <ul class="pagination custom-pagination gap-1 mb-0" id="paginationControl">
              <!-- Rendered by JS Engine -->
            </ul>
          </nav>
        </div>
      </div>

    </div>
</main>

<!-- ==========================================================================
   ENGINE UTAMA: REALTIME ARCHIVE FILTER & PAGINATION
   ========================================================================== -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchNews');
    const newsItems = document.querySelectorAll('.news-card-item');
    const noNewsRow = document.getElementById('noNewsRow');
    const paginationControl = document.getElementById('paginationControl');
    const paginationInfo = document.getElementById('paginationInfo');

    const cardsPerPage = 6; // Atur jumlah berita per halaman di sini
    let currentPage = 1;
    let filteredItems = Array.from(newsItems);

    function displayNewsGrid() {
      const totalFiltered = filteredItems.length;

      // Kondisi jika hasil pencarian nihil
      if (totalFiltered === 0) {
        if(noNewsRow) noNewsRow.style.display = 'block';
        newsItems.forEach(card => card.style.display = 'none');
        paginationInfo.innerHTML = `Menampilkan <span class="fw-bold text-darkblue">0</span> berita.`;
        paginationControl.innerHTML = '';
        return;
      }

      if(noNewsRow) noNewsRow.style.display = 'none';

      const totalPages = Math.ceil(totalFiltered / cardsPerPage);
      if (currentPage > totalPages) currentPage = totalPages || 1;

      const startIdx = (currentPage - 1) * cardsPerPage;
      const endIdx = startIdx + cardsPerPage;

      // Reset visibility grid item
      newsItems.forEach(card => card.style.display = 'none');

      filteredItems.forEach((card, index) => {
        if (index >= startIdx && index < endIdx) {
          card.style.display = 'block';
        }
      });

      // Update Teks Info Pagination
      const calculatedEnd = endIdx > totalFiltered ? totalFiltered : endIdx;
      paginationInfo.innerHTML = `Menampilkan <span class="fw-bold text-darkblue">${totalFiltered === 0 ? 0 : startIdx + 1}-${calculatedEnd}</span> dari <span class="fw-bold text-darkblue">${totalFiltered}</span> berita.`;

      buildPaginationButtons(totalPages);
    }

    function buildPaginationButtons(totalPages) {
      paginationControl.innerHTML = '';
      if (totalPages <= 1) return;

      // Tombol Prev
      const prevLi = document.createElement('li');
      prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
      prevLi.innerHTML = `<a class="page-link-circle" href="#" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></a>`;
      if (currentPage !== 1) {
        prevLi.addEventListener('click', (e) => { e.preventDefault(); currentPage--; displayNewsGrid(); });
      }
      paginationControl.appendChild(prevLi);

      // Tombol Angka Halaman
      for (let i = 1; i <= totalPages; i++) {
        const pageLi = document.createElement('li');
        pageLi.className = `page-item ${currentPage === i ? 'active' : ''}`;
        pageLi.innerHTML = `<a class="page-link-circle" href="#">${i}</a>`;
        pageLi.addEventListener('click', (e) => {
          e.preventDefault();
          currentPage = i;
          displayNewsGrid();
        });
        paginationControl.appendChild(pageLi);
      }

      // Tombol Next
      const nextLi = document.createElement('li');
      nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
      nextLi.innerHTML = `<a class="page-link-circle" href="#" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></a>`;
      if (currentPage !== totalPages) {
        nextLi.addEventListener('click', (e) => { e.preventDefault(); currentPage++; displayNewsGrid(); });
      }
      paginationControl.appendChild(nextLi);
    }

    // Listener Ketikan Kotak Pencarian
    if (searchInput) {
      searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();

        filteredItems = Array.from(newsItems).filter(card => {
          const title = card.querySelector('.news-title').textContent.toLowerCase();
          const content = card.querySelector('.news-content').textContent.toLowerCase();
          return title.includes(query) || content.includes(query);
        });

        currentPage = 1; // Balik ke page 1 tiap nyari berkas baru
        displayNewsGrid();
      });
    }

    // Jalankan sistem kalkulasi pertama kali
    displayNewsGrid();
  });
</script>
@endsection