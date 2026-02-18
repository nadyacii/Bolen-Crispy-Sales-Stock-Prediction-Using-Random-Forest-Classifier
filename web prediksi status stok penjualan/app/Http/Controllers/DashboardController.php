<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Jumlah produk
        $totalProduk = Product::count();

        // Total penjualan (semua waktu)
        $totalPenjualan = Sale::sum('total_harga');

        // Keuntungan (contoh: margin 20% dari total harga)
        $totalKeuntungan = Sale::sum(DB::raw('total_harga * 0.2'));

        // Transaksi minggu ini
        $startOfWeek = Carbon::now()->startOfWeek();
        $jumlahTransaksiMinggu = Sale::where('created_at', '>=', $startOfWeek)->count();

        // Grafik penjualan 7 hari terakhir
        $sales = Sale::selectRaw('DATE(created_at) as tanggal, SUM(total_harga) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // Isi label dan data chart
        $labels = [];
        $data = [];

        // Loop tanggal 7 hari terakhir
        foreach (range(0, 6) as $i) {
            $date = Carbon::now()->subDays(6 - $i)->format('Y-m-d');
            $labels[] = $date;
            $match = $sales->firstWhere('tanggal', $date);
            $data[] = $match ? $match->total : 0;
        }

        return view('dashboard', compact(
            'labels',
            'data',
            'totalProduk',
            'totalPenjualan',
            'totalKeuntungan',
            'jumlahTransaksiMinggu'
        ));
    }
}
