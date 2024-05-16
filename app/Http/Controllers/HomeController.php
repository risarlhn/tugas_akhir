<?php

namespace App\Http\Controllers;
use App\Models\PurchaseOrder;
use App\Models\SuratJalan;
use App\Models\Invoice;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        // Ambil tanggal awal bulan ini
        $startDate = now()->startOfMonth();

        // Ambil tanggal akhir bulan ini
        $endDate = now()->endOfMonth();

        // Hitung jumlah data PurchaseOrder dalam rentang waktu bulan ini
        $po = PurchaseOrder::whereBetween('created_at', [$startDate, $endDate])->count();
        $inv = Invoice::whereBetween('created_at', [$startDate, $endDate])->count();
        $sj = SuratJalan::whereBetween('created_at', [$startDate, $endDate])->count();

        // Kirim jumlah data ke tampilan
        return view('dashboard', compact('po','inv','sj'));
    }
    

}
