@extends('layouts.app')

@section('title', 'Kelola Buku')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fa-solid fa-book"></i> Daftar Buku</h2>
        <a href="{{ route('admin.buku.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Buku</a>
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
                <th><i class="fa-solid fa-circle-exclamation"></i> Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>{{ $buku->stok }}</td>
                    <td>
                        <a href="{{ route('admin.buku.edit', $buku->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="{{ route('admin.buku.destroy', $buku->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection