<?php

// app/Http/Controllers/PenjualanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class PenjualanController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('penjualan.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->jumlah > $product->stok) {
            return back()->withErrors(['jumlah' => 'Stok tidak mencukupi']);
        }

        $total = $product->harga * $request->jumlah;

        // Simpan data penjualan
        Sale::create([
            'product_id' => $product->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total
        ]);

        // Update stok produk
        $product->decrement('stok', $request->jumlah);

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil disimpan!');
    }
}
