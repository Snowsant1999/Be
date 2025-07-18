@extends('layouts.app')

@section('title', 'Pinjam Buku')

@section('content')
    <div class="card">
        <div class="card-header">Pinjam Buku</div>
        <div class="card-body">
            <form action="{{ route('user.peminjaman.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="buku_id" class="form-label">Pilih Buku</label>
                    <select class="form-select" id="buku_id" name="buku_id" required>
                        <option value="">-- Pilih Buku --</option>
                        @foreach($bukus as $buku)
                            <option value="{{ $buku->id }}">{{ $buku->judul }} (Stok: {{ $buku->stok }})</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Pinjam</button>
                <a href="{{ route('user.peminjaman.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection