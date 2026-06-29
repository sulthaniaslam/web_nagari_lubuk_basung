@extends('pages.layout')

@section('content')
<main class="tabel-data-wrapper">
    <div class="container">
      
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb custom-breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Penerima Bantuan</li>
        </ol>
      </nav>

      <div class="row justify-content-between align-items-center mb-4 g-3 text-center text-md-start">
        <div class="col-md-7 animate__animated animate__fadeInLeft">
          <span class="section-tag text-crimson">Transparansi Anggaran</span>
          <h1 class="section-title-pro mb-2">Data Penerima Manfaat BLT</h1>
          <p class="section-subtitle-custom">Daftar keterbukaan publik penyaluran Bantuan Langsung Tunai Dana Desa (BLT-DD) tahun anggaran berjalan.</p>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInRight">
          <div class="input-group search-table-box">
            <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="form-control border-start-0" placeholder="Cari berdasarkan nama/jorong...">
          </div>
        </div>
      </div>

      <div class="glass-card bento-card border-0 p-0 overflow-hidden animate__animated animate__fadeInUp">
        <div class="table-responsive">
          <table class="table custom-executive-table mb-0">
            <thead>
              <tr>
                <th scope="col" class="text-center" style="width: 80px;">No</th>
                <th scope="col">Nama Kepala Keluarga</th>
                <th scope="col">Wilayah (Jorong)</th>
                <th scope="col" class="text-center">Jumlah Bantuan</th>
                <th scope="col" class="text-center">Status Salur</th>
                <th scope="col" class="text-center" style="width: 120px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center fw-bold text-muted">1</td>
                <td><span class="fw-bold text-darkblue">Ahmad Syafei</span></td>
                <td>Koto Tuo</td>
                <td class="text-center fw-semibold">Rp 300.000</td>
                <td class="text-center"><span class="badge badge-green">Sudah Diterima</span></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-action-view" title="Detail Warga"><i class="fa-solid fa-circle-info"></i></button>
                </td>
              </tr>
              <tr>
                <td class="text-center fw-bold text-muted">2</td>
                <td><span class="fw-bold text-darkblue">Siti Aminah</span></td>
                <td>Jorong Balai</td>
                <td class="text-center fw-semibold">Rp 300.000</td>
                <td class="text-center"><span class="badge badge-green">Sudah Diterima</span></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-action-view" title="Detail Warga"><i class="fa-solid fa-circle-info"></i></button>
                </td>
              </tr>
              <tr>
                <td class="text-center fw-bold text-muted">3</td>
                <td><span class="fw-bold text-darkblue">Zulkifli</span></td>
                <td>Gantiang</td>
                <td class="text-center fw-semibold">Rp 300.000</td>
                <td class="text-center"><span class="badge badge-gold">Sedang Proses</span></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-action-view" title="Detail Warga"><i class="fa-solid fa-circle-info"></i></button>
                </td>
              </tr>
              <tr>
                <td class="text-center fw-bold text-muted">4</td>
                <td><span class="fw-bold text-darkblue">Bambang Utomo</span></td>
                <td>Koto Tuo</td>
                <td class="text-center fw-semibold">Rp 300.000</td>
                <td class="text-center"><span class="badge badge-green">Sudah Diterima</span></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-action-view" title="Detail Warga"><i class="fa-solid fa-circle-info"></i></button>
                </td>
              </tr>
              <tr>
                <td class="text-center fw-bold text-muted">5</td>
                <td><span class="fw-bold text-darkblue">Maimunah</span></td>
                <td>Jorong Balai</td>
                <td class="text-center fw-semibold">Rp 300.000</td>
                <td class="text-center"><span class="badge badge-crimson">Ditangguhkan</span></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-action-view" title="Detail Warga"><i class="fa-solid fa-circle-info"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row mt-4 align-items-center g-3 animate__animated animate__fadeInUp">
        <div class="col-md-6 text-center text-md-start">
          <p class="text-muted small mb-0">Menampilkan <span class="fw-bold text-darkblue">1-5</span> dari <span class="fw-bold text-darkblue">48</span> entri data.</p>
        </div>
        <div class="col-md-6 d-flex justify-content-center justify-content-md-end">
          <nav>
            <ul class="pagination custom-pagination gap-1 mb-0">
              <li class="page-item disabled">
                <a class="page-link-circle" href="#" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></a>
              </li>
              <li class="page-item active"><a class="page-link-circle" href="#">1</a></li>
              <li class="page-item"><a class="page-link-circle" href="#">2</a></li>
              <li class="page-item"><a class="page-link-circle" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link-circle" href="#" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>

    </div>
</main>
@endsection