@extends('main')

@section('title', 'Tambah Program Studi')

@section('content')

<form action="{{ route('prodi.store') }}" method="post">
    @csrf
    <div class="m-3">
        <label for="nama_prodi" class="form-label">Nama Program Studi</label>
        <input type="text" id="nama_prodi" name="nama_prodi" class="form-control" value="{{ old('nama_prodi') }}" placeholder="masukkan nama program studi..">
        @error("nama_prodi")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="singkatan" class="form-label">Singkatan program studi</label>
        <input type="text" id="singkatan" name="singkatan" class="form-control" value="{{ old('singkatan') }}" placeholder="masukkan singkatan program studi.." maxlength="2" required>
        @error("singkatan")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="kaprodi" class="form-label">Nama kaprodi</label>
        <input type="text" id="kaprodi" name="kaprodi" class="form-control" value="{{ old('kaprodi') }}" placeholder="masukkan nama kaprodi..">
        @error("kaprodi")
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
        <label for="fakultas_id">Fakultas</label>
        <select name="fakultas_id" id="fakultas_id" class="form-control">
            <option value="">-- Pilih Fakultas --</option>
            @foreach ($fakultas as $f)
                <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>{{ $f->nama }}</option>
            @endforeach
        </select>
         @error("fakultas_id")
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>

@endsection