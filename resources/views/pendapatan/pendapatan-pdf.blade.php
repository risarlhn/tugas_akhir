
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemasukan</title>
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
</head>
<body>
    <Center> <h1>Laporan Pemasukan</h1></Center> 
    <table style="width:100%">
        <thead>
          <tr>
            <th style="width:5%">No.</th>
            <th style="width:30%">Nama Perusahaan</th>
            <th style="width:20%">Tanggal</th>
            <th style="width:20%">No Invoice</th>
            <th style="width:20%">Nama Kapal/Site</th>
            <th style="width:10%">qty</th>
            <th style="width:10%">satuan</th>
            <th style="width:10%">harga</th>
            <th style="width:30%">Jumlah Harga Dasar</th>
            <th style="width:30%">Jumlah PPN</th>
            <th style="width:30%">Total</th>                           
          </tr>
        </thead>
        <tbody>
            @php
            $total_harga = 0;
            @endphp
            @foreach ($invoice as $key => $item)
            <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->nama_perusahaan }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->no_invoice }}</td>
            <td>{{ $item->nama_kapal }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ number_format($item->harga_dasar, 0, ',', '.') }}</td>
            <td>{{ number_format($item->jumlah_harga_dasar, 0, ',', '.') }}</td>
            <td>{{ number_format($item->jumlah_ppn, 0, ',', '.') }}</td>
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
        <h2 style="margin-left: 1350px;">Total Pemasukan  : {{ number_format($total_harga, 0, ',', '.') }}</h2>
        </th>
        </tr>
        <thead>
    </table>        
</body>
<body>

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
            </tr>
        </thead>
        <tbody>
        @php
            $total_harga = 0;
            @endphp
        @foreach ($pengeluaran as $key => $item)
            <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->nama_perusahaan }}</td>
            <td>{{ number_format($item->qty, 0, ',', '.') }}</td>
            <td>{{ number_format($item->harga_dasar, 0, ',', '.') }}</td>
            <td>{{ number_format($item->ppn, 0, ',', '.') }}</td>
            <td>{{ number_format($item->total, 0, ',', '.') }}</td>
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
        <h2 style="margin-left: 1340px;">Total Pembelian  : {{ number_format($total_harga, 0, ',', '.') }}</h2>
        </th>
        </tr>
     <thead>
    </table>
</body>


</html>
