<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arsip;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArsip = Arsip::count();
        $suratMasuk = Arsip::where('jenis_surat', 'masuk')->count();
        $suratKeluar = Arsip::where('jenis_surat', 'keluar')->count();
        
        $recentArsips = Arsip::latest()->take(5)->get();
        
        return view('admin.dashboard.index', compact('totalArsip', 'suratMasuk', 'suratKeluar', 'recentArsips'));
    }
}
