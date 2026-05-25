@extends('main')

@section('title', 'Tambah Mahasiswa')

@section('content')

<form action="{{ route('mahasiswa.store') }}" method="post">
    @csrf
    <div class="m-3">
        <label for="npm" class="form-label">NPM Mahasiswa</label>
        <input type="text" id="npm" name="npm" class="form-control" value="{{ old('npm') }}" placeholder="masukkan npm mahasiswa..">
        @error("npm")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="nama" class="form-label">nama Mahasiswa</label>
        <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="masukkan nama mahasiswa.." maxlength="2" required>
        @error("nama")
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
        <label for="prodi_id">program studi</label>
        <select name="prodi_id" id="prodi_id" class="form-control">
            <option value="">-- Pilih prodi --</option>
            @foreach ($prodi as $p)
                <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
            @endforeach
        </select>
         @error("prodi_id")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="foto" class="form-control">Foto</label>
            <input type="file" class="form-control" name="foto" value="{{ old('foto') }}">
            @error("foto")
                <div class="text-message">{{ $message }}</div>
            @enderror
        </div>

        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>

@endsection