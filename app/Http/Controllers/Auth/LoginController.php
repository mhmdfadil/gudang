<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\Barang;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input form
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $userId = Auth::id(); 
            session(['user_id' => $userId]); 

            return redirect()->intended('/beranda')->with('success', "Berhasil login! ID Anda: $userId");
        } else {
            return redirect()->back()->with('error', 'Username atau password salah!');
        }
    }

    public function berandas()
    {
        $user_id = Auth::id();  
        $user = User::find($user_id); 
        $userC = User::count();
        $kategoriC= Kategori::count();
        $supplierC = Supplier::count();
        $barangC = Barang::count();
        $pembelianC = Pembelian::count();
        return view('beranda', compact(
            'user', 
            'userC', 
            'kategoriC', 
            'supplierC', 
            'barangC',
            'pembelianC', 
        ));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
