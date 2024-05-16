@extends('layouts.app', ['pageSlug' => 'biaya-operasional'])

@section('content')
@include('sweetalert::alert')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                <a href="{{ route('biaya-operasional.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                    <h2 class="text-center">Biaya Operasional</h2>
                    <form action="{{ route('biaya-operasional.store') }}" method="post" enctype="multipart/form-data" id="PengeluaranBBMForm">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal"  class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori Pengeluaran</th>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td style="vertical-align: top;">
                                            <label for="cars">Pilih Kategori :</label>
                                                <select class="form-control" name="kategori_pengeluaran" id="">
                                                <option value="Pokok Penjualan">Pokok Penjualan</option>
                                                <option value="Biaya Umum">Biaya Umum</option>
                                                </select>
                                            </td>
                                            <div class="input-group mb-3">
 
                                            <td style="vertical-align: top;">
                                            <label for="cars">Pilih Jenis Pokok Penjualan :</label>
                                            <select class="form-control" name="jenis_pengeluaran" id="">
                                                <option value="Pembelian Barang">Pembelian Barang</option>
                                                <option value="Biaya Transportasi">Biaya Transportasi</option>
                                                <option value="Ban">Ban</option>
                                                <option value="Pelumas Oli">Pelumas Oli</option>
                                                <option value="Material Umum">Material Umum</option>
                                                </select>
                                            <label for="cars">Pilih Jenis Biaya Umum :</label>
                                            <select class="form-control" name="jenis_pengeluaran" id="">
                                                <option value="Biaya Transportasi">Biaya Transportasi</option>
                                                <option value="Gaji Karyawan">Gaji Karyawan</option>
                                                <option value="Pesangan">Pesangan</option>
                                                <option value="BPJS Perusahaan">BPJS Perusahaan</option>
                                                <option value="Perjalanan Dinas">Perjalanan Dinas</option>
                                                <option value="Perbaikan dan Pemeliharaan">Perbaikan dan Pemeliharaan</option>
                                                <option value="Administrasi Dokumen">Administrasi Dokumen</option>
                                                <option value="Iuran Kebersihan">Iuran Kebersihan</option>
                                                <option value="Penyusutan">Penyusutan</option>
                                                <option value="Bank dan Bunga Kredit">Bank dan Bunga Kredit</option>
                                                <option Leasing="Ban">Leasing</option>
                                                <option value="Telpon dan Wifi">Telpon dan Wifi</option>
                                                <option value="erbaikan Kantor">Perbaikan Kantor</option>
                                                <option value="Air dan Listrik">Air dan Listrik</option>
                                                <option value="Lain-Lain">Lain-Lain</option>
                                            </select>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi ">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="harga_biaya" class="form-control" placeholder="Masukkan Harga " id="harga_dasar"><br>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="total"  class="form-control" placeholder="Harga Total" id="harga_total"><br>
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/number-to-words"></script>

    
@endsection
