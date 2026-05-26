<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DB
        $jumlahMahasiswa = DB::select("SELECT p.nama_prodi, COUNT(*) AS jumlah
            FROM mahasiswas m
            JOIN prodis p 
            ON m.prodi_id = p.id
            GROUP BY p.nama_prodi"
        );
        return view('dashboard.index', compact('jumlahMahasiswa'));
    }


//select p.nama_prodi, count(*) as 'jumlah' 
//from mahasiswas m
//join laravel.prodis p 
//on m.prodi_id = p.id group by p.nama_prodi;

}    