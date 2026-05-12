@extends('main')

@section('title', 'Tambah Periode')

@section('content')

<form action="{{ route('periode.store') }}" method="post">
    @csrf
    <div class="m-3">
        <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
        <input type="text" id="tahun_akademik" name="tahun_akademik" class="form-control" value="{{ old('tahun_akademik') }}" placeholder="masukkan tahun akademik..">
        @error("tahun_akademik")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="kode_smt" class="form-label">Kode Semester</label>
        <input type="text" id="kode_smt" name="kode_smt" class="form-control" value="{{ old('kode_smt') }}" placeholder="masukkan kode semester..">
        @error("kode_smt")
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>

@endsection