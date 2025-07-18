@extends('layouts.app')

@section('title', 'Peminjaman Buku')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Peminjaman</h2>
        <a href="{{ route('user.peminjaman.create') }}" class="btn btn-primary">Pinjam Buku</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th><i class="fa-solid fa-bookmark"></i> Judul</th>
                <th><i class="fa-solid fa-pencil"></i> Penulis</th>
                <th><i class="fa-solid fa-user-tie"></i> Penerbit</th>
                <th><i class="fa-solid fa-calendar-days"></i> Tahun Terbit</th>
                <th><i class="fa-solid fa-boxes-stacked"></i> Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->judul }}</td>
                    <td>{{ $d->penulis }}</td>
                    <td>{{ $d->penerbit }}</td>
                    <td>{{ $d->tahun_terbit }}</td>
                    <td>{{ $d->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection