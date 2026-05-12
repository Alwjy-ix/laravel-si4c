@extends('main')

@section('title', 'Fakultas')

@section('content')
<a href="{{ route('fakultas.create') }}" class="btn btn-primary mb-3">Tambah Fakultas</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>No</th>
            <th>nama</th>
            <th>dekan</th>
            <th>singkatan</th>
        </tr>
    @foreach ($fakultas as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->nama}}</td>
            <td>{{ $item->dekan }}</td>
            <td>{{ $item->singkatan }}</td>
        </tr>
    @endforeach
    </table>

@endsection