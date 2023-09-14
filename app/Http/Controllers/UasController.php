<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uas;

class UasController extends Controller
{
    public function index()
    {
        $mahasiswas = Uas::all();
        return view('npm.index', compact('mahasiswas')); // Logika untuk menampilkan data
    }

    public function create()
    {
        return view('npm.create'); // Logika untuk menampilkan formulir tambah data
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|max:50|unique:npm_mahasiswa',
            'nama' => 'required|max:100',
            'alamat' => 'required',
        ]);

        Uas::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect('/npm')->with('success', 'Data mahasiswa berhasil ditambahkan.'); // Logika untuk memproses penambahan data
    }

    public function edit($id)
    {
        $mahasiswa = Uas::find($id);
        return view('npm.edit', compact('mahasiswa')); // Logika untuk menampilkan formulir edit data
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npm' => 'required|max:50|unique:npm_mahasiswa,npm,' . $id,
            'nama' => 'required|max:100',
            'alamat' => 'required',
        ]);

        $mahasiswa = Uas::find($id);
        $mahasiswa->update([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect('/npm')->with('success', 'Data mahasiswa berhasil diperbarui.'); // Logika untuk memproses pembaruan data
    }

    public function destroy($id)
    {
        $mahasiswa = Uas::find($id);
        $mahasiswa->delete();

        return redirect('/npm')->with('success', 'Data mahasiswa berhasil dihapus.'); // Logika untuk menghapus data
    }
}
