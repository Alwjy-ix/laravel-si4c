<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::with('fakultas')->get();

        return view('prodi.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all(); // untuk dropdown fakultas
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama_prodi' => 'required|unique:prodis',
            'singkatan' => 'required|max:2',
            'kaprodi' => 'required',
            'fakultas_id' => 'required'
        ]);

        Prodi::create($input);

        return redirect()->route('prodi.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();

        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $input = $request->validate([
            'nama_prodi' => 'required|unique:prodis,nama_prodi,' . $prodi->id,
            'singkatan' => 'required|max:2',
            'kaprodi' => 'required',
            'fakultas_id' => 'required'
        ]);

        $prodi->update($input);

        return redirect()
            ->route('prodi.index')
            ->with('success', 'Data Program Studi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prodi)
    {
        $prodi = Prodi::find($prodi);
        //dd($fakultas);
        $prodi->delete(); //delete form fakultas where id = $fakultas

        return redirect()->route('prodi.index')->with('success', 'Data Fakultas berhasil dihapus'); //redirect ke halaman index fakultas
    }
}
