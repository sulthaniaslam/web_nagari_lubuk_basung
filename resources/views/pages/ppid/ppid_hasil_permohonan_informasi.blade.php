@extends('pages.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    :root {
        --primary-color: #2563eb;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --bg-gradient: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        --text-dark: #0f172a;
    }

    .detail-page-bg {
        background: var(--bg-gradient);
        min-height: 90vh;
    }

    .modern-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 24px;
        box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.08);
    }

    /* Badge Status Custom */
    .badge-status {
        padding: 8px 16px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .status-1 { background-color: rgba(245, 158, 11, 0.1); color: var(--warning-color); }
    .status-2 { background-color: rgba(37, 99, 211, 0.1); color: var(--primary-color); }
    .status-3 { background-color: rgba(16, 185, 129, 0.1); color: var(--success-color); }
    .status-0 { background-color: rgba(239, 68, 68, 0.1); color: var(--danger-color); }

    /* Timeline Tracker */
    .timeline-steps {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        margin: 30px 0;
    }
    .timeline-steps::before {
        content: "";
        position: absolute;
        top: 20px;
        left: 0;
        width: 100%;
        height: 4px;
        background-color: #e2e8f0;
        z-index: 1;
    }
    .timeline-step {
        text-align: center;
        position: relative;
        z-index: 2;
        flex: 1;
    }
    .timeline-icon {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background-color: #cbd5e1;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px auto;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: 4px solid #fff;
    }
    .timeline-step.active .timeline-icon {
        background-color: var(--warning-color);
        box-shadow: 0 0 0 6px rgba(245, 158, 11, 0.2);
    }
    .timeline-step.completed .timeline-icon {
        background-color: var(--success-color);
    }
    .timeline-label {
        font-size: 0.8rem;
        font-weight: 700;
        color: #64748b;
    }
    .timeline-step.active .timeline-label,
    .timeline-step.completed .timeline-label {
        color: var(--text-dark);
    }

    .data-row {
        padding: 12px 0;
        border-bottom: 1px dashed #e2e8f0;
    }
    .data-row:last-child { border-bottom: none; }
</style>

<main class="detail-page-bg py-5">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="card modern-card p-4 p-md-5 border-0 animate__animated animate__fadeIn">
                    
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                        <a href="{{ url('ppid_cek_permohonan_informasi') }}" class="btn btn-light rounded-pill px-3 py-2 btn-sm fw-semibold text-secondary">
                            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Pencarian
                        </a>
                        
                        @if($result['status'] == 1)
                            <span class="badge-status status-1"><i class="fa-solid fa-clock-rotate-left"></i> Dalam Proses Pengecekan</span>
                        @elseif($result['status'] == 2)
                            <span class="badge-status status-2"><i class="fa-solid fa-spinner fa-spin"></i> Sedang Diproses Petugas</span>
                        @elseif($result['status'] == 3)
                            <span class="badge-status status-3"><i class="fa-solid fa-circle-check"></i> Selesai / Dikabulkan</span>
                        @else
                            <span class="badge-status status-0"><i class="fa-solid fa-circle-xmark"></i> Permohonan Ditolak</span>
                        @endif
                    </div>

                    <div class="bg-light p-4 rounded-4 mb-5 border">
                        <div class="row align-items-center text-center text-sm-start">
                            <div class="col-sm-8">
                                <span class="text-muted small fw-bold">NOMOR REGISTRASI</span>
                                <h2 class="fw-extrabold text-primary m-0 tracking-wide" style="font-weight: 800;">{{ $result['kode_registrasi'] }}</h2>
                            </div>
                            <div class="col-sm-4 text-sm-end mt-3 mt-sm-0">
                                <span class="text-muted small d-block fw-bold">TANGGAL PENGAJUAN</span>
                                <span class="fw-bold text-dark">{{ date('d F Y', strtotime($result['tanggal'])) }}</span>
                            </div>
                        </div>
                    </div>

                    <h5 class="fw-bold mb-4 text-darkblue"><i class="fa-solid fa-route me-2 text-primary"></i>Status Alur Berkas</h5>
                    <div class="timeline-steps mb-5 px-3">
                        <div class="timeline-step completed">
                            <div class="timeline-icon"><i class="fa-solid fa-paper-plane"></i></div>
                            <div class="timeline-label">Diajukan</div>
                        </div>
                        
                        <div class="timeline-step {{ $result['status'] == 1 ? 'active' : ($result['status'] > 1 ? 'completed' : '') }}">
                            <div class="timeline-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                            <div class="timeline-label">Pengecekan</div>
                        </div>

                        <div class="timeline-step {{ $result['status'] == 2 ? 'active' : ($result['status'] > 2 ? 'completed' : '') }}">
                            <div class="timeline-icon"><i class="fa-solid fa-gears"></i></div>
                            <div class="timeline-label">Diproses</div>
                        </div>

                        <div class="timeline-step {{ $result['status'] == 3 ? 'completed' : '' }}">
                            <div class="timeline-icon"><i class="fa-solid fa-flag-checkered"></i></div>
                            <div class="timeline-label">Selesai</div>
                        </div>
                    </div>

                    <div class="alert alert-warning border-0 rounded-4 p-4 mb-5 shadow-sm bg-opacity-10 bg-warning">
                        <h6 class="fw-bold text-warning-dark mb-2"><i class="fa-solid fa-comment-dots me-2"></i>Catatan / Tindak Lanjut Petugas:</h6>
                        <p class="m-0 text-dark fw-medium" style="line-height: 1.6;">"{{ $result['catatan'] }}"</p>
                    </div>

                    <h5 class="fw-bold mb-3 text-darkblue"><i class="fa-solid fa-folder-open me-2 text-primary"></i>Rincian Informasi yang Diajukan</h5>
                    <div class="card border rounded-4 p-3 bg-light">
                        <div class="data-row row">
                            <div class="col-sm-4 text-muted fw-semibold small">Nama Pemohon</div>
                            <div class="col-sm-8 fw-bold text-dark">{{ $result['nama'] }}</div>
                        </div>
                        <div class="data-row row">
                            <div class="col-sm-4 text-muted fw-semibold small">Kategori Pemohon</div>
                            <div class="col-sm-8 fw-bold text-dark text-uppercase"><span class="badge bg-secondary rounded-pill px-2.5 py-1">{{ $result['kategori'] }}</span></div>
                        </div>
                        <div class="data-row row">
                            <div class="col-sm-4 text-muted fw-semibold small">Deskripsi Permohonan</div>
                            <div class="col-sm-8 text-secondary fw-medium">{{ $result['rincian'] }}</div>
                        </div>
                        <div class="data-row row">
                            <div class="col-sm-4 text-muted fw-semibold small">Dokumen / File Jawaban</div>
                            <div class="col-sm-8">
                                @if(!empty($result['file']))
                                    <a href="{{ $result['file'] }}" class="btn btn-success btn-sm rounded-pill px-3 fw-bold shadow-sm" target="_blank">
                                        <i class="fa-solid fa-cloud-arrow-down me-1"></i> Unduh Berkas Informasi
                                    </a>
                                @else
                                    <span class="text-muted small fst-italic"><i class="fa-solid fa-ban me-1"></i> Belum ada file berkas lampiran resmi tersedia</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</main>
@endsection