@extends('main')

@section('title', 'Mahasiswa')

@section('content')
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    @session('success')
        <div class="alert alert-success">
            {{ $value }}
        </div>
    @endsession
    <table class="table table-bordered table-hover">
        <tr>
            <th>NPM</th>
            <th>Nama Mahasiswa</th>
            <th>Program Studi</th>
            <th>foto</th>
            <th>Aksi</th>
        </tr>

        @foreach ($mahasiswas as $key => $mhs)
            <tr>
                <td>{{ $mhs->npm }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->prodi->nama_prodi ?? '-' }}</td>
                <td>
                    @if ($mhs->foto)
                        <img src="{{ asset('storage/' . $mhs->foto) }}" alt="Foto" width="100">
                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-rounded">Edit</a>
                    <form method="POST" action="{{ route('mahasiswa.destroy', $mhs->id) }}" class="d-inline">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm" data-toggle="tooltip"
                            title='Delete' data-nama='{{ $mhs->nama }}'>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

@endsection
