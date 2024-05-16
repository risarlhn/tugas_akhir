<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->no_invoice }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya CSS untuk tampilan invoice */
        .container {
            padding: 20px;
            background-color: #fffff;
    

        }
        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
           
            
        }
        .table-container {
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            margin-left: 100px;
            text-align: left;
        }

        .footerr{
            margin-right: 100px;
            text-align: right;
        }
        .img{
            margin-right: 50px;
            text-align: right;
        }
        .b{
            margin-top: 10px;
            margin-right: 45px;
            text-align: right;
        }

        .imgg{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('img/logo.png') }}" width="400" alt=""><br>
            </div>
            <div class="col" style="text-align: right; margin-right: 100px;">
                <br>
                <br>
                <br>
                <br>
                <h2>Agen / Transportir</h2>
                <br>
            </div>
        </div>
        <hr>
        <hr>
        <div class="row">
            <div class="col">
                <table  border="1" style="width:100%">
                    <tr border="0">
                        <td colspan="3" >
                            <center><b>Pengantar Pengiriman BBM Industri</b></center>
                            </td>
                    </tr>
                </table>
                <table border="1" style="width:100%">
                    <tr border="1" >
                    <td>
                    <a style="margin-left: 5px;"> Kepada </a> <a style="margin-left: 10px;"> :</a> <a style="margin-left: 10px;"> {{ $data->kepada }}</a>   <a style="margin-left: 300px;"> Tanggal </a> <a style="margin-left: 82px;"> :</a> <a style="margin-left: 10px;">{{ strftime('%d %B %Y', strtotime($data->tanggal)) }}</a> 
                    <br>
                    <a style="margin-left: 478px;"> No. Surat Jalan </a> <a style="margin-left: 30px;"> :</a> <a style="margin-left: 10px;">{{ $data->no_surat }}</a> 
                    <br>
                    <a style="margin-left: 478px;"> No. PO </a> <a style="margin-left: 85px;"> :</a> <a style="margin-left: 10px;"> {{ $data->no_po }}</a>
                    <br>
                    <a style="margin-left: 5px;"> Up </a> <a style="margin-left: 43px;"> :</a> <a style="margin-left: 10px;"> {{ $data->up }}</a> <a style="margin-left: 376px;"> Tujuan Pengiriman </a> <a style="margin-left: 5px;"> :</a> <a style="margin-left: 10px;"> {{ $data->tujuan }}</a>
                    <br>
                    <br>
                    <a style="margin-left: 478px;"> Contact Person </a> <a style="margin-left: 30px;"> :</a> <a style="margin-left: 10px;"> {{ $data->contact }}</a>
                    <a style="margin-left: 478px;"> No. Telp </a> <a style="margin-left: 79px;"> :</a> <a style="margin-left: 10px;"> {{ $data->no_telp }}</a>
                    <br>
                    <br>
                    </td>
                    </tr>
                </table> 
                <table  border="1" style="width:100%">
                    <tr border="0">
                        <td style="width:5% " >
                        <b style="margin-left: 10px;"> No.</b>
                        </td>
                        <td style="width:20%">
                        <center><b> QUANTITY</b></center>
                    </td>
                        <td style="width:30%">
                        <center><b> JENIS BARANG</b></center>
                    </td>
                        <td style="width:40%">
                        <center><b>NAMA TRANSPORTIR</b></center>
                    </td>
                    </tr>
                    <tr>
                        <td >
                            <a style="margin-left: 23px;">1 </a>
                        </td>
                        <td>
                        <center><a>{{ number_format($data->qty, 0, ',', '.') }}</a></center>
                        </td>
                        <td>
                        <center><a> {{ strtoupper($data->jenis) }}</a></center>
                        </td>
                        <td>
                        <center><a style="margin-left: 23px;">{{ strtoupper($data->nama_transportir) }}</a></center>
                        </td>
                    </tr>
                </table> 
                <table border="1" style="width:100%">
                    <tr border="1">
                        <td >
                           <center> <a> Berita Acara Penerimaan BBM Industri</a> </center>
                           <center> <a> BBM Industri telah diterima dan telah diperiksa sebagaimana berikut ini</a> </center>

                        </td>
                    </tr>
                </table>
                <table border="1" style="width:100%">
                    <td style="width:5% " >
                    <span style="margin-left: 23px;">1</span>                        
                    <br>
                    <span style="margin-left: 23px;">2</span>                        
                        <br>
                        <br>
                        <span style="margin-left: 23px;">2</span>                        
                        <br>
                        <span style="margin-left: 23px;">4</span>                        
                        <br>
                        <span style="margin-left: 23px;">5</span>                        

                        </td>
                    <td style="width:35%" >
                        <span style="margin-left: 5px;">Mutu Barang / Kualitas BBM Industri </span>
                        <br>
                        <span style="margin-left: 5px;">Jumlah / Kualitas BBM Industri </span>
                        <br>
                        <span style="margin-left: 5px;">Ukuran Terra Tangki (T2) Sesuai </span>
                        <br>
                        <span style="margin-left: 5px;">Mertologi Yang Berlaku :</span>  <span style="margin-left: 120px;">mm</span>
                        <br>
                        <span style="margin-left: 5px;">Segel Atas </span> <span style="margin-left: 45px;"> : {{ strtoupper($data->segel_atas) }}</span>
                        <br>
                        <span style="margin-left: 5px;">Segel Bawah</span> </span> <span style="margin-left: 30px;"> : {{ strtoupper($data->segel_bawah) }}</span>
                    </td>
                    <td style="width:15%" >
                        <a style="margin-left: 5px;">A. Baik </a>
                        <br>
                        <a style="margin-left: 5px;">A. Sesuai </a>
                        <br>
                        <br>
                        <a style="margin-left: 5px;">............................</a>
                        <br>
                        <a style="margin-left: 5px;">A. Baik </a>
                        <br>
                        <a style="margin-left: 5px;">A. Baik </a>
                    </td>
                    <td style="width:15%" ></td>
                    <td style="width:30%" >
                        <a style="margin-left: 5px;">B. Buruk </a>
                        <br>
                        <a style="margin-left: 5px;">B. Tidak Sesuai</a>
                        <br>
                        <a style="margin-left: 5px;">Ukuran (Sounding) Pada Saat</a>
                        <br>
                        <a style="margin-left: 5px;">Pembongkaran : .......................</a>
                        <br>
                        <a style="margin-left: 5px;">B. Rusak / Terputus </a>
                        <br>
                        <a style="margin-left: 5px;">B. Rusak / Terputus</a>
                    </td>
                </table >
                <table border="1" style="width:100%">
                    <td border="0" style="width:95%" >
                    <br>
                        <a style="margin-left: 23px; ">1.</a> <a style="margin-left: 20px;">Tanggal / Jam Tiba Di Lokasi </a> <a style="margin-left: 175px;"> :</a> <a style="margin-left: 70px;"> ...........................................................................</a>
                        <br>
                        <a style="margin-left: 23px; ">2.</a> <a style="margin-left: 20px;">Tanggal / Jam Bongkar Di Lokasi </a> <a style="margin-left: 146px;"> :</a> <a style="margin-left: 70px;"> ...........................................................................</a>
                        <br>
                        <a style="margin-left: 23px; ">3.</a> <a style="margin-left: 20px;"> No Plat Kendaraan </a> <a style="margin-left: 243px;"> :</a> <a style="margin-left: 70px;"> {{ strtoupper($data->plat) }}</a>
                    <br>
                    <br>
                    </td>
                </table>
                <table border="1" style="width: 100%" >
                    <tr >
                        <td border="1">
                            <br>
                           <center> <a> Tidak menerima keluhan apabila BBM Industri telah menerima dan dipindahkan</a> </center>
                           <center> <a> Ke tempat penampungan customer serta surat jalan telah ditanda tangani </a> </center>
                           <center> <a> oleh kedua belah pihak</a> </center>

                        </td>
                    </tr>
                </table>
                <table border="1" style="width: 100%" >
                    <tr border="1">
                        <td border="1">
                        <br>
                        <a style="margin-left: 100px;"> Dikirim Oleh,</a> <a style="margin-left: 500px;"> Diterima Oleh,</a>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <a style="margin-left: 45px;">Nama: {{ strtoupper($data->pengirim) }}</a> <a style="margin-left: 500px;"> Nama :.................................................</a>
                        <br>
                        <br>


                        </td>
                    </tr>
                </table>
                <table border="1"style="width: 100%" >
                    <tr >
                        <td border="1">
                            <center> <a> Berita Acara Penerimaan BBM Industri</a> </center>
                            <center> <a> BBM Industri telah diterima dan telah diperiksa sebagaimana berikut ini</a> </center>
                        </td>
                    </tr>
                </table>
                
            </div>
        </div>
