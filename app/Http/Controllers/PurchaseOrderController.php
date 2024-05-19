<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

class PurchaseOrderController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        if ($user) {
            if ($user->role == 'ADMIN') {
                // Jika pengguna adalah admin, ambil semua data pesanan pembelian tanpa filter
                $data = PurchaseOrder::join('users', 'users.id', 'purchase_orders.user_id')
                    ->select('users.name', 'purchase_orders.*')
                    ->orderBy('purchase_orders.created_at', 'desc')
                    ->get();
            } else {
                // Jika pengguna bukan admin, ambil data pesanan pembelian berdasarkan ID pengguna yang login
                $userId = $user->id;
                $data = PurchaseOrder::join('users', 'users.id', 'purchase_orders.user_id')
                    ->where('users.id', $userId)
                    ->select('users.name', 'purchase_orders.*')
                    ->get();
            }

            // Mengembalikan tampilan dengan data yang ditemukan
            return view('purchase-order/index', compact('data'));
        } else {
            // Jika tidak ada pengguna yang login, arahkan ke halaman login
            return redirect()->route('login');
        }
    }


    public function markAsRead($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->is_read = true;
        $purchaseOrder->save();

        return redirect()->route('purchase-order.index');
    }



    public function filter(Request $request,)
    {

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $data = PurchaseOrder::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();

        return view('purchase-order.laporan', compact('data'));
    }

    public function laporan()
    {
        $data = PurchaseOrder::join('users', 'users.id', 'purchase_orders.user_id')->where('status', 'Selesai')->get();
        return view('purchase-order/laporan', compact('data'));
    }

    public function cetak()
    {
        $data = PurchaseOrder::join('users', 'users.id', 'purchase_orders.user_id')->where('status', 'Selesai')->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('purchase-order.pdf', compact('data'))->render());

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream();
    }

    public function create()
    {
        return view('purchase-order/create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' =>  'required',
            'file' => 'required|mimes:pdf',
        ]);

        $filename = time() . '.' . $request->file->extension();
        $request->file->move(public_path('file'), $filename);

        $data = new PurchaseOrder();
        $data->user_id = Auth::user()->id;
        $data->nama_perusahaan = $request->nama_perusahaan;
        $data->file = $filename;
        $data->save();

        return redirect()->route('purchase-order.index')
            ->with('success', 'PO Berhasil Diajukan');
    }

    public function status($status, $id)
    {
        $data = PurchaseOrder::find($id);
        if ($status == 'proses') {
            $data->status = "Proses";
        } else if ($status == 'batal') {
            $data->status = "Batal";
        } else if ($status == 'selesai') {
            $data->status = "Selesai";
        }
        $data->save();
        return redirect()->route('purchase-order.index')
            ->with('success', 'Status PO Berhasil Diubah');
    }


    public function destroy(string $user_id)
    {
        $data = PurchaseOrder::findOrFail($user_id);
        $data->delete();
        return redirect()->route('purchase-order.laporan')->with('success', 'Berhasil Hapus Data');
    }
}
