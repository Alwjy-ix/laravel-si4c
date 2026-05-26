<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all(); //untuk liat dropdown prodi
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //validasi input
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm',
            'nama' => 'required',
            'prodi_id' => 'required|exists:prodis,id',
            'foto' => 'nullable|image|max:4096', // Validasi untuk file foto (opsional, hanya menerima gambar dengan ukuran maksimal 4MB)
        ]);

        //uploadfoto jkika ada file foto yang diupload
        if ($request->hasFile('foto')) {
            $filename = $input['npm'] . '.' . $request->file('foto')->getClientOriginalExtension();
            $input['foto'] = $request->file('foto')->storeAs('fotos', $filename, 'public');
        } else {
            $input['foto'] = null; // Set foto ke null jika tidak ada file yang diupload
        }

        //simpan data ke tabel mnahasiswa
        Mahasiswa::create($input);

        //redirect ke halaman index prodi
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();

        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'nama' => 'required',
            'prodi_id' => 'required|exists:prodis,id',
            'foto' => 'nullable|image|max:4096', // Validasi untuk file foto (opsional, hanya menerima gambar dengan ukuran maksimal 4MB)
        ]);

        //uploadfoto jkika ada file foto yang diupload
        if ($request->hasFile('foto')) {
            $filename = $input['npm'] . '.' . $request->file('foto')->getClientOriginalExtension();
            $input['foto'] = $request->file('foto')->storeAs('fotos', $filename, 'public');
        } else {
            $input['foto'] = $mahasiswa->foto; // Pertahankan foto lama jika tidak ada file baru yang diupload
        }

        // update data
        $mahasiswa->update($input);

        // redirect
        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //hapus file foto jika ada
        if ($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))) 
        {
            unlink(storage_path('app/public/' . $mahasiswa->foto));// Hapus file foto dari storage
        }

        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
