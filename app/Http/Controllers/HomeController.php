<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Helper untuk mengambil data dari file JSON.
     * Mengembalikan data array jika sukses, atau memicu pembatalan (abort) jika gagal.
     *
     * @return array|\Illuminate\Http\JsonResponse
     */
    private function getNagariData()
    {
        $fileName = 'data_nagari.json';

        if (!Storage::disk('local')->exists($fileName)) {
            // Menggunakan abort untuk menghentikan eksekusi dan memunculkan error 404
            abort(404, 'File JSON tidak ditemukan.');
        }

        $jsonContent = Storage::disk('local')->get($fileName);
        return json_decode($jsonContent, true);
    }

    public function index()
    {
        $data = $this->getNagariData();
        return view('pages.homepage', ['data' => $data]);
    }

    public function visimisi()
    {
        $data = $this->getNagariData();
        return view('pages.visimisi', ['data' => $data]);
    }
    
    public function strukturNagari()
    {
        $data = $this->getNagariData();
        return view('pages.struktur_nagari', ['data' => $data]);
    }

    public function berita()
    {
        $data = $this->getNagariData();
        return view('pages.berita', ['data' => $data]);
    }

    public function beritaDetail($slug)
    {
        $data = $this->getNagariData();
        
        // Cari berita yang memiliki slug sesuai parameter url
        $beritaSpesifik = collect($data['berita'])->firstWhere('slug', $slug);

        // Jika slug tidak ditemukan di file JSON, lempar ke halaman 404
        if (!$beritaSpesifik) {
            abort(404, 'Berita tidak ditemukan.');
        }

        return view('pages.berita_detail', [
            'berita' => $beritaSpesifik, // Mengirim data berita yang diklik
            'data'   => $data            // Tetap dikirim untuk bagian "Berita Lainnya" di bawah
        ]);
    }

    public function pesonaWisata($kategori_id)
    {
        $data = $this->getNagariData();
        
        // Gunakan filter() atau where() untuk mengambil SEMUA wisata di kategori tersebut
        $pesonaWisataFiltered = collect($data['pesona_wisata'])->where('kategori_pesona_wisata_id', $kategori_id);

        // Jika tidak ada satu pun wisata di kategori ini, bisa lempar 404 atau biarkan kosong
        if ($pesonaWisataFiltered->isEmpty()) {
            abort(404, 'Kategori wisata tidak ditemukan atau masih kosong.');
        }

        // Ambil info nama kategori untuk judul halaman (opsional namun bagus untuk UX)
        $kategoriInfo = $pesonaWisataFiltered->first()['kategori_pesona_wisata']['nama'] ?? 'Wisata Nagari';
        // dd($pesonaWisataFiltered);
        return view('pages.pesona_wisata', [
            'pesona_wisata' => $pesonaWisataFiltered, // Mengirim koleksi data yang sudah difilter
            'nama_kategori' => $kategoriInfo,
            'data'          => $data 
        ]);
    }

    public function perangkatNagari()
    {
        $data = $this->getNagariData();
        return view('pages.perangkat_nagari', ['data' => $data]);
    }
    
    public function galeri()
    {
        $data = $this->getNagariData();
        return view('pages.galeri', ['data' => $data]);
    }
    
    public function table()
    {
        // Method ini tetap bersih karena tidak membutuhkan data JSON
        return view('pages.table');
    }

    public function rpjm()
    {
        $data = $this->getNagariData();
        return view('pages.rpjm', ['data' => $data]);
    }
    public function durkp()
    {
        $data = $this->getNagariData();
        return view('pages.durkp', ['data' => $data]);
    }
    public function lppn()
    {
        $data = $this->getNagariData();
        return view('pages.lppn', ['data' => $data]);
    }
    public function apbn()
    {
        $data = $this->getNagariData();
        return view('pages.apbn', ['data' => $data]);
    }
    public function lkppn()
    {
        $data = $this->getNagariData();
        return view('pages.lkppn', ['data' => $data]);
    }
    public function lpj()
    {
        $data = $this->getNagariData();
        return view('pages.lpj', ['data' => $data]);
    }






    public function ppidNagari(){
        $data = $this->getNagariData();
        return view('pages.ppid.ppid_profil', ['data' => $data]);
    }

    public function ppidInformasiPublik(){
        $data = $this->getNagariData();
        return view('pages.ppid.ppid_informasi_publik', ['data' => $data]);
    }
    
    public function ppidPermohonanInformasi(){
        $data = $this->getNagariData();
        return view('pages.ppid.ppid_permohonan_informasi', ['data' => $data]);
    }

    public function ppidPermohonanInformasiSend(Request $request){
        // return response()->json($request->all());
        // 1. Ambil file foto dan token captcha dari request form
        $fileFoto = $request->file('foto');
        $captchaToken = $request->input('g-recaptcha-response');

        // 2. Kirim data via HTTP Client (Multipart/Form-Data)
        $response = Http::withHeaders([ 
                'Accept'     => '*/*',
            ])
            ->attach('kode_instansi', env('KODE_INSTANSI'))
            ->attach('nama', $request->input('nama'))
            ->attach('nik', $request->input('nik'))
            ->attach('pekerjaan', $request->input('pekerjaan'))
            ->attach('kategori', $request->input('kategori'))
            ->attach('no_telp', $request->input('no_telp'))
            ->attach('email', $request->input('email'))
            ->attach('alamat', $request->input('alamat'))
            ->attach('tujuan', $request->input('tujuan'))
            ->attach('rincian', $request->input('rincian'))
            
            // MENAMBAHKAN FIELD TOKEN RECAPTCHA
            ->attach('recaptcha_token', $captchaToken)
            
            // ATTACH FILE FOTO ASLI
            ->attach(
                'foto', 
                file_get_contents($fileFoto->getRealPath()), 
                $fileFoto->getClientOriginalName()
            )
            ->post(env('API_URL') . 'api/ppid/permohonan_informasi/ajaxBuatPermohonanInformasi'); 

        // Ambil data response dalam bentuk array JSON
        $result = $response->json();

        // Pastikan response tidak kosong dan memiliki key 'status'
        if (isset($result['status']) && $result['status'] == true) {
            
            // Kirim pesan sukses ke halaman tujuan menggunakan session flash data
            return redirect('ppid_permohonan_informasi')
            ->with([
                'success' => 'Permohonan informasi Anda telah berhasil dikirim.',
                'kode_registrasi' => $result['kode_registrasi'] // Contoh: REG-20260625-XXXX
            ]);

        } else {
            
            // Jika status false atau gagal, kembali ke halaman form dengan membawa pesan error dan input sebelumnya
            $pesanError = $result['message'] ?? 'Terjadi kesalahan saat menyimpan data.';
            
            return back()
                ->withErrors(['error' => $pesanError])
                ->withInput();
        }
    }

    public function ppidCekPermohonanInformasi(){
        $data = $this->getNagariData();
        return view('pages.ppid.ppid_cek_permohonan_informasi', ['data' => $data]);
    }

    public function ppidPermohonanInformasiCheck(Request $request)
    {
        $captchaToken = $request->input('recaptcha_token'); 

        $response = Http::withHeaders([ 'Accept' => 'application/json' ])
            ->asForm() 
            ->post(env('API_URL') . 'api/ppid/permohonan_informasi/ajaxCheckPermohonanInformasi', [
                'kode_registrasi' => $request->input('kode_registrasi'),
                'recaptcha_token' => $captchaToken,
            ]); 

        $result = $response->json();

        // JIKA BERHASIL (Menerima JSON sukses seperti contoh Anda)
        if (isset($result['success']) && $result['success'] == true) {
            $data = $this->getNagariData();
            // Panggil view status_detail dan oper array 'data' dari JSON nya
            return view('pages.ppid.ppid_hasil_permohonan_informasi', [
                'data'  => $data,
                'result' => $result['data']
            ]);
            
        } else {
            // Jika gagal, kembali dengan flash error
            $pesanGagal = $result['message'] ?? 'Kode registrasi tidak valid / salah.';
            return back()->withErrors(['error' => $pesanGagal])->withInput();
        }
    }

    public function ppidPengajuanKeberatan(){
        $data = $this->getNagariData();
        return view('pages.ppid.ppid_pengajuan_keberatan', [
            'data'  => $data
        ]);
    }

    public function ppidPengajuanKeberatanSend(Request $request) 
    {
        // 1. Ambil g-recaptcha-response dari form frontend
        $captchaToken = $request->input('g-recaptcha-response');

        // 2. Siapkan data array persis seperti struktur JSON yang Anda inginkan
        $payload = [
            '_token'                => $request->input('_token'),
            'recaptcha_token'       => $captchaToken,
            'kode_registrasi'       => $request->input('kode_registrasi'), // atau generate otomatis
            'kategori'              => $request->input('kategori'),
            'nama'                  => $request->input('nama'),
            'nik'                   => $request->input('nik'),
            'pekerjaan'             => $request->input('pekerjaan'),
            'no_telp'               => $request->input('no_telp'),
            'email'                 => $request->input('email'),
            'alasan'                => $request->input('alasan'),
            'keterangan'            => $request->input('keterangan'),
            'kode_instansi'         => env('KODE_INSTANSI'),
        ];

        // 3. Kirim data menggunakan format JSON murni (Jangan gunakan ->attach() atau ->asMultipart())
        $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])
            ->post(env('API_URL') . 'api/ppid/pengajuan_keberatan/ajaxKirimPengajuanKeberatan', $payload);

        // 4. Ambil response dari server
        $result = $response->json();

        // 5. Kondisi pengalihan halaman setelah menerima respon server
        if ($response->successful() && isset($result['success']) && $result['success'] == true) {
            return redirect('ppid_pengajuan_keberatan')
                ->with([
                    'success' => 'Permohonan informasi Anda telah berhasil dikirim.',
                    'kode_registrasi' => $result['kode_registrasi'] ?? $payload['kode_registrasi']
                ]);
        } else {
            $pesanError = $result['message'] ?? 'Terjadi kesalahan pada server tujuan.';
            return back()
                ->withErrors(['error' => $pesanError])
                ->withInput();
        }
    }


    public function ppidCekPengajuanKeberatan(){
        $data = $this->getNagariData();
        return view('pages.ppid.ppid_cek_pengajuan_keberatan', [
            'data'  => $data
        ]);
    }


    public function ppidPengajuanKeberatanCheck(Request $request)
    {
        // 1. Validasi input terlebih dahulu di sisi client
        $request->validate([
            'kode_registrasi' => 'required|string',
            'g-recaptcha-response' => 'required|string'
        ], [
            'kode_registrasi.required' => 'Kode registrasi wajib diisi.',
            'g-recaptcha-response.required' => 'Verifikasi reCAPTCHA wajib diselesaikan.'
        ]);

        $captchaToken = $request->input('g-recaptcha-response');
        $payload = [
            '_token'            => $request->input('_token'),
            'recaptcha_token'   => $captchaToken,
            'kode_instansi'     => env('KODE_INSTANSI'),
            'kode_registrasi'   => $request->input('kode_registrasi')
        ];

        try {
            // 3. Kirim data menggunakan format JSON murni
            $response = Http::withHeaders([
                    'Accept' => 'application/json',
                ])
                ->post(env('API_URL') . 'api/ppid/pengajuan_keberatan/ajaxCheckPengajuanKeberatan', $payload);

            // 4. Ambil response dari server
            $result = $response->json();

            // 5. Evaluasi status response API dari Server
            if ($response->successful() && isset($result['success']) && $result['success'] === true) {
                
                // Konversi JSON response menjadi Object Standard (StdClass)
                $dataKeberatan = new \stdClass();
                $dataKeberatan->kode_registrasi = $request->input('kode_registrasi');
                
                // MEMBACA DATA ASLI/REAL HASIL RESPONSE SERVER BARU

                $dataKeberatan->status          = $result['status'] ?? 'Menunggu Verifikasi'; 
                $dataKeberatan->nama            = $result['nama'] ?? '-'; 
                $dataKeberatan->kategori        = $result['kategori'] ?? '-';
                $dataKeberatan->pekerjaan       = $result['pekerjaan'] ?? '-';
                $dataKeberatan->alasan          = $result['alasan'] ?? '-';
                $dataKeberatan->keterangan      = $result['keterangan'] ?? '-';
                $dataKeberatan->tanggapan_admin = $result['catatan'] ?? 'Belum ada tanggapan resmi.';
                $dataKeberatan->file            = $result['file'] ?? '';

                // Perbaikan parsing tanggal menggunakan Carbon agar terhindar dari error format string database
                if (!empty($result['created_at'])) {
                    $dataKeberatan->created_at  = Carbon::parse($result['created_at'])->translatedFormat('d F Y');
                } else {
                    $dataKeberatan->created_at  = '-';
                }

                // Kembalikan ke view dengan membawa data object hasil API
                $data = $this->getNagariData();
                
                // Sesuai nama file blade Anda yang digunakan di rute client: ppid_cek_pengajuan_keberatan
                return view('pages.ppid.ppid_cek_pengajuan_keberatan', compact('dataKeberatan', 'data'));

            } else {
                // Jika server merespon false atau format tidak sesuai
                $pesanError = $result['message'] ?? 'Kode registrasi tidak terdaftar atau tidak ditemukan di sistem server pusat.';
                return redirect()->back()
                                ->withInput()
                                ->with('error', $pesanError);
            }

        } catch (\Exception $e) {
            // Antisipasi jika API Server down / timeout
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Gagal terhubung ke server data PPID. Silakan coba beberapa saat lagi.');
        }
    }








    



    public function profilPKK(){
        $data = $this->getNagariData();
        return view('pages.pkk.profil_pkk', ['data' => $data]);
    }
    
    public function pkkProgramKerja(){
        $data = $this->getNagariData();
        return view('pages.pkk.pkk_program_kerja', ['data' => $data]);
    }

    public function pkkKegiatan(){
        $data = $this->getNagariData();
        return view('pages.pkk.pkk_kegiatan', ['data' => $data]);
    }
    
    public function pkkPengurus(){
        $data = $this->getNagariData();
        return view('pages.pkk.pkk_pengurus', ['data' => $data]);
    }





}