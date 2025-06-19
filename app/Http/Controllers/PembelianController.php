<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pembelian;


class PembelianController extends Controller
{
    public function index()
    {
        $userId = Auth::id();  
        $user = User::find($userId); 
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        $pembelian = Pembelian::with(['kategori','supplier'])->get();
        return view('pembelian' , compact('user','pembelian','kategori', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pembelian' => 'required|unique:pembelian,kode_pembelian',
            'kategori_id' => 'required|exists:kategori,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'tanggal_pembelian' => 'required|date',
            'total_harga' => 'required|numeric',
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelian')->with('success', 'Data pembelian berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('pembelian')->with('success', 'Pembelian berhasil dihapus.');
    }
}
