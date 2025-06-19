<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $userId = Auth::id();  
        $user = User::find($userId); 
        $kategori = Kategori::all();
        return view('kategori' , compact('user','kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori')->with('success', 'Data kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
