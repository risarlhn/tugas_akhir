<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Carbon\Carbon;
use Dompdf\Dompdf;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $startDate = now()->startOfMonth();
        $endDate = now()->endOfMonth();
        $data = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();
        
        return view('invoice/index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastInvoice = Invoice::latest()->first(); // Mengambil data terbaru dari database
        $lastInvoiceNumber = $lastInvoice ? $lastInvoice->no_invoice : '000/PT-AKPS/' . Carbon::now()->format('m/y'); // Jika tidak ada data sebelumnya, nomor invoice akan dimulai dengan 000
        
        // Menganalisis nomor invoice terakhir untuk menentukan nomor berikutnya
        preg_match('/(\d{3})\/PT-AKPS\/(\d{1,2})\/(\d{2})/', $lastInvoiceNumber, $matches);
        
        // Menentukan nomor berikutnya
        if (!empty($matches)) {
            $invoiceIndex = $matches[1];
            $month = $matches[2];
            $year = $matches[3];
            $currentYear = Carbon::now()->format('y');

            if ($year == $currentYear && $month == Carbon::now()->format('m')) {
                $newIndex = str_pad($invoiceIndex + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $newIndex = '001';
            }
        } else {
            $newIndex = '001';
        }

        // Membuat format string yang sesuai dengan nomor invoice baru
        $newInvoiceNumber = $newIndex . '/PT-AKPS/' . Carbon::now()->format('m/y');

        return view('invoice/create',compact('newInvoiceNumber'));
        
    }

    public function pdf( $id)
    {
        $data = Invoice::find($id);
        return view('invoice/pdf',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'no_invoice' => 'required',
            'nama_perusahaan' => 'required',
            'tanggal' => 'required',
            'term' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'produk' => 'required',
            'nama_kapal' => 'required',
            'wilayah_pengisian' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'terbilang' => 'required',
        ]);


        // Simpan data ke database
        $invoice = new Invoice();
        $invoice->no_invoice = $request->no_invoice;
        $invoice->nama_perusahaan = $request->nama_perusahaan;
        $invoice->tanggal = $request->tanggal;
        $invoice->term = $request->term;
        $invoice->alamat = $request->alamat;
        $invoice->no_po = $request->no_po;
        $invoice->no_telp = $request->no_telp;
        $invoice->produk = $request->produk;
        $invoice->nama_kapal = $request->nama_kapal;
        $invoice->wilayah_pengisian = $request->wilayah_pengisian;
        $invoice->qty = $request->qty;
        $invoice->satuan = $request->satuan;
        $invoice->harga = (float) str_replace(['.', ','], ['', '.'], $request->harga);
        $invoice->ppn = (float) str_replace(['.', ','], ['', '.'], $request->ppn);
        $invoice->harga_dasar = (float) str_replace(['.', ','], ['', '.'], $request->harga_dasar);
        $invoice->jumlah_harga_dasar = (float) str_replace(['.', ','], ['', '.'], $request->jumlah_harga_dasar);
        $invoice->jumlah_ppn = (float) str_replace(['.', ','], ['', '.'], $request->jumlah_ppn);
        $invoice->total = (float) str_replace(['.', ','], ['', '.'], $request->total);
        $invoice->terbilang = $request->terbilang;
        $invoice->save();

        // Redirect atau lakukan tindakan lainnya setelah penyimpanan berhasil
        return redirect()->route('invoice.index')->with('success', 'Berhasil Tambah Data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::find($id);
        return view('invoice/show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = Invoice::find($id);
        return view('invoice/edit',compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        
        $invoice->no_po = $request->no_po;
        $invoice->tanggal = $request->tanggal;
        $invoice->term = $request->term;
        $invoice->nama_perusahaan = $request->nama_perusahaan;
        $invoice->alamat = $request->alamat;
        $invoice->no_telp = $request->no_telp;
        $invoice->produk = $request->produk;
        $invoice->nama_kapal = $request->nama_kapal;
        $invoice->wilayah_pengisian = $request->wilayah_pengisian;
        $invoice->qty = $request->qty;
        $invoice->satuan = $request->satuan;
        $invoice->harga = (float) str_replace(['.', ','], ['', '.'], $request->harga);
        $invoice->ppn = (float) str_replace(['.', ','], ['', '.'], $request->ppn);
        $invoice->harga_dasar = (float) str_replace(['.', ','], ['', '.'], $request->harga_dasar);
        $invoice->jumlah_harga_dasar = (float) str_replace(['.', ','], ['', '.'], $request->jumlah_harga_dasar);
        $invoice->jumlah_ppn = (float) str_replace(['.', ','], ['', '.'], $request->jumlah_ppn);
        $invoice->total = (float) str_replace(['.', ','], ['', '.'], $request->total);
        $invoice->terbilang = $request->terbilang;


        $invoice->save();

        return redirect()->route('invoice.index')->with('success', 'Berhasil Ubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Invoice::find($id);
        $data->delete();
        return redirect()->route('invoice.index')->with('success','Berhasil Hapus Data');
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
        $dompdf->loadHtml(view('invoice.invoice-summary', compact('data'))->render());

        // (Opsi) Atur ukuran dan orientasi halaman
        $customPaper = array(0, 0, 1500, 1500);
        $dompdf->setPaper($customPaper);

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Tampilkan atau unduh PDF
        return $dompdf->stream();
    }

    public function laporan()
    {
        $data = Invoice::all();
        return view('invoice.laporan',compact('data'));
    }

    public function filter(Request $request,){

        // Terima input dari formulir
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $data = Invoice::whereDate('created_at','>=',$startDate)
                        ->whereDate('created_at','<=',$endDate)
                        ->get();

        return view('invoice.laporan', compact('data'));
    }

    public function cetak1()
    {
        $data = Invoice::get();
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('invoice.pdf', compact('data'))->render());

        // (Opsi) Atur ukuran dan orientasi halaman
        $customPaper = array(0,0,1000,500);
        $dompdf->setPaper($customPaper);

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Tampilkan atau unduh PDF
        return $dompdf->stream();
    }
    
}
