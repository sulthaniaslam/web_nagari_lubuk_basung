@extends('pages.layout')

@section('content')
<main class="preview-page-wrapper py-5" style="background: #f1f5f9; min-height: 100vh;">
  <div class="container">
    
    <!-- Header Asli (Sesuai Versi Awal) -->
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb custom-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Desa Cantik</li>
      </ol>
    </nav>

    <div class="row mb-5 text-center justify-content-center">
      <div class="col-lg-8 animate__animated animate__fadeIn">
        <span class="section-tag text-emerald">PROGRAM BPS & NAGARI</span>
        <h1 class="section-title-pro mb-2">Desa Cantik (Desa Cinta Statistik)</h1>
        <p class="text-muted">Penyediaan data statistik sektoral Nagari yang akurat, transparan, dan terintegrasi untuk perencanaan pembangunan berkelanjutan.</p>
      </div>
    </div>

    <!-- 1. STATISTIK UTAMA (UPGRADED: GRADIENT CARDS) -->
    <div class="row g-3 mb-5">
      <div class="col-xl-3 col-md-6">
        <div class="card stat-card border-0 shadow-sm rounded-4 h-100 p-3">
          <div class="d-flex align-items-center">
            <div class="stat-icon-wrapper bg-gradient-blue text-white rounded-4 p-3 me-3">
              <i class="fa-solid fa-users fa-xl"></i>
            </div>
            <div>
              <span class="text-muted fs-7 fw-semibold text-uppercase tracking-wider">Total Penduduk</span>
              <h3 class="fw-bold text-dark mb-0 mt-1">5,420 <small class="fs-7 text-muted fw-normal">Jiwa</small></h3>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card stat-card border-0 shadow-sm rounded-4 h-100 p-3">
          <div class="d-flex align-items-center">
            <div class="stat-icon-wrapper bg-gradient-emerald text-white rounded-4 p-3 me-3">
              <i class="fa-solid fa-house-user fa-xl"></i>
            </div>
            <div>
              <span class="text-muted fs-7 fw-semibold text-uppercase tracking-wider">Kepala Keluarga</span>
              <h3 class="fw-bold text-dark mb-0 mt-1">1,385 <small class="fs-7 text-muted fw-normal">KK</small></h3>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card stat-card border-0 shadow-sm rounded-4 h-100 p-3">
          <div class="d-flex align-items-center">
            <div class="stat-icon-wrapper bg-gradient-amber text-white rounded-4 p-3 me-3">
              <i class="fa-solid fa-person-running fa-xl"></i>
            </div>
            <div>
              <span class="text-muted fs-7 fw-semibold text-uppercase tracking-wider">Usia Produktif</span>
              <h3 class="fw-bold text-dark mb-0 mt-1">3,650 <small class="fs-7 text-muted fw-normal">(15-64Th)</small></h3>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card stat-card border-0 shadow-sm rounded-4 h-100 p-3">
          <div class="d-flex align-items-center">
            <div class="stat-icon-wrapper bg-gradient-indigo text-white rounded-4 p-3 me-3">
              <i class="fa-solid fa-map-location-dot fa-xl"></i>
            </div>
            <div>
              <span class="text-muted fs-7 fw-semibold text-uppercase tracking-wider">Wilayah Jorong</span>
              <h3 class="fw-bold text-dark mb-0 mt-1">5 <small class="fs-7 text-muted fw-normal">Wilayah</small></h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 2. SECTION GRAFIK UTAMA (GENDER & USIA) -->
    <div class="row g-4 mb-4">
      <!-- Gender Chart -->
      <div class="col-lg-5">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
          <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
            <div>
              <h5 class="fw-bold text-dark mb-1"><i class="fa-solid fa-venus-mars text-emerald me-2"></i>Komposisi Gender</h5>
              <p class="text-muted fs-7 mb-0">Rasio Jenis Kelamin Penduduk</p>
            </div>
            <span class="badge bg-light text-secondary border rounded-pill px-3 py-2 fs-7">2026</span>
          </div>
          
          <div class="chart-box my-auto position-relative" style="min-height: 220px;">
            <canvas id="genderChart"></canvas>
          </div>

          <div class="row g-2 text-center mt-3 pt-3 border-top">
            <div class="col-6">
              <div class="p-2 rounded-3 bg-light">
                <span class="text-muted fs-7 d-block">Laki-Laki</span>
                <span class="fw-bold text-primary fs-6">2,740 Jiwa (50.5%)</span>
              </div>
            </div>
            <div class="col-6">
              <div class="p-2 rounded-3 bg-light">
                <span class="text-muted fs-7 d-block">Perempuan</span>
                <span class="fw-bold text-danger fs-6">2,680 Jiwa (49.5%)</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Age Distribution Chart -->
      <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
          <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
            <div>
              <h5 class="fw-bold text-dark mb-1"><i class="fa-solid fa-chart-column text-emerald me-2"></i>Demografi Kelompok Usia</h5>
              <p class="text-muted fs-7 mb-0">Distribusikan Berdasarkan Rentang Usia (Tahun)</p>
            </div>
          </div>
          <div class="chart-box">
            <canvas id="ageChart" style="max-height: 280px;"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- 3. SECTION GRAFIK SEKUNDER (PENDIDIKAN & PEKERJAAN) -->
    <div class="row g-4 mb-5">
      <!-- Pendidikan -->
      <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
          <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
            <div>
              <h5 class="fw-bold text-dark mb-1"><i class="fa-solid fa-graduation-cap text-emerald me-2"></i>Tingkat Pendidikan</h5>
              <p class="text-muted fs-7 mb-0">Pendidikan Terakhir yang Ditempuh</p>
            </div>
          </div>
          <div class="chart-box">
            <canvas id="educationChart" style="max-height: 280px;"></canvas>
          </div>
        </div>
      </div>

      <!-- Pekerjaan -->
      <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
          <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
            <div>
              <h5 class="fw-bold text-dark mb-1"><i class="fa-solid fa-briefcase text-emerald me-2"></i>Mata Pencaharian Utama</h5>
              <p class="text-muted fs-7 mb-0">Sebaran Sektor Pekerjaan Penduduk</p>
            </div>
          </div>
          <div class="chart-box">
            <canvas id="jobChart" style="max-height: 280px;"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- 4. TABEL DISTRIBUSI WILAYAH JORONG -->
    <div class="row">
      <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 p-4">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
              <h5 class="fw-bold text-dark mb-1"><i class="fa-solid fa-table-list text-emerald me-2"></i>Rincian Demografi Per Jorong</h5>
              <p class="text-muted fs-7 mb-0">Data Sebaran Penduduk Berdasarkan Wilayah Administratif Nagari</p>
            </div>
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3" onclick="window.print()">
              <i class="fa-solid fa-print me-1"></i> Cetak Laporan
            </button>
          </div>

          <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0">
              <thead class="bg-light text-secondary fs-7 text-uppercase fw-semibold">
                <tr>
                  <th scope="col" class="py-3 px-4 text-center">No</th>
                  <th scope="col" class="py-3">Nama Jorong</th>
                  <th scope="col" class="py-3 text-center">Jumlah KK</th>
                  <th scope="col" class="py-3 text-center">Laki-Laki</th>
                  <th scope="col" class="py-3 text-center">Perempuan</th>
                  <th scope="col" class="py-3 text-center">Total Penduduk</th>
                  <th scope="col" class="py-3 text-center">Persentase</th>
                </tr>
              </thead>
              <tbody class="fs-6">
                <tr>
                  <td class="text-center text-muted fw-semibold px-4">01</td>
                  <td class="fw-bold text-dark">Jorong Pasar Nagari</td>
                  <td class="text-center">310</td>
                  <td class="text-center text-primary fw-medium">610</td>
                  <td class="text-center text-danger fw-medium">590</td>
                  <td class="text-center fw-bold text-dark">1,200</td>
                  <td class="text-center">
                    <span class="badge bg-emerald-soft text-emerald rounded-pill px-3 py-1 fs-7">22.1%</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold px-4">02</td>
                  <td class="fw-bold text-dark">Jorong Koto Tinggi</td>
                  <td class="text-center">285</td>
                  <td class="text-center text-primary fw-medium">570</td>
                  <td class="text-center text-danger fw-medium">550</td>
                  <td class="text-center fw-bold text-dark">1,120</td>
                  <td class="text-center">
                    <span class="badge bg-emerald-soft text-emerald rounded-pill px-3 py-1 fs-7">20.6%</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold px-4">03</td>
                  <td class="fw-bold text-dark">Jorong Bukit Berangin</td>
                  <td class="text-center">250</td>
                  <td class="text-center text-primary fw-medium">490</td>
                  <td class="text-center text-danger fw-medium">480</td>
                  <td class="text-center fw-bold text-dark">970</td>
                  <td class="text-center">
                    <span class="badge bg-emerald-soft text-emerald rounded-pill px-3 py-1 fs-7">17.8%</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold px-4">04</td>
                  <td class="fw-bold text-dark">Jorong Rimbo Data</td>
                  <td class="text-center">290</td>
                  <td class="text-center text-primary fw-medium">580</td>
                  <td class="text-center text-danger fw-medium">570</td>
                  <td class="text-center fw-bold text-dark">1,150</td>
                  <td class="text-center">
                    <span class="badge bg-emerald-soft text-emerald rounded-pill px-3 py-1 fs-7">21.2%</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold px-4">05</td>
                  <td class="fw-bold text-dark">Jorong Sungai Jernih</td>
                  <td class="text-center">250</td>
                  <td class="text-center text-primary fw-medium">490</td>
                  <td class="text-center text-danger fw-medium">490</td>
                  <td class="text-center fw-bold text-dark">980</td>
                  <td class="text-center">
                    <span class="badge bg-emerald-soft text-emerald rounded-pill px-3 py-1 fs-7">18.1%</span>
                  </td>
                </tr>
              </tbody>
              <tfoot class="bg-light fw-bold fs-6">
                <tr>
                  <td colspan="2" class="text-center py-3">Total Keseluruhan</td>
                  <td class="text-center py-3">1,385</td>
                  <td class="text-center py-3 text-primary">2,740</td>
                  <td class="text-center py-3 text-danger">2,680</td>
                  <td class="text-center py-3 text-dark fs-5">5,420</td>
                  <td class="text-center py-3">100%</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Kustomisasi Global Font Chart.js
    Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
    Chart.defaults.color = "#64748b";

    // 1. Chart Jenis Kelamin (Doughnut)
    new Chart(document.getElementById('genderChart'), {
      type: 'doughnut',
      data: {
        labels: ['Laki-Laki', 'Perempuan'],
        datasets: [{
          data: [2740, 2680],
          backgroundColor: ['#2563eb', '#ec4899'],
          borderWidth: 4,
          borderColor: '#ffffff',
          hoverOffset: 6
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '72%',
        plugins: {
          legend: { position: 'bottom', labels: { padding: 20, usePointStyle: true } }
        }
      }
    });

    // 2. Chart Kelompok Usia (Bar Rounded)
    new Chart(document.getElementById('ageChart'), {
      type: 'bar',
      data: {
        labels: ['0-5 Th', '6-12 Th', '13-17 Th', '18-35 Th', '36-59 Th', '60+ Th'],
        datasets: [{
          label: 'Jumlah Jiwa',
          data: [420, 680, 510, 1820, 1340, 650],
          backgroundColor: '#059669',
          borderRadius: 8,
          barThickness: 28
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          y: { grid: { borderDash: [4, 4] }, beginAtZero: true },
          x: { grid: { display: false } }
        }
      }
    });

    // 3. Chart Pendidikan (Bar Horizontal)
    new Chart(document.getElementById('educationChart'), {
      type: 'bar',
      data: {
        labels: ['Belum Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'Sarjana/Dipl.'],
        datasets: [{
          label: 'Jumlah Jiwa',
          data: [520, 1450, 1200, 1650, 600],
          backgroundColor: '#0284c7',
          borderRadius: 6,
          barThickness: 20
        }]
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { borderDash: [4, 4] }, beginAtZero: true },
          y: { grid: { display: false } }
        }
      }
    });

    // 4. Chart Pekerjaan (Pie)
    new Chart(document.getElementById('jobChart'), {
      type: 'pie',
      data: {
        labels: ['Petani/Pekebun', 'Pedagang', 'PNS/TNI/Polri', 'Swasta', 'Wiraswasta', 'Lainnya'],
        datasets: [{
          data: [1850, 720, 310, 840, 650, 1050],
          backgroundColor: ['#10b981', '#f59e0b', '#6366f1', '#06b6d4', '#ec4899', '#64748b'],
          borderWidth: 2,
          borderColor: '#ffffff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { position: 'right', labels: { padding: 15, usePointStyle: true } }
        }
      }
    });
  });
</script>

<style>
  .text-emerald {
    color: #059669;
    font-weight: 700;
    letter-spacing: 1px;
    font-size: 0.85rem;
  }
  .bg-emerald-soft { background-color: #d1fae5; }

  /* Gradient Icon Wrappers */
  .bg-gradient-blue { background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); }
  .bg-gradient-emerald { background: linear-gradient(135deg, #059669 0%, #047857 100%); }
  .bg-gradient-amber { background: linear-gradient(135deg, #d97706 0%, #b45309 100%); }
  .bg-gradient-indigo { background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); }

  /* Card Elevasi & Transition */
  .stat-card {
    transition: all 0.3s ease;
  }
  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08) !important;
  }

  .stat-icon-wrapper {
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
  }

  /* Utility font & spacing */
  .fs-7 { font-size: 0.8rem; }
  .tracking-wider { letter-spacing: 0.05em; }
</style>
@endsection