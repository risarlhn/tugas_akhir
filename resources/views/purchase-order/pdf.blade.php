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
<center><h2>Laporan Purchase Order</h2></center>
    <table  style="width:100%" >
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Nama Perusahaan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nama_perusahaan }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
