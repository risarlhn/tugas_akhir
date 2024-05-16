<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BBM;
use Dompdf\Dompdf;
class PengeluaranBbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $startDate = now()->startOfMonth();
        $endDate = now()->endOfMonth();
        $data = BBM::whereBetween('created_at', [$startDate, $endDate])->get();
        return view('pengeluaran-bbm.index', compact('data'));
    }

    public function create()
    {
        // Logic for create form
        return view('pengeluaran-bbm.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_perusahaan' => 'required',
            'tanggal' => 'required',
            'qty' => 'required',
            'harga_dasar' => 'required',
            'ppn' => 'required',
            'total' => 'required',
            'no_pengeluaran' => 'required',

        ]);

        // Simpan data ke database
        $pengeluaranBbm = new BBM(); // Gunakan model BBM
        $pengeluaranBbm->nama_perusahaan = $request->nama_perusahaan;
        $pengeluaranBbm->tanggal = $request->tanggal;
        $pengeluaranBbm->qty= $request->qty;
        $pengeluaranBbm->harga_dasar =  (float)str_replace(',', '', $request->harga_dasar);
        $pengeluaranBbm->ppn =  (float)str_replace(',', '', $request->ppn);
        $pengeluaranBbm->total =  (float)str_replace(',', '', $request->total);
        $pengeluaranBbm->no_pengeluaran= $request->no_pengeluaran;

        $pengeluaranBbm->save();

        // Redirect atau lakukan tindakan lainnya setelah penyimpanan berhasil
        return redirect()->route('pengeluaran-bbm.index')->with('success', 'Data pengeluaran BBM berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $pengeluaranBbm = BBM::findOrFail($id);
        return view('pengeluaran-bbm.edit', compact('pengeluaranBbm'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'nama_perusahaan' => 'required',
            'tanggal' => 'required',
            'qty' => 'required',
            'harga_dasar' => 'required',
            'ppn' => 'required',
            'total' => 'required',
            'no_pengeluaran' => 'required',
        ]);
    
        // Dapatkan data yang ada berdasarkan ID
        $pengeluaranBbm = BBM::findOrFail($id);
    
        // Perbarui data yang ada
        $pengeluaranBbm->nama_perusahaan = $request->nama_perusahaan;
        $pengeluaranBbm->tanggal = $request->tanggal;
        $pengeluaranBbm->qty= $request->qty;
        $pengeluaranBbm->harga_dasar = (float) str_replace(['.', ','], ['', '.'], $request->harga_dasar);
        $pengeluaranBbm->ppn = (float) str_replace(['.', ','], ['', '.'], $request->ppn);
        $pengeluaranBbm->total = (float) str_replace(['.', ','], ['', '.'], $request->total);
        $pengeluaranBbm->no_pengeluaran= $request->no_pengeluaran;
    
        // Simpan perubahan
        $pengeluaranBbm->save();
    
        // Redirect ke halaman yang sesuai
        return redirect()->route('pengeluaran-bbm.index')->with('success', 'Data pengeluaran BBM berhasil diubah.');
    }
    

    public function destroy($id)
    {
        // Find and delete the purchase order
        $pengeluaranBbm = BBM::findOrFail($id);
        $pengeluaranBbm->delete();

        return redirect()->route('pengeluaran-bbm.index')->with('success', 'Data Pengeluaran BBM Berhasil di Hapus.');
    }
    public function show(string $id)
    {
        $pengeluaranBbm = BBM::find($id);
        return view('pengeluaran-bbm/show',compact('pengeluaranBbm'));
    }

    public function status(Request $request)
    {
        // Logic for updating status
    }

    public function laporan()
    {
        $data = BBM::get();
        return view('pengeluaran-bbm/laporan',compact('data'));
    }

    public function filter(Request $request)
{
    // Terima input dari formulir
    $startDate = $request->startDate;
    $endDate = $request->endDate;
    
    // Dapatkan data sesuai filter
    $data = BBM::whereDate('created_at','>=',$startDate)
                ->whereDate('created_at','<=',$endDate)
                ->get();

    // Kirim data dan total harga ke tampilan
    return view('pengeluaran-bbm.laporan', compact('data'));
}
    public function cetak(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        // Mengecek apakah startDate dan endDate ada
        if ($startDate && $endDate) {
            // Jika keduanya ada, ambil data berdasarkan rentang tanggal
            $data = BBM::whereDate('created_at', '>=', $startDate)
                            ->whereDate('created_at', '<=', $endDate)
                            ->get();
        } else {
            // Jika salah satu atau kedua tanggal tidak ada, ambil semua data
            $data = BBM::all();
        }

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pengeluaran-bbm.pengeluaranbbm-summary', compact('data'))->render());

        // (Opsi) Atur ukuran dan orientasi halaman
        $customPaper = array(0, 0, 794, 800);
        $dompdf->setPaper($customPaper);

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Tampilkan atau unduh PDF
        return $dompdf->stream();
    }

    
}
