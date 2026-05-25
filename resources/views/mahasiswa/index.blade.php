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

        @foreach ($mahasiswa as $key => $mhs)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $mhs->npm }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->nama_prodi ?? '-' }}</td>
                <td>
                    @if ($mhs->foto)
                        <img src="{{ asset('storage/' .$mhs->foto) }}" alt="Foto" width="50">
                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </td>
                <td>
                    <form method="POST" action="{{ route('prodi.destroy', $prodi->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm" data-toggle="tooltip"
                            title='Delete' data-nama='{{ $prodi->nama }}'>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

@endsection
