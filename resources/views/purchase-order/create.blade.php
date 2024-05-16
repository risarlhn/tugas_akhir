@extends('layouts.app', ['pageSlug' => 'purchase-order'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                <div class="card-body">
                    <a href="{{ route('purchase-order.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                    </div>
                    <div class="col-12 text-center">
                            <h2>FORM PURCHASE ORDER</h2>
                    </div>
                </div>
                    <form action="{{ route('purchase-order.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Perusahaan</label>
                                    <input type="text" value="{{ auth::user()->name }}" readonly class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="namaperusahaan" class="form-label">Nama Pegawai</label>
                                    <input type="text" name="nama_perusahaan" class="form-control" id="namaperusahaan"
                                        placeholder="Masukkan nama perusahaan anda">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="namaperusahaan" class="form-label">File Purchase Order</label>
                                    <input type="file" name="file" class="form-control" id="namaperusahaan" accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-7 text-right">
                                <button type="submit" class="btn btn-info">Kirim</button>
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
