@extends('layouts.app', ['pageSlug' => 'surat-jalan'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                <a href="{{ route('surat-jalan.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                    <h2 class="text-center">SURAT JALAN</h2>
                    <form action="{{ route('surat-jalan.store') }}" method="post" enctype="multipart/form-data" id="suratJalanForm">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Kepada</label>
                                    <input type="text" name="kepada" class="form-control" placeholder="Masukkan Penerima" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">UP</label>
                                    <input type="text" name="up" class="form-control" id="" placeholder="" >
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" placeholder="Masukkan Nama Customer" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">No Surat Jalan</label>
                                    <input type="text" name="no_surat" value="{{ $newSuratJalanNumber }}" readonly class="form-control" id="no_surat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">No PO</label>
                                    <input type="text" name="no_po" class="form-control" placeholder="Masukkan No. PO" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tujuan Pengirim</label>
                                    <input type="text" name="tujuan" class="form-control" placeholder="Masukkan Tujuan Pengiriman" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Contact Person</label>
                                    <input type="text" name="contact" class="form-control" placeholder="Masukkan Contact Person" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">No Telp</label>
                                    <input type="text" name="no_telp" class="form-control" placeholder="Masukkan No. Telp" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%">No</th>
                                            <th style="width: 25%">QUANTITY</th>
                                            <th style="width: 25%">JENIS BARANG</th>
                                            <th style="width: 25%">NAMA TRANSPORTIR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <input type="number" name="qty" class="form-control" placeholder="Masukkan Jumlah" required><br>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="jenis" class="form-control" placeholder="Masukkan Jenis Barang" required>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="nama_transportir" class="form-control" placeholder="Masukkan Nama Transportir" required>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%">Segel Atas</th>
                                            <th style="width: 25%">Segel Bawah</th>
                                            <th style="width: 25%">No. Plat Kendaraan</th>
                                            <th style="width: 25%">Dikirim Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="segel_atas" class="form-control" placeholder="Masukkan Nomor Segel Atas" required><br>
                                            </td>
                                            <td>
                                                <input type="text" name="segel_bawah" class="form-control" placeholder="Masukkan Nomor Segel Bawah" required><br>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="plat" class="form-control" placeholder="Masukkan No. Plat Kendaraan" required>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="pengirim" class="form-control" placeholder="Masukkan Nama Pengirim" required>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
