@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Kepulangan Umroh</h1>

    <!-- Pencarian -->
    <form method="GET" action="{{ route('kepulangan.index') }}" class="mb-4 d-flex align-items-center">
        <input type="text" name="search" placeholder="Cari Nama Jamaah" class="form-control me-2" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tampilkan Pesan Sukses -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Data -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Jamaah</th>
                <th>Tanggal Kepulangan</th>
                <th>Status Kepulangan</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kepulanganUmrohs as $kepulangan)
                <tr>
                    <td>{{ $kepulangan->id }}</td>
                    <td>{{ $kepulangan->nama_jemaah }}</td>
                    <td>{{ $kepulangan->tanggal_kepulangan }}</td>
                    <td>{{ $kepulangan->status_kepulangan }}</td>
                    <td>{{ $kepulangan->catatan ?? '-' }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('kepulangan.edit', $kepulangan->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('kepulangan.destroy', $kepulangan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tombol Tambah Data -->
    <div class="mt-3">
        <a href="{{ route('kepulangan.create') }}" class="btn btn-success">Tambah Data</a>
    </div>
</div>
@endsection
