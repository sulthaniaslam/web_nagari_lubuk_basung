@extends('pages.layout')

@section('content')
<main class="tabel-data-wrapper">
    <div class="container">
      
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb custom-breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Daftar Informasi Publik</li>
        </ol>
      </nav>

      <div class="row justify-content-between align-items-center mb-4 g-3 text-center text-md-start">
        <div class="col-md-7 animate__animated animate__fadeInLeft">
          <span class="section-tag text-crimson">Transparansi Dokumentasi</span>
          <h1 class="section-title-pro mb-2">Daftar Informasi Publik</h1>
          <p class="section-subtitle-custom">Daftar keterbukaan data Informasi Publik.</p>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInRight">
          <div class="input-group search-table-box">
            <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
            {{-- Input Search multiguna (Judul / Tahun) --}}
            <input type="text" class="form-control border-start-0" id="searchDocument" placeholder="Cari nama dokumen / tahun / Kategori ...">
          </div>
        </div>
      </div>

      <div class="glass-card bento-card border-0 p-0 overflow-hidden animate__animated animate__fadeInUp">
        <div class="table-responsive">
          <table class="table custom-executive-table mb-0" id="rpjmTable">
            <thead>
              <tr>
                <th scope="col" class="text-center" style="width: 80px;">No</th>
                <th scope="col">Judul</th>
                <th scope="col" class="text-center" style="width: 150px;">Status</th>
                <th scope="col" class="text-center" style="width: 160px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @if (count($data) == 0)
                <tr id="noDataRow">
                    <td colspan="4" class="text-center py-4 text-muted">Data tidak ditemukan</td>
                </tr>
                @else
                  {{-- Baris Cadangan "Tidak Ditemukan" Jika Hasil Filter Kosong --}}
                  <tr id="noDataRow" style="display: none;">
                      <td colspan="4" class="text-center py-4 text-muted">Data atau tahun yang Anda cari tidak ditemukan</td>
                  </tr>
                @endif
                
                @foreach ($data['ppid_informasi_publik'] as $item)
                <tr class="data-row">
                    <td class="text-center fw-bold text-muted row-number">{{ $loop->iteration }}</td>
                    <td class="searchable-cell">
                        <span class="fw-bold text-darkblue d-block document-title">{{ $item['judul'] }}</span>
                        <span class="badge bg-light text-secondary border mt-1">
                          {{-- Ditambahkan class 'document-year' agar bisa dibaca JavaScript --}}
                          <i class="fa-regular fa-calendar-check me-1"></i> Tahun Periode: <span class="document-year">{{ $item['tahun'] }}</span>
                        </span>
                    </td>
                    <td class="text-center">
                        @if ($item['kategori'] == '1')
                        <span class="badge badge-green document-kategori"><i class="fa-solid fa-circle-check me-1"></i> INFORMASI BERKALA</span>
                        @endif
                        @if ($item['kategori'] == '2')
                        <span class="badge badge-blue document-kategori"><i class="fa-solid fa-circle-check me-1"></i> INFORMASI SERTA MERTA</span>
                        @endif
                        @if ($item['kategori'] == '3')
                        <span class="badge badge-crimson document-kategori"><i class="fa-solid fa-circle-check me-1"></i>  INFORMASI SETIAP SAAT</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                          @if(!empty($item['file']))
                            <button type="button" 
                              class="btn btn-sm btn-action-view btn-preview-trigger" 
                              data-bs-toggle="modal" 
                              data-bs-target="#pdfPreviewModal" 
                              data-url="{{ env('API_STORAGE') . $item['file'] }}" 
                              data-title="{{ $item['judul'] }}"
                              title="Pratinjau Dokumen">
                              <i class="fa-solid fa-eye"></i>
                            </button>
                            
                            <a href="{{ env('API_STORAGE') . $item['file'] }}" 
                              download="{{ $item['judul'] }}" 
                              class="btn btn-sm btn-action-download" 
                              title="Unduh Berkas PDF"
                              target="_blank">
                            <i class="fa-solid fa-download"></i>
                            </a>
                          @else
                            <button class="btn btn-sm btn-secondary opacity-50" disabled title="Berkas Tidak Tersedia">
                              <i class="fa-solid fa-file-circle-xmark"></i>
                            </button>
                          @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>

      {{-- Bagian Pagination & Info --}}
      <div class="row mt-4 align-items-center g-3 animate__animated animate__fadeInUp">
        <div class="col-md-6 text-center text-md-start">
          <p class="text-muted small mb-0" id="tableInfo">Menampilkan <span class="fw-bold text-darkblue">0</span> dari <span class="fw-bold text-darkblue">0</span> entri data.</p>
        </div>
        <div class="col-md-6 d-flex justify-content-center justify-content-md-end">
          <nav>
            <ul class="pagination custom-pagination gap-1 mb-0" id="paginationWrapper">
              </ul>
          </nav>
        </div>
      </div>

    </div>
</main>

<div class="modal fade" id="pdfPreviewModal" tabindex="-1" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content glass-card border-0" style="border-radius: 24px; overflow: hidden;">
      <div class="modal-header border-0 bg-light py-3 px-4 d-flex justify-content-between align-items-center">
        <div>
          <span class="badge text-uppercase bg-rgba-blue text-primary tracking-wider small mb-1">Document Viewer</span>
          <h5 class="modal-title fw-bold text-darkblue" id="pdfModalTitle">Nama Dokumen</h5>
        </div>
        <button type="button" class="btn-close btn-close-custom" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 bg-secondary-subtle">
        <div class="ratio ratio-16x9" style="min-height: 680px;">
          <iframe src="" id="pdfFrame" title="PDF Preview" allow="autoplay"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // 1. Fitur Preview PDF Modal
    const pdfModal = document.getElementById('pdfPreviewModal');
    const pdfFrame = document.getElementById('pdfFrame');
    const pdfModalTitle = document.getElementById('pdfModalTitle');

    if (pdfModal) {
      pdfModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const fileUrl = button.getAttribute('data-url');
        const documentTitle = button.getAttribute('data-title');
        pdfModalTitle.textContent = documentTitle;
        pdfFrame.setAttribute('src', fileUrl);
      });

      pdfModal.addEventListener('hidden.bs.modal', function () {
        pdfFrame.setAttribute('src', '');
      });
    }

    // 2. Logika Multi-Searching (Nama & Tahun) dan Pagination
    const searchInput = document.getElementById('searchDocument');
    const tableRows = document.querySelectorAll('.data-row');
    const noDataRow = document.getElementById('noDataRow');
    const paginationWrapper = document.getElementById('paginationWrapper');
    const tableInfo = document.getElementById('tableInfo');
    
    const rowsPerPage = 10; 
    let currentPage = 1;
    let filteredRows = Array.from(tableRows);

    function updateTableDisplay() {
      const totalFiltered = filteredRows.length;
      
      if (totalFiltered === 0) {
        if(noDataRow) noDataRow.style.display = '';
        tableRows.forEach(row => row.style.display = 'none');
        tableInfo.innerHTML = `Menampilkan <span class="fw-bold text-darkblue">0</span> entri data.`;
        paginationWrapper.innerHTML = '';
        return;
      }

      if(noDataRow) noDataRow.style.display = 'none';

      const totalPages = Math.ceil(totalFiltered / rowsPerPage);
      if (currentPage > totalPages) currentPage = totalPages || 1;
      
      const startIdx = (currentPage - 1) * rowsPerPage;
      const endIdx = startIdx + rowsPerPage;

      tableRows.forEach(row => row.style.display = 'none');
      
      filteredRows.forEach((row, index) => {
        if (index >= startIdx && index < endIdx) {
          row.style.display = '';
          const numCell = row.querySelector('.row-number');
          if(numCell) numCell.textContent = index + 1;
        }
      });

      const displayEnd = endIdx > totalFiltered ? totalFiltered : endIdx;
      tableInfo.innerHTML = `Menampilkan <span class="fw-bold text-darkblue">${totalFiltered === 0 ? 0 : startIdx + 1}-${displayEnd}</span> dari <span class="fw-bold text-darkblue">${totalFiltered}</span> entri data.`;

      renderPaginationButtons(totalPages);
    }

    function renderPaginationButtons(totalPages) {
      paginationWrapper.innerHTML = '';
      if (totalPages <= 1) return;

      const prevLi = document.createElement('li');
      prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
      prevLi.innerHTML = `<a class="page-link-circle" href="#" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></a>`;
      if (currentPage !== 1) {
        prevLi.addEventListener('click', (e) => { e.preventDefault(); currentPage--; updateTableDisplay(); });
      }
      paginationWrapper.appendChild(prevLi);

      for (let i = 1; i <= totalPages; i++) {
        const pageLi = document.createElement('li');
        pageLi.className = `page-item ${currentPage === i ? 'active' : ''}`;
        pageLi.innerHTML = `<a class="page-link-circle" href="#">${i}</a>`;
        pageLi.addEventListener('click', (e) => {
          e.preventDefault();
          currentPage = i;
          updateTableDisplay();
        });
        paginationWrapper.appendChild(pageLi);
      }

      const nextLi = document.createElement('li');
      nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
      nextLi.innerHTML = `<a class="page-link-circle" href="#" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></a>`;
      if (currentPage !== totalPages) {
        nextLi.addEventListener('click', (e) => { e.preventDefault(); currentPage++; updateTableDisplay(); });
      }
      paginationWrapper.appendChild(nextLi);
    }

    // GABUNGAN LOGIKA FILTER: BERDASARKAN JUDUL ATAU TAHUN
    if (searchInput) {
      searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase().trim();

        filteredRows = Array.from(tableRows).filter(row => {
          const docTitle = row.querySelector('.document-title').textContent.toLowerCase();
          const docYear = row.querySelector('.document-year').textContent.toLowerCase();
          const docKategori = row.querySelector('.document-kategori').textContent.toLowerCase();
          
          // Mengembalikan true jika kata kunci ada di dalam judul ATAU di dalam tahun
          return docTitle.includes(searchTerm) || docYear.includes(searchTerm) || docKategori.includes(searchTerm);
        });

        currentPage = 1; 
        updateTableDisplay();
      });
    }

    updateTableDisplay();
  });
</script>
@endsection