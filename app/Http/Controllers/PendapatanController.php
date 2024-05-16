<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use App\Models\BBM;
use App\Models\Invoice;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\BiayaOperasional;

class PendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $bbm = BBM::all();
        $invoice = Invoice::all();
        return view('pendapatan.index',compact('invoice','bbm'));
    }

    public function pengeluaran()

    {
        $data = BBM::all();
        return view('pendapatan.pengeluaran',compact('data'));

    }

    public function Pemasukan()

    {
        $data = Invoice::all();
        return view('pendapatan.pemasukan',compact('data'));
    }

    public function Penghasilan()

    {
        $data = Invoice::all();
        return view('pendapatan.penghasilan',compact('data'));
    }

    public function filter(Request $request,){

        // Terima input dari formulir
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $invoice = Invoice::whereDate('created_at','>=',$startDate)
                        ->whereDate('created_at','<=',$endDate)
                        ->get();
        
        $bbm = BBM::whereDate('created_at','>=',$startDate)
                        ->whereDate('created_at','<=',$endDate)
                        ->get();

        return view('pendapatan.index', compact('bbm','invoice'));
    }

    public function filter2(Request $request,){

        // Terima input dari formulir
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $data = Invoice::whereDate('created_at','>=',$startDate)
                        ->whereDate('created_at','<=',$endDate)
                        ->get();
    

        return view('pendapatan.pemasukan', compact('data'));
    }

    public function filter3(Request $request,){

        // Terima input dari formulir
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $data = BBM::whereDate('created_at','>=',$startDate)
                        ->whereDate('created_at','<=',$endDate)
                        ->get();
    

        return view('pendapatan.pengeluaran', compact('data'));
    }

    public function cetak(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        // Mengecek apakah startDate dan endDate ada
        if ($startDate && $endDate) {
            // Jika keduanya ada, ambil data berdasarkan rentang tanggal
            $data = Invoice::whereDate('created_at', '>=', $startDate)
                            ->whereDate('created_at', '<=', $endDate)
                            ->get();
        } else {
            // Jika salah satu atau kedua tanggal tidak ada, ambil semua data
            $data = Invoice::all();
        }

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pendapatan.pemasukan-pdf', compact('data'))->render());

        // (Opsi) Atur ukuran dan orientasi halaman
        $customPaper = array(0, 0, 1500, 1500);
        $dompdf->setPaper($customPaper);

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Tampilkan atau unduh PDF
        return $dompdf->stream();
    }

    public function cetak2(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        if ($startDate && $endDate) {
            $invoice = Invoice::whereDate('created_at', '>=', $startDate)
                            ->whereDate('created_at', '<=', $endDate)
                            ->get();
        
            $pengeluaran = BBM::whereDate('created_at', '>=', $startDate)
                            ->whereDate('created_at', '<=', $endDate)
                            ->get();
        } else {
            $invoice = Invoice::all();
            $pengeluaran = BBM::all();

        }

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pendapatan.pendapatan-pdf', compact('invoice','pengeluaran'))->render());

        // (Opsi) Atur ukuran dan orientasi halaman
        $customPaper = array(0, 0, 1500, 1500);
        $dompdf->setPaper($customPaper);

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Tampilkan atau unduh PDF
        return $dompdf->stream();
    }

}
