<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran Biaya Operasional</title>
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


    </style>
</head>
<body>
    <center><h1>Laporan Biaya Operasional</h1></center>
    <table  style="width:100%" >
        <thead class=" table-bordered" >
          <tr>
            <th style="width:5%" >#</th>
            <th style="width:30%">Tanggal</th>
            <th style="width:40%">Kategori Pengeluaran</th>
            <th style="width:40%">Jenis Pengeluaran</th>
            <th style="width:50%">Deskripsi</th>
            <th style="width:30%">Harga</th>
            <th style="width:30%">Total</th>
          </tr>
        </thead>
          <tbody>
          @php
            $total_harga = 0;
            @endphp
             @foreach ($data as $key => $item)
             <tr>
             <td>{{ $key + 1 }}</td>
             <td>{{ $item->tanggal }}</td>
             <td>{{ $item->kategori_pengeluaran }}</td>
             <td>{{ $item->jenis_pengeluaran }}</td>
             <td>{{ $item->deskripsi}}</td>
             <td>{{ number_format($item->harga_biaya, 0, ',', '.') }}</td>
             <td>{{ number_format($item->total, 0, ',', '.') }}</td>
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
            <h3 style="margin-left: 450px;">Total Pengeluaran Biaya Operasional   : {{ number_format($total_harga, 0, ',', '.') }}</h3>
            </th>
        </tr>
        <thead>
    </table> 

    <h3>II. Harga Pokok Penjualan</h3>
    <ol>
        <li>Pembelian Barang : </li>
        <li>Biaya Transportasi : </li>
        <li>Ban : </li>
        <li>Pelumas Oli : </li>
        <li>Material Umum : </li>
    </ol>
        <b style="margin-left: 300px;">Jumlah Beban : </b>

    <h3>Biaya Umum</h3>
    <ol>
        <li>Biaya Gaji Karyawan : </li>
        <li>Penyisihan Untuk Pesangon :</li>
        <li>Beban BPJS Perusahaan : </li>
        <li>Biaya Perjalanan Dinas: </li>
        <li>Biaya Perbaikan Dan Pemeliharaan : </li>
        <li>Beban Administrasi Dokumen :</li>
        <li>Beban Iuran : </li>
        <li>Beban Penyusutan : </li>
        <li>Beban Bank & Bunga Kredit : </li>
        <li>Beban Leasing :</li>
        <li>Beban Telpon & WIFI : </li>
        <li>Beban Perbaikan Kantor : </li>
        <li>Material Air dan Listrik: </li>
        <li>Beban Alat Tulis Kantor : </li>
        <li>Beban Lain Lain : </li>
        <li>Material Umum : </li>
    </ol>
    <b style="margin-left: 300px;">Jumlah Beban : </b>

</body>

</html>
