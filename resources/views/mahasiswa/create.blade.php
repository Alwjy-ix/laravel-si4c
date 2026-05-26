@extends('main')
@section('title', 'Tambah Mahasiswa')
@section('content')
        <form action="{{ route('mahasiswa.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class= "form-group">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" name="npm" value="{{ old('npm') }}">
                @error("npm")
                    <div class='text-danger'>{{ $message }}</div>
                @enderror
            </div>
            <div class= "form-group">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                @error("nama")
                    <div class='text-danger'>{{ $message }}</div>
                @enderror
            </div>
            <div class= "form-group">
                <label for="prodi_id" class="form-label">Program Studi</label>
                <select class="form-control" name="prodi_id">
                    <option value="">--Pilih Program Studi--</option>
                    @foreach($prodi as $p)
                        <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_prodi }}</option>
                    @endforeach
                </select>
                @error("prodi_id")
                    <div class='text-danger'>{{ $message }}</div>
                @enderror
            </div>
            <div class= "form-group">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" value="{{ old('foto') }}">
                @error("foto")
                    <div class='text-danger'>{{ $message }}</div>
                @enderror
            </div>
            
                
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>

@endsection