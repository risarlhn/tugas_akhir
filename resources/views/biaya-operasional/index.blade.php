@extends('layouts.app', ['pageSlug' => 'biaya-operasional'])

@section('content')

@include('sweetalert::alert')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                    <div class="col-14 text-right">
                        <a href="{{ route('biaya-operasional.create') }}" class="btn btn-sm btn-info">+ Tambah Biaya Operasional</a>
                    </div>
                    <br>
                <div class="table-responsive">
                    <table class="table tablesorter table-bordered " id="myTable">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kategori Pengeluaran</th>
                                <th scope="col">Jenis Pengeluaran</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->kategori_pengeluaran }}</td>
                                <td>{{ $item->jenis_pengeluaran }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ number_format($item->harga_biaya, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item"
                                                href="{{ route('biaya-operasional.edit',$item->id) }}">Edit</a>
                                            <a class="dropdown-item"
                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                href="{{ route('biaya-operasional.hapus', $item->id) }}">Hapus</a>
                                           
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endpush
