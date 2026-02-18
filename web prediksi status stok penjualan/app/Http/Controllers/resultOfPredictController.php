<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class resultOfPredictController extends Controller
{
    public function index()
    {
        return view('resultOfPredict.index');
    }

    public function getAllData()
    {
        try {
            $flaskResponse = Http::get('http://127.0.0.1:5000/get-all-predictions');

            if ($flaskResponse->successful()) {
                $flaskData = $flaskResponse->json();

                if (!isset($flaskData['data'])) {
                    return response()->json([
                        'status' => 500,
                        'message' => 'Data key tidak ditemukan dalam response Flask.'
                    ], 500);
                }

                $result = [];
                foreach ($flaskData['data'] as $index => $item) {
                    $result[] = [
                        'no' => $index + 1,
                        'tanggal' => $item['tanggal'] ?? '-',
                        'hari' => $item['hari'] ?? '-',
                        'nama_produk' => $item['nama_produk'] ?? '-',
                        'harga_satuan' => isset($item['harga_satuan']) ? 'Rp ' . number_format($item['harga_satuan'], 0, ',', '.') : '-',
                        'stok_produk' => $item['stok_produk'] ?? '-',
                        'jumlah_terjual' => $item['jumlah_terjual'] ?? '-',
                        'total_harga' => 'Rp '. number_format($item['jumlah_terjual'] * $item['harga_satuan'], 0, ',', '.') ?? '-',
                        'status_stock' => $item['status_stok'] ?? '-',
                    ];
                }

                return response()->json([
                    'status' => 200,
                    'data' => $result
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Gagal mendapatkan data dari API Flask.'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Server Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'tanggal' => 'required|integer',
                'hari' => 'required|integer|between:1,7',
                'nama_produk' => 'required|integer|between:0,6',
                'harga_satuan' => 'required|integer',
                'stok_produk' => 'required|integer',
                'jumlah_terjual' => 'required|integer',
            ]);

            $response = Http::post('http://127.0.0.1:5000/predict', $validated);

            if ($response->successful()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Data berhasil dikirim dan diproses.',
                    'data' => $response->json()
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Gagal mendapatkan respon sukses dari Flask API.',
                    'error' => $response->body()
                ], 500);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan internal Laravel.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
