<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Jalan</title>
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
    <Center> <h1>Laporan Surat Jalan</h1></Center> 
    <table style="width:100%">
        <thead>
            <tr style="width:100%">
                <th style="width:5%">#</th>
                <th style="width:30%" >Kepada</th>
                <th >Up</th>
                <th style="width:20%">tanggal</th>
                <th style="width:50%">No Surat</th>
                <th style="width:60%">No PO </th>
                <th style="width:60%">Tujuan</th>
                <th style="width:60%">Contact</th>
                <th style="width:60%">Nomor Telpon</th>
                <th style="width:60%">Qty</th>
                <th style="width:60%">Jenis </th>
                <th style="width:60%">Nama Transportir</th>
                <th style="width:60%">Segel Atas</th>
                <th style="width:60%">Segel Bawah</th>
                <th style="width:60%">Plat</th>
                <th style="width:">Pengirim</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->kepada }}
                                        </td>
                                        <td>
                                            {{ $item->up }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal }}
                                        </td>
                                        <td>
                                            {{ $item->no_surat }}
                                        </td>
                                        <td>
                                            {{ $item->no_po }}
                                        </td>
                                        <td>
                                            {{ $item->tujuan }}
                                        </td>
                                        <td>
                                            {{ $item->contact }}
                                        </td>
                                        <td>
                                            {{ $item->no_telp }}
                                        </td>
                                        <td>
                                            {{ $item->qty }}
                                        </td>
                                        <td>
                                            {{ $item->jenis }}
                                        </td>
                                        <td>
                                            {{ $item->nama_transportir }}
                                        </td>
                                        <td>
                                            {{ $item->segel_atas }}
                                        </td>
                                        <td>
                                            {{ $item->segel_bawah }}
                                        </td>
                                        <td>
                                            {{ $item->plat }}
                                        </td>
                                        <td>
                                            {{ $item->pengirim }}
                                        </td>

                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
