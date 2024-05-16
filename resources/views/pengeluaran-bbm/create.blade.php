@extends('layouts.app', ['pageSlug' => 'pengeluaran-bbm'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                            <a href="{{ route('pengeluaran-bbm.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                    <h2 class="text-center">PENGELUARAN BBM</h2>
                    <form action="{{ route('pengeluaran-bbm.store') }}" method="post" enctype="multipart/form-data" id="PengeluaranBBMForm">
                        @csrf
                        <div class="row">
                            <div class="col">
                                 <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id=""
                                        placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan"  class="form-control" placeholder="Masukkan Nama Perusahaan" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>QTY</th>
                                            <th>Harga </th>
                                            <th>PPN</th>
                                            <th>Total</th>
                                            <th>No</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td style="vertical-align: top;">
                                            <input type="text" name="qty" class="form-control" placeholder=" Masukkan QTY" id="qty" required>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="harga_dasar" class="form-control" placeholder="Masukkan Harga" id="harga_dasar" required>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="ppn"  readonly class="form-control" placeholder="Masukkan PPN " id="ppn" required><br>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="total"  readonly class="form-control" placeholder=" Total" id="total" required><br>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="no_pengeluaran"  class="form-control" placeholder="Masukkann Nomor" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                        <div class="row">
                            <div class=" col-12 text-center">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

        // Fungsi untuk menghitung harga total dan PPN berdasarkan harga dasar dan qty
        function hitungHarga() {
            var hargaDasar = parseFloat(document.getElementById('harga_dasar').value);
            var qty = parseFloat(document.getElementsByName('qty')[0].value);
            var ppn = hargaDasar * 0.11;
            var total = hargaDasar + ppn

            // Mengisi nilai ke input yang readonly
            document.getElementById('ppn').value = formatRupiah(ppn);
            document.getElementById('total').value = formatRupiah(total);
        }

        // Panggil fungsi hitungHarga saat input qty atau harga dasar berubah
        document.getElementsByName('qty')[0].addEventListener('input', hitungHarga);
        document.getElementById('harga_dasar').addEventListener('input', hitungHarga);
    </script>
@endsection
