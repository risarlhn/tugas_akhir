@extends('layouts.app', ['pageSlug' => 'user'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                    <form action="{{ route('user.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="nama" value="{{ $data->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{ $data->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Role</label>
                                    <select class="form-control" name="role" id="">
                                        <option value="CUSTOMER" {{ $data->role == "CUSTOMER" ? "selected" : "" }}>CUSTOMER</option>
                                        <option value="ADMIN" {{ $data->role == "ADMIN" ? "selected" : "" }}>ADMIN</option>
                                        <option value="DIREKTUR" {{ $data->role == "DIREKTUR" ? "selected" : "" }}>DIREKTUR</option>
                                        <option value="DIREKTUR" {{ $data->role == "KEUANGAN" ? "selected" : "" }}>KEUANGAN</option>
                                    </select>
                                </div>
                                <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-sm btn-infi">Ubah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
