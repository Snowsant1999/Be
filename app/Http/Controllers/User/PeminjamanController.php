<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{

    public function indexx() {
        $buku = Buku::all();
        return view("user.peminjaman.show", compact("buku"));
    }
    //menampilkan view dan data user peminjaman 
    public function index()
    {
        $peminjamen = Peminjaman::where('user_id', Auth::id())->get(); //mengambil id data user yang login
        return view('user.peminjaman.index', compact('peminjamen')); //menampilkan view user peminjaman dengan table Peminjaman
    }

   //menampilkan view user create
    public function create()
    {
        
        $bukus = Buku::where('stok', '>', 0)->get(); //mengambil data buku yang sudah ada
        return view('user.peminjaman.create', compact('bukus')); //menampilkan view user create
    }

    //menyimpan data user peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
        ]); //memvalidasi data buku yang sudah ada

        $buku = Buku::find($request->buku_id); //mencari id buku yang ingin di pinjam

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok buku habis');
        } //perandaian jika data stok buku kurang dari 1, buku tidak ada stok

        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam',
        ]); //membuat data sesuai dengan id user, id buku, tanggal peminjaman, dan status

        $buku->decrement('stok'); //pengurangan stok

        return redirect()->route('user.peminjaman.index')->with('success', 'Buku berhasil dipinjam'); //menampilkan view user peminjaman dengan pesan
    }

    public function show($id)
    {
        Buku::find($id);
        return view('user.peminjaman.show', compact('bukus'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        
    }

    //mengubah data peminjaman
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->update([
            'tanggal_kembali' => now(),
            'status' => 'dikembalikan',
        ]); //menetapkan hari pengembalian

        $peminjaman->buku->increment('stok'); //pengembalian stok buku(penambahan)

        return redirect()->route('user.peminjaman.index')->with('success', 'Buku berhasil dikembalikan'); //menampilkan view user peminjaman dengan pesan
    }


    public function destroy(Peminjaman $peminjaman)
    {

    }
}
