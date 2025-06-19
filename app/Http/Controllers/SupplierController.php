<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $userId = Auth::id();  
        $user = User::find($userId); 
        $supplier= Supplier::all();
        return view('supplier' , compact('user','supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'nullable|email',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier')->with('success', 'Data supplier berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier')->with('success', 'Supplier berhasil dihapus.');
    }
}
