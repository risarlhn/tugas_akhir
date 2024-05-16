<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BiayaOperasional;
use Dompdf\Dompdf;

class BiayaOperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $startDate = now()->startOfMonth();
        $endDate = now()->endOfMonth();
        $data = BiayaOperasional::whereBetween('created_at', [$startDate, $endDate])->get();
        
        return view('biaya-operasional/index',compact('data'));
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biaya-operasional.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'tanggal' => 'required|date',
            'kategori_pengeluaran' => 'required|string|max:255',
            'jenis_pengeluaran' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga_biaya' => 'required|string|max:255',
            'total' => 'required|string|max:255',

        ]);

        // Simpan data ke database
        $pengeluaranBbm = new BiayaOperasional(); // Gunakan model BBM
        $pengeluaranBbm->tanggal = $request->tanggal;
        $pengeluaranBbm->kategori_pengeluaran = $request->kategori_pengeluaran;
        $pengeluaranBbm->jenis_pengeluaran = $request->jenis_pengeluaran;
        $pengeluaranBbm->deskripsi = $request->deskripsi;
        $pengeluaranBbm->harga_biaya = $request->harga_biaya;
        $pengeluaranBbm->total = $request->total;
        
        $pengeluaranBbm->save();

        // Redirect atau lakukan tindakan lainnya setelah penyimpanan berhasil
        return redirect()->route('biaya-operasional.index')->with('success', 'Biaya Operasional berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $biayaOperasional = BiayaOperasional::find($id);
        return view('biaya-operasional/show',compact('biayaOperasional'));
    }

    public function status(Request $request)
    {
        // Logic for updating status
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $biayaOperasional = BiayaOperasional::findOrFail($id);
        return view('biaya-operasional.edit', compact('biayaOperasional'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'kategori_pengeluaran' => 'required',
            'jenis_pengeluaran' => 'required',
            'deskripsi' => 'required',
            'harga_biaya' => 'required',
            'total' => 'required',
        ]);
    
        // Dapatkan data yang ada berdasarkan ID
        $biayaOperasional = BiayaOperasional::findOrFail($id);
    
        // Perbarui data yang ada
        $biayaOperasional->tanggal = $request->tanggal;
        $biayaOperasional->kategori_pengeluaran = $request->kategori_pengeluaran;
        $biayaOperasional->jenis_pengeluaran = $request->jenis_pengeluaran;
        $biayaOperasional->deskripsi = $request->deskripsi;
        $biayaOperasional->harga_biaya = $request->harga_biaya;
        $biayaOperasional->total = $request->total;
    
        // Simpan perubahan
        $biayaOperasional->save();
    
        // Redirect ke halaman yang sesuai
        return redirect()->route('biaya-operasional.index')->with('success', 'Biaya Operasional berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $biayaOperasional = BiayaOperasional::findOrFail($id);
        $biayaOperasional->delete();

        return redirect()->route('biaya-operasional.index')->with('success', 'Biaya Operasional Berhasil di Hapus.');
    }
    
    public function filter(Request $request,){

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $data = BiayaOperasional::whereDate('created_at','>=',$startDate)
                        ->whereDate('created_at','<=',$endDate)
                        ->get();

        return view('biaya-operasional.laporan', compact('data'));
    }


    public function cetak()
    {
        $data = BiayaOperasional::get();
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('biaya-operasional.pdf', compact('data'))->render());

        // (Opsi) Atur ukuran dan orientasi halaman
        $customPaper = array(0,0,700,1000);
        $dompdf->setPaper($customPaper);

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Tampilkan atau unduh PDF
        return $dompdf->stream();
    }

    public function laporan()
    {
        $data = BiayaOperasional::get();
        return view('biaya-operasional/laporan',compact('data'));
    }

    
    
}

