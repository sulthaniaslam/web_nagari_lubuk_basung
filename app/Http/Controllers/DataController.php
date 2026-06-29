<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    //
    public function sinkronData(Request $request){
        // Cek apakah token rahasia dari header sesuai
        $tokenDiterima = $request->header('X-Token-Rahasia');
        $tokenValid = 'fuZodNCWqGnkta8xUYOeCOKAmWpzLzexpZLjd0Co';
        // $tokenValid = 'qwe123';

        if ($tokenDiterima !== $tokenValid) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized: Token tidak valid atau tidak disertakan.'
            ], 401); // Kembalikan error 401 Unauthorized
        }

        // Jika token valid, lanjutkan proses pembuatan file JSON
        $data = $request->all();
        $jsonContent = json_encode($data, JSON_PRETTY_PRINT);
        $fileName = 'data_nagari.json';
        
        Storage::disk('local')->put($fileName, $jsonContent);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disinkronkan',
            'file_name' => $fileName
        ]);
    }
}
