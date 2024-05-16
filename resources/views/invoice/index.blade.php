@extends('layouts.app', ['pageSlug' => 'invoice'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                        </div>
                        @if (auth()->user()->role == 'ADMIN')
                        <div class="col-4 text-right">
                            <a href="{{ route('invoice.create') }}" class="btn btn-sm btn-info"  >+Tambah Invoice</a>                        </div>
                        @endif
                    </div>
                    <br>
                    <div class="table-responsive table-full-width">
                        <table class="table table-bordered " id="myTable"  >
                            <thead class="text-primary ">
                                <tr class="">
                                    <th >No.</th>
                                    <th scope="col">No Invoice</th>
                                    <th style="width: 100%" >Nama Perusahaan</th>
                                    <th scope="">Alamat</th>
                                    <th scope="col">No Purhase Order</th>
                                    <th scope="col">Tanggal</th>
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
                                    @if (auth()->user()->role == 'ADMIN' )
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->no_invoice }}
                                        </td>
                                        <td>
                                            {{ $item->nama_perusahaan }}
                                        </td>
                                        <td>
                                            {{ $item->alamat }}
                                        </td>
                                        <td>
                                            {{ $item->no_po }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal }}
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
                                        {{ number_format($item->qty, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ $item->satuan }}
                                        </td>
                                        <td>
                                        {{ number_format($item->harga, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->harga_dasar, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->ppn, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->jumlah_harga_dasar, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->jumlah_ppn, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ number_format($item->total, 0, ',', '.') }}
                                        </td>
                                        
                                        @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'DIREKTUR')
                                        <td>
                                            @if (auth()->user()->role == 'ADMIN')
                                            <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only " href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('invoice.edit',$item->id) }}">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');"
                                                href="{{ route('invoice.hapus', $item->id) }}">Hapus</a>
                                                <a class="dropdown-item" href="{{ route('invoice.pdf', $item->id) }}">Detail</a>
                                            </div>
                                            </div>
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            var hargaTotal = hargaDasar * qty;
            var jumlahPpn = ppn * qty;
            var jumlahHargaDasar = hargaTotal;
            var total = hargaTotal + jumlahPpn;

            // Mengisi nilai ke input yang readonly
            document.getElementById('ppn').value = formatRupiah(ppn);
            document.getElementById('harga_total').value = formatRupiah(hargaTotal);
            document.getElementById('jumlah_ppn').value = formatRupiah(jumlahPpn);
            document.getElementById('jumlah_harga_dasar').value = formatRupiah(jumlahHargaDasar);
            document.getElementById('total').value = formatRupiah(total);

            document.getElementById('terbilang').value = terbilang(total);
        }

        // Panggil fungsi hitungHarga saat input qty atau harga dasar berubah
        document.getElementsByName('qty')[0].addEventListener('input', hitungHarga);
        document.getElementById('harga_dasar').addEventListener('input', hitungHarga);
    </script>

@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endpush


