<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\riwayat;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class BukuController extends Controller
{

    //menampilkan 
    public function indexx() {
        $peminjaman = Peminjaman::all();
        return view("admin.buku.show", compact("peminjaman"));
    }

    //menampilkan view admin buku
    public function index()
    {
        $bukus = Buku::all(); // mengambil data buku lewat model
        return view('admin.buku.index', compact('bukus')); //menampilkan view admin buku dan menampilkan data buku
    }

    //menampilkan view admin buku create
    public function create()
    {
        return view('admin.buku.create');
    }

    //menyimpan data buku
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric',
        ]); //memvalidasi seluruh input text dengan nama yang sesuai

        Buku::create($request->all()); //membuat data baru dengan memakai variabel

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil ditambahkan'); //kembali ke halaman admin buku dengan pesan
    }

    
    public function show(Buku $buku)
    {
        return view('admin.buku.show', compact('bukus'));
    }

    //menampilkan admin edit
    public function edit(Buku $buku)
    {
        return view('admin.buku.edit', compact('buku')); //menampilkan admin edit dengan id yang sesuai
    }

    //memperbarui data buku
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric',
        ]); //memvalidasi setiap data

        $buku->update($request->all()); //memperbarui data buku dengan memakai variabel

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil diperbarui'); //kembali ke halaman admin buku dengan pesan
    }

    //menghapus data buku
    public function destroy(Buku $buku)
    {
        $buku->delete(); //menghapus semua field data buku

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil dihapus'); //kembali ke halaman admin buku dengan pesan
    }
}
