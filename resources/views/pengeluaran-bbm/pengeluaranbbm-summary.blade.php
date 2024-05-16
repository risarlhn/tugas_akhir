<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PEMBELIAN BBM</title>
</head>
<style>
    table {
            border-collapse: collapse;

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
<body>
<Center> <h2>LAPORAN PEMBELIAN BBM</h2></Center> 
    <table  style="width:100%">
        <thead class=" text-primary">
            <tr>
            <th style="width:5%">#</th>
            <th style="width:15%">Tanggal</th>
            <th style="width:40%">Nama Perushaan</th>
            <th style="width:15%">QTY</th>
            <th style="width:20%">Harga Dasar</th>
            <th style="width:20%">PPN</th>
            <th style="width:20%">Total</th>
            <th style="width:15%">No</th>
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
            <td>{{ $item->nama_perusahaan }}</td>
            <td>{{ number_format($item->qty, 0, ',', '.') }}</td>
            <td>{{ number_format($item->harga_dasar, 0, ',', '.') }}</td>
            <td>{{ number_format($item->ppn, 0, ',', '.') }}</td>
            <td>{{ number_format($item->total, 0, ',', '.') }}</td>
            <td>{{ $item->no_pengeluaran}}</td>

            </tr>
            @php
        // Akumulasi harga dasar
        $total_harga += $item->total;
        @endphp
        @endforeach         
        </tbody>
    </table>
    <table style="width:100%" >
    <thead>
        <tr >
        <th >
        <a style="margin-left: 500px;">Total Pembelian  : {{ number_format($total_harga, 0, ',', '.') }}</a>
        </th>
        </tr>
     <thead>
    </table>
</body>

</html>