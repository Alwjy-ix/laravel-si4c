@extends('main')

@section('title', 'Edit Program Studi')

@section('content')

<form action="{{ route('prodi.update', $prodi->id) }}" method="post">
    @method('PUT')
    @csrf

    <div class="m-3">
        <label for="nama_prodi" class="form-label">Nama Program Studi</label>
        <input type="text"
               id="nama_prodi"
               name="nama_prodi"
               class="form-control"
               value="{{ old('nama_prodi') ?? $prodi->nama_prodi }}"
               placeholder="masukkan nama program studi..">

        @error("nama_prodi")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="singkatan" class="form-label">Singkatan Program Studi</label>
        <input type="text"
               id="singkatan"
               name="singkatan"
               class="form-control"
               value="{{ old('singkatan') ?? $prodi->singkatan }}"
               placeholder="masukkan singkatan program studi..">

        @error("singkatan")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="kaprodi" class="form-label">Nama Kaprodi</label>
        <input type="text"
               id="kaprodi"
               name="kaprodi"
               class="form-control"
               value="{{ old('kaprodi') ?? $prodi->kaprodi }}"
               placeholder="masukkan nama kaprodi..">

        @error("kaprodi")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="fakultas_id" class="form-label">Fakultas</label>
        <select name="fakultas_id" id="fakultas_id" class="form-control">
            <option value="">-- Pilih Fakultas --</option>

            @foreach ($fakultas as $f)
                <option value="{{ $f->id }}"
                    {{ old('fakultas_id', $prodi->fakultas_id) == $f->id ? 'selected' : '' }}>
                    {{ $f->nama }}
                </option>
            @endforeach
        </select>

        @error("fakultas_id")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <br>

        <button type="submit" class="btn btn-primary mt-3">
            Submit
        </button>
    </div>
</form>

@endsection