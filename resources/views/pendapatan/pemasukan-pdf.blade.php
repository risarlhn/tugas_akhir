
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Purchase Order</title>
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
    <Center> <h1>Laporan Invoice</h1></Center> 
    <table style="width:100%">
        <thead>
            <tr>
            <th >No.</th>
             <th scope="col">Nama Perusahaan</th>
             <th scope="col">Alamat</th>
             <th scope="col">No Telp</th>
            <th scope="col">No Purhase Order</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">No Invoice</th>
                                    <th scope="col">Term</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Nama Kapal/Site</th>
                                    <th scope="col">Wilayah Pengisian</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">satuan</th>
                                    <th scope="col">harga</th>
                                    <th scope="col">harga dasar</th>
                                    <th scope="col">PPN</th>
                                    <th scope="col">Jumlah Harga Dasar</th>
                                    <th scope="col">Jumlah PPN</th>
                                    <th scope="col">Total</th>
                                    
            </tr>
        </thead>
        <tbody>
            @php
            $total_harga = 0;
            @endphp
            @foreach ($data as $key => $item)
            <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->nama_perusahaan }}
                                        </td>
                                        <td>
                                            {{ $item->alamat }}
                                        </td>
                                        <td>
                                            {{ $item->no_telp }}
                                        </td>
                                        <td>
                                            {{ $item->no_po }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal }}
                                        </td>
                                        <td>
                                            {{ $item->no_invoice }}
                                        </td>
                                        <td>
                                            {{ $item->term }}
                                        </td>
                                        <td>
                                            {{ $item->produk }}
                                        </td>
                                        <td>
                                            {{ $item->nama_kapal }}
                                        </td>
                                        <td>
                                            {{ $item->wilayah_pengisian }}
                                        </td>
                                        <td>
                                            {{ $item->qty }}
                                        </td>
                                        <td>
                                            {{ $item->satuan }}
                                        </td>
                                        <td>
                                        {{ number_format($item->harga, 2, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->harga_dasar, 2, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->ppn, 2, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->jumlah_harga_dasar, 2, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->jumlah_ppn, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ number_format($item->total, 2, ',', '.') }}
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
            <h2 style="margin-left: 1500px;">Total Pemasukan   : {{ number_format($total_harga, 0, ',', '.') }}</h2>
            </th>
        </tr>
        <thead>
    </table> 
</body>

</html>
