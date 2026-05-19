@extends('main')

@section('title', 'Edit Fakultas')

@section('content')

<form action="{{ route('fakultas.update', $fakultas->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="m-3">
        <label for="nama" class="form-label">Nama fakultas</label>
        <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') ?? $fakultas->nama}}" placeholder="masukkan nama fakultas..">
        @error("nama")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="singkatan" class="form-label">Singkatan fakultas</label>
        <input type="text" id="singkatan" name="singkatan" class="form-control" value="{{ old('singkatan') ?? $fakultas->singkatan }}" placeholder="masukkan singkatan fakultas..">
        @error("singkatan")
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="dekan" class="form-label">Nama dekan fakultas</label>
        <input type="text" id="dekan" name="dekan" class="form-control" value="{{ old('dekan') ?? $fakultas->dekan }}" placeholder="masukkan nama dekan..">
        @error("dekan")
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>

@endsection