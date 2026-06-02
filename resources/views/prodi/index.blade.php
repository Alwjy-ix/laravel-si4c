@extends('main')

@section('title', 'Program Studi')

@section('content')
    <a href="{{ route('prodi.create') }}" class="btn btn-primary mb-3">Tambah Prodi</a>
    @session('success')
        <div class="alert alert-success">
            {{ $value }}
        </div>
    @endsession
    <table class="table table-bordered table-hover">
        <tr>
            <th>No</th>
            <th>Nama Prodi</th>
            <th>Singkatan</th>
            <th>Kaprodi</th>
            <th>Fakultas</th>
            <th>Aksi</th>
        </tr>

        @foreach ($prodis as $key => $prodi)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $prodi->nama_prodi }}</td>
                <td>{{ $prodi->singkatan }}</td>
                <td>{{ $prodi->kaprodi }}</td>
                <td>{{ $prodi->fakultas->nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('prodi.edit', $prodi->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <form method="POST" action="{{ route('prodi.destroy', $prodi->id) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

@endsection
