@extends('main')

@section('title', 'Periode')

@section('content')
<a href="{{ route('periode.create') }}" class="btn btn-primary mb-3">Tambah Periode</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>No</th>
            <th>tahun akademik</th>
            <th>semester</th>
        </tr>
    @foreach ($periodes as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->tahun_akademik }}</td>
            <td>{{ $item->kode_smt }}</td>
        </tr>
    @endforeach
    </table>

@endsection
