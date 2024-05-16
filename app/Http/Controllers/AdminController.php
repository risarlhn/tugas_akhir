<?php

namespace App\Http\Controllers;
use App\Models\PurchaseOrder;
use App\Models\SuratJalan;
use App\Models\Invoice;
use Carbon\Carbon;


class AdminController extends Controller
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
         $startDate = Carbon::now()->startOfMonth();
 
         // Ambil tanggal akhir bulan ini
         $endDate = Carbon::now()->endOfMonth();
 
         // Hitung total harga dari PurchaseOrder dalam rentang waktu bulan ini
         $ti = Invoice::whereBetween('created_at', [$startDate, $endDate])
                                     ->sum('total');
                
         // Kirim total harga ke tampilan
         return view('dashboard', compact('ti'));
     }
    

}