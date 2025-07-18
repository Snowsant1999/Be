@extends('layouts.app')

@section('title', 'Peminjaman Buku')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fa-solid fa-users"></i> Daftar Peminjaman</h2>
        <a href="{{ route('user.peminjaman.create') }}" class="btn btn-primary">Pinjam Buku</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th><i class="fa-solid fa-bookmark"></i> Judul Buku</th>
                <th><i class="fa-solid fa-calendar-days"></i> Tanggal Pinjam</th>
                <th><i class="fa-solid fa-hourglass-start"></i> Tanggal Kembali</th>
                <th><i class="fa-solid fa-chart-simple"></i> Status</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamen as $peminjaman)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peminjaman->buku->judul ?? '-' }}</td>
                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                    <td>{{ $peminjaman->tanggal_kembali ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $peminjaman->status == 'dipinjam' ? 'warning' : 'success' }}">
                            {{ $peminjaman->status }}
                        </span>
                    </td>
                    <td>
                        @if($peminjaman->status == 'dipinjam')
                            <form action="{{ route('user.peminjaman.update', $peminjaman->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">Kembalikan</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection