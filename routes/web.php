<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// ===================== Menu Nagari
Route::get('/visimisi', [HomeController::class, 'visimisi']);
Route::get('/struktur_nagari', [HomeController::class, 'strukturNagari']);
Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/berita-detail/{slug}', [HomeController::class, 'beritaDetail']);
Route::get('/pesona_wisata/{id}', [HomeController::class, 'pesonaWisata']);
Route::get('/perangkat-nagari', [HomeController::class, 'perangkatNagari']);
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/produk_hukum', [HomeController::class, 'produkHukum']);
Route::get('/maklumat_pelayanan', [HomeController::class, 'maklumatPelayanan']);
Route::get('rpjm', [HomeController::class, 'rpjm']);
Route::get('durkp', [HomeController::class, 'durkp']);
Route::get('lppn', [HomeController::class, 'lppn']);
Route::get('apbn', [HomeController::class, 'apbn']);
Route::get('lkppn', [HomeController::class, 'lkppn']);
Route::get('lpj', [HomeController::class, 'lpj']);
Route::post('aspirasi', function (){
    return redirect('/')->with('message', 'Mohon maaf 🙏 fitur ini masih dalam pengembangan');
});
// ===================== End Menu Nagari

// ===================== Menu PPID Nagari
Route::get('ppid_nagari', [HomeController::class, 'ppidNagari']);
Route::get('ppid_informasi_publik', [HomeController::class, 'ppidInformasiPublik']);
Route::get('ppid_permohonan_informasi', [HomeController::class, 'ppidPermohonanInformasi']);
Route::post('ppid_permohonan_informasi/send', [HomeController::class, 'ppidPermohonanInformasiSend']);
Route::get('ppid_cek_permohonan_informasi', [HomeController::class, 'ppidCekPermohonanInformasi']);
Route::post('ppid_permohonan_informasi/check', [HomeController::class, 'ppidPermohonanInformasiCheck']);
Route::get('ppid_pengajuan_keberatan', [HomeController::class, 'ppidPengajuanKeberatan']);
Route::post('ppid_pengajuan_keberatan/send', [HomeController::class, 'ppidPengajuanKeberatanSend']);
Route::get('ppid_cek_pengajuan_keberatan', [HomeController::class, 'ppidCekPengajuanKeberatan']);
Route::post('ppid_pengajuan_keberatan/check', [HomeController::class, 'ppidPengajuanKeberatanCheck']);
Route::get('ppid_alur_pelayanan', [HomeController::class, 'ppidAlurPelayanan']);
// ===================== End Menu PPID Nagari


// ===================== Menu PKK Nagari
Route::get('/profil_pkk', [HomeController::class, 'profilPKK']);
Route::get('/pkk_program_kerja', [HomeController::class, 'pkkProgramKerja']);
Route::get('/pkk_kegiatan', [HomeController::class, 'pkkKegiatan']);
Route::get('/pkk_pengurus', [HomeController::class, 'pkkPengurus']);
// ===================== End Menu PKK Nagari






Route::fallback(function () {
    return response()->view('notfound', [], 404);
});