@extends('layouts.app', ['pageSlug' => 'biaya-operasional'])

@section('content')
    @include('sweetalert::alert')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
    
                <div class="card-body">
                <a href="{{ route('biaya-operasional.index') }}" class="btn btn-sm btn-danger">Kembali</a>

                    <h2 class="text-center">Edit Biaya Operasional</h2>
                    <form action="{{ route('biaya-operasional.update', $biayaOperasional->id) }}" method="post"
                        enctype="multipart/form-data" id="biayaOperasionalForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ $biayaOperasional->tanggal }}">
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
                                                <select class="form-control" name="kategori_pengeluaran" value="{{ $biayaOperasional->kategori_pengeluaran }}" >
                                                <option >Pilih Kategori :</option>
                                                <option value="Pokok Penjualan">Pokok Penjualan</option>
                                                <option value="Biaya Umum">Biaya Umum</option>
                                                </select>
                                            </td>
                                            <div class="input-group mb-3">
                                            <td style="vertical-align: top;">
                                            <select class="form-control" name="jenis_pengeluaran"  value="{{ $biayaOperasional->jenis_pengeluaran }}">
                                            <option >Pilih Jenis Pengeluaran :</option>
                                                <option value="Pembelian Barang">Pembelian Barang</option>
                                                <option value="Biaya Transportasi">Biaya Transportasi</option>
                                                <option value="Ban">Ban</option>
                                                <option value="Pelumas Oli">Pelumas Oli</option>
                                                <option value="Material Umum">Material Umum</option>
                                                <option value="Gaji Karyawan">Gaji Karyawan</option>
                                                <option value="Pesangon">Pesangon</option>
                                                <option value="BPJS Perusahaan">BPJS Perusahaan</option>
                                                <option value="Perjalanan Dinas">Perjalanan Dinas</option>
                                                <option value="Perbaikan dan Pemeliharaan">Perbaikan dan Pemeliharaan</option>
                                                <option value="Administrasi Dokumen">Administrasi Dokumen</option>
                                                <option value="Iuran Kebersihan">Iuran Kebersihan</option>
                                                <option value="Penyusutan">Penyusutan</option>
                                                <option value="Bank dan Bunga Kredit">Bank dan Bunga Kredit</option>
                                                <option Leasing="Ban">Leasing</option>
                                                <option value="Telpon dan Wifi">Telpon dan Wifi</option>
                                                <option value="Perbaikan Kantor">Perbaikan Kantor</option>
                                                <option value="Air dan Listrik">Air dan Listrik</option>
                                                <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                                                <option value="Lain-Lain">Lain-Lain</option>/option>
                                            </select>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi"  value="{{ $biayaOperasional->deskripsi }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="harga_biaya" class="form-control" placeholder="Masukkan Harga " id="harga_dasar"  value="{{ $biayaOperasional->harga_biaya }}"><br>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="total"  class="form-control" placeholder="Harga Total" id="harga_total"  value="{{ $biayaOperasional->total }}"><br>
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-info">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
