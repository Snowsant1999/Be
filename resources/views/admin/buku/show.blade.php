@extends('layouts.app')

@section('title', 'Peminjaman Buku')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fa-solid fa-users"></i> Daftar Peminjaman</h2>
        <a href="{{ route('admin.buku.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Buku</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th><i class="fa-solid fa-user"></i> Nama User</th>
                <th><i class="fa-solid fa-bookmark"></i> Judul Buku</th>
                <th><i class="fa-solid fa-calendar-days"></i> Tanggal Pinjam</th>
                <th><i class="fa-solid fa-hourglass-start"></i> Tanggal Kembali</th>
                <th><i class="fa-solid fa-chart-simple"></i> Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->user->name ?? 'N/A' }}</td>
                    <td>{{ $d->buku->judul ?? 'N/A'}}</td>
                    <td>{{ $d->tanggal_pinjam }}</td>
                    <td>{{ $d->tanggal_kembali ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $d->status == 'dipinjam' ? 'warning' : 'success' }}">
                            {{ $d->status }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection