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
                <p >Telp : (0542) 2323323, Email: generalsupplier.aliksha@gmail.com</p>
            </div>
            <div class="col" style="text-align: right">
                <br>
                <br>
                <br>
                <br>
                GENERAL SUPLIER<br>
                FUEL TRADING<br>
                TRANSPORTIR BBM<br>
                Web: https://alishagroup.com
            </div>
        </div>
        <hr>
        <hr>
        <div class="header">
            <h3>INVOICE</h3>
        </div>
        <div class="row">
            <div class="col">
                <table border="0" style="width:100%">
                    <tr>
                        <td style="width:50%" >
                        <b>Invoice No</b></td>
                        <td >
                        <b>:  </b></td>
                        <td>
                        <b>{{ $data->no_invoice }}<b>
                        <br>
                        </td>
                    </tr>
                    <tr>
                        <td>No PO</td>
                        <td>:  </td>
                        <td>{{ $data->no_po }}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>:  </td>
                        <td>{{ $data->tanggal }}</td>
                    </tr>
                    <tr>
                        <td>Term</td>
                        <td>:  </td>
                        <td>{{ $data->term }}</td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table border="0" style="width:100%">
                    <tr>
                        <td style="width:50%"><b>Invoice To</b></td>
                        <td><b> : </b></td>
                        <td><b>{{ $data->nama_perusahaan }}</b>
                        <br>
                    </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:  </td>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td>:</td>
                        <td>{{ $data->no_telp }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="table-container">
            <table  border="1" class="table">
                <thead border="1">
                    <tr>
                        <th border="1">No.</th>
                        <th border="1">Description & Part Number</th>
                        <th border="1" >Qty</th>
                        <th border="1" >Satuan</th>
                        <th border="1">Harga Satuan</th>
                        <th border="1">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr border="1">
                        <td border="1">1</td>
                        <td border="1">
                            <a>{{ $data->nama_kapal }}</a>
                            <br>
                            <a>For :</a>
                            <br>
                            <center><b >{{ $data->produk }}</b></center>
                            <a>{{ $data->wilayah_pengisian }}</a>
                            <br>
                            <br>
                            <br>
                            <br>
                        </td>
                        <td border="1">
                            <a > {{ number_format($data->qty, 0, ',', '.') }}</a>
                            <br>
                            <a>PPN 11%</a>
                            </td>
                        <td border="1">
                            <a>{{ $data->satuan }}<a>
                                <br>
                            <a>.......<a>
                        </td>
                        <td border="1">
                           <a> {{ number_format($data->harga_dasar, 0, ',', '.') }} </a>
                           <br>
                           <a> {{ number_format($data->ppn, 0, ',', '.') }} </a>
                        </td>
                        <td border="1"> 
                            <a>{{ number_format($data->harga, 0, ',', '.') }}</a>
                            <br>
                           <a> {{ number_format($data->jumlah_ppn, 0, ',', '.') }} </a>
                        </td>
                    </tr>
                    <tr>
                        <td  border="1" colspan="5">Total</td>
                        <td  border="1" colspan="6">{{ number_format($data->total, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td  border="1">Terbilang</td>
                        <td  border="1" colspan="6">
                        <span ><i>{{ $data->terbilang }}</i></span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table border="1" style="width:100%">
                    <tr>
                        
                        <td style="width:50%" ><b>PLEASE TRANSFER TO THE FOLLOWING ACCOUNT</b>
                    </td>
                    </tr>
                    <tr>
                        <td style="width:50%; border: none;" ><br></td>
                    </tr>
                    <tr>
                        <td style="width:50%; border: none;">
                        <span style="margin-left: 3px;">BANK NAME</span>
                        <span style="margin-left: 60px;"><i>: </i></span>
                        <span style="margin-left: 55px;"><i>Mandiri KCP Tangerang Ciputat Center 16516</i></span>

                      </td>
                    </tr>
                    <tr>
                        <td style="width:50%; border: none;" >
                        <span style="margin-left: 3px;">ACCOUNT HOLDER</span>
                        <span style="margin-left: 12px;"><i>: </i></span>
                        <span style="margin-left: 55px;"><i>PT Alisha Karunia Perdana</i></span>

                    </td>
                    </tr>
                    <tr>
                    <td style="width:50%; border: none;" >
                        <span style="margin-left: 3px;">ACC HOLDER</span>
                        <span style="margin-left: 55px;"><i>:</i></span>
                        <span style="margin-left: 52px;"><i>164.000.7808.001</i></span>

                    </td>
                    <tr>
                        <td style="width:50%; border: none;" ><br></td>
                    </tr>
                </table>
        </div>
        <div class="footer">
           <b>RECEIVED & CHECKED BY</b>
           <br>
           <b>DITERIMA & DICEK OLEH</b>
        </div>
        <div class="footerr">
           <b>AUTORIZHED BY</b>
           <br>
        </div>
        <div class="img">
            <img src="{{ asset('img/logoo.jpg') }}" width="260" alt=""><br>
        </div>
        <div class="b">
            <b><u>HJ. RATNA PUSPITARINI S,S.P</u><b>

        </div>
 
        <div class="imgg">
        <img src="{{ asset('img/logo2.png') }}" width="700" alt=""><br>
        </div>

    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/number-to-words"></script>

    <script>
        function formatRupiah(angka) {
            var number_string = angka.toString();
            var sisa = number_string.length % 3;
            var rupiah = number_string.substr(0, sisa);
            var ribuan = number_string.substr(sisa).match(/\d{3}/g);
            
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            return rupiah + ',00';
        }

        function terbilang(angka) {
            // Convert angka to string if it's not already
            angka = Math.floor(angka);
            console.log(angka);

            // Remove non-numeric characters and parse as float
            var bilangan = angka;
            var kalimat = '';
            var angkaHuruf = [
                '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'
            ];
            var angkaBelasan = [
                '', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
            ];
            var angkaRibuan = [
                '', 'Thousand', 'Million', 'Billion', 'Trillion', 'Quadrillion', 'Quintillion', 'Sextillion', 'Septillion', 'Octillion'
            ];

            if (bilangan === 0) {
                return 'Zero Rupiah';
            }

            var chunks = [];
            while (bilangan > 0) {
                chunks.push(bilangan % 1000);
                bilangan = Math.floor(bilangan / 1000);
            }

            for (var i = chunks.length - 1; i >= 0; i--) {
                if (chunks[i] === 0) continue;
                var chunkText = '';
                var chunk = chunks[i];

                var ratusan = Math.floor(chunk / 100);
                var sisa = chunk % 100;

                if (ratusan > 0) {
                    chunkText += angkaHuruf[ratusan] + ' Hundred ';
                }

                if (sisa < 10) {
                    chunkText += angkaHuruf[sisa];
                } else if (sisa < 20) {
                    chunkText += angkaBelasan[sisa - 10];
                } else {
                    var puluhan = Math.floor(sisa / 10);
                    var satuan = sisa % 10;
                    chunkText += angkaBelasan[puluhan] + ' ' + angkaHuruf[satuan];
                }

                kalimat += chunkText + ' ' + angkaRibuan[i] + ' ';
            }

            return kalimat.trim() + ' Rupiah';
        }


    </script>
