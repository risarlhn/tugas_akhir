<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Biaya Operasional</title>
    <style>
        table {
            border-collapse: collapse;
            font-size : 14px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #4D869C;
            color: white;
        }

        h2 {
            text-align :right;
        }

        h3 {
            text-align :left;
        }
    </style>
</head>
<body>
    <center><h1>Laporan Biaya Operasional</h1></center>
    <table  style="width:100%" >
        <thead class=" table-bordered" >
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 30%">Tanggal</th>
                <th style="width: 30%">Kategori Pengeluaran</th>
                <th style="width: 30%">Jenis Pengeluaran</th>
                <th style="width: 40%">Deskripsi</th>
                <th style="width: 30%">Harga</th>
                <th style="width: 40%">Total</th>
                
            </tr>
        </thead>
        <tbody>
            @php 
                $total_harga =0;
                $sum_pembelian_barang = 0;
                $sum_biaya_transportasi = 0;
                $sum_ban= 0;
                $sum_pelumas_oli = 0;
                $sum_material_umum = 0;
                $sum_gaji_karyawan = 0;
                $sum_pesangon = 0;
                $sum_bpjs_perusahaan = 0;
                $sum_perjalanan_dinas = 0;
                $sum_perbaikan_pemeliharaan = 0; 
                $sum_administrasi_dokumen = 0;
                $sum_iuran = 0;
                $sum_penyusutan = 0;
                $sum_bank = 0;
                $sum_leasing = 0;
                $sum_telpon = 0;
                $sum_perbaikan = 0;
                $sum_air = 0;
                $sum_alat = 0;
                $sum_lain = 0;
            @endphp
            @foreach ($data as $key => $item)
                @if($item->jenis_pengeluaran == 'Pembelian Barang')
                    @php
                        $sum_pembelian_barang += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Biaya Transportasi')
                    @php
                        $sum_biaya_transportasi += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Ban')
                    @php
                        $sum_ban += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Pelumas Oli')
                    @php
                        $sum_pelumas_oli += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Material Umum')
                    @php
                        $sum_material_umum += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Gaji Karyawan')
                    @php
                        $sum_gaji_karyawan += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Pesangon')
                    @php
                        $sum_pesangon += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'BPJS Perusahaan')
                    @php
                        $sum_bpjs_perusahaan += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Perjalanan Dinas')
                    @php
                        $sum_perjalanan_dinas += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Perbaikan dan Pemeliharaan')
                    @php
                        $sum_perbaikan_pemeliharaan += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Administrasi Dokumen')
                    @php
                        $sum_administrasi_dokumen += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Iuran Kebersihan')
                    @php
                        $sum_iuran += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Penyusutan')
                    @php
                        $sum_penyusutan += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Bank dan Bunga Kredit')
                    @php
                        $sum_bank += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Leasing')
                    @php
                        $sum_leasing += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Telpon dan Wifi')
                    @php
                        $sum_leasing += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Perbaikan Kantor')
                    @php
                        $sum_perbaikan += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Air dan Listrik')
                    @php
                        $sum_air += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Alat Tulis Kantor')
                    @php
                        $sum_alat += $item->harga_biaya;
                    @endphp
                @endif
                @if($item->jenis_pengeluaran == 'Lain-Lain')
                    @php
                        $sum_lain += $item->harga_biaya;
                    @endphp
                @endif
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        {{ $item->tanggal }}
                    </td>
                    <td>
                        {{ $item->kategori_pengeluaran }}
                    </td>
                    <td>
                        {{ $item->jenis_pengeluaran }}
                    </td>
                    <td>
                        {{ $item->deskripsi}}
                    </td>
                    <td>
                    {{ number_format($item->harga_biaya, 0, ',', '.') }}
                    </td>
                    <td>
                    {{ number_format($item->total, 0, ',', '.') }}
                    </td>
                </tr>
                @php
            $total_harga += $item->total;
            @endphp
            @endforeach

        </tbody>
    </table>

    <table style="width:100%" >
    <thead>
        <tr >
        <th >
        <a style="margin-left: 400px;">Total Pengeluaran Biaya Operasional  : {{ number_format($total_harga, 0, ',', '.') }}</a>
        </th>
        </tr>
     <thead>
    </table>
    <h3>II. Harga Pokok Penjualan</h3>
    <ol>
        <li>Pembelian Barang : {{ number_format($sum_pembelian_barang, 0, ',', '.') }}</li> 
        <li>Biaya Transportasi : {{ number_format($sum_biaya_transportasi, 0, ',', '.') }}</li>
        <li>Ban : {{ number_format($sum_ban, 2, ',', '.') }}</li>
        <li>Pelumas Oli : {{ number_format($sum_pelumas_oli, 2, ',', '.') }} </li> 
        <li>Material Umum : </li>
    </ol>

    <b>Jumlah Beban : </b>
    <h3>Biaya Umum</h3>
    <ol>
        <li>Biaya Gaji Karyawan :  {{ number_format($sum_gaji_karyawan, 0, ',', '.') }} </li>
        <li>Penyisihan Untuk Pesangon :  {{ number_format($sum_pesangon, 0, ',', '.') }}</li>
        <li>Beban BPJS Perusahaan :  {{ number_format($sum_bpjs_perusahaan, 0, ',', '.') }}</li>
        <li>Biaya Perjalanan Dinas:  {{ number_format($sum_perjalanan_dinas, 0, ',', '.') }}</li>
        <li>Biaya Perbaikan Dan Pemeliharaan :  {{ number_format($sum_perbaikan_pemeliharaan, 0, ',', '.') }}</li>
        <li>Beban Administrasi Dokumen :  {{ number_format($sum_administrasi_dokumen, 0, ',', '.') }}</li>
        <li>Beban Iuran Kebersihan : {{ number_format($sum_iuran, 0, ',', '.') }}</li>
        <li>Beban Penyusutan : {{ number_format($sum_penyusutan, 0, ',', '.') }} </li>
        <li>Beban Bank & Bunga Kredit : {{ number_format($sum_bank, 0, ',', '.') }}</li>
        <li>Beban Leasing : {{ number_format($sum_iuran, 0, ',', '.') }}</li>
        <li>Beban Telpon & WIFI :  {{ number_format($sum_telpon, 0, ',', '.') }}</li>
        <li>Beban Perbaikan Kantor :  {{ number_format($sum_perbaikan, 0, ',', '.') }}</li>
        <li>Material Air dan Listrik:  {{ number_format($sum_air, 0, ',', '.') }}</li>
        <li>Beban Alat Tulis Kantor :  {{ number_format($sum_alat, 0, ',', '.') }}</li>
        <li>Beban Lain Lain : {{ number_format($sum_lain, 0, ',', '.') }}</li>
    </ol>
    <b>Jumlah Beban : </b>
</body>

</html>