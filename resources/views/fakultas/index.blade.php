@extends('main')

@section('title', 'Fakultas')

@section('content')
    <table class="table table-bordered table-hover">
        <tr>
            <th>nama</th>
            <th>dekan</th>
            <th>singkatan</th>
        </tr>
    @foreach ($fakultas as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $fakultas->nama }}</td>
            <td>{{ $fakultas->dekan }}</td>
            <td>{{ $fakultas->singkatan }}</td>
        </tr>
    @endforeach
    </table>

@endsection