@extends('layouts.app', ['pageSlug' => 'pengeluaran-bbm'])

@section('content')

@include('sweetalert::alert')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <div class="col-12 text-right">
                        <a href="{{ route('pengeluaran-bbm.create') }}" class="btn btn-sm btn-info">+ Tambah Pengeluaran BBM</a>
                    </div>
                    <br>
                <div class="tabel-responsive">
                    <table class="table tablesorter table-bordered " id="myTable">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Perushaan</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Harga Dasar</th>
                                <th scope="col">PPN</th>
                                <th scope="col">Total</th>
                                <th scope="col">No</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->nama_perusahaan }}</td>
                                <td>{{ number_format($item->qty, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->harga_dasar, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->ppn, 0, ',', '.') }}</td>
                                <td>
                                    {{ number_format($item->total, 0, ',', '.') }}
                                </td>
                                <td>{{ $item->no_pengeluaran}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('pengeluaran-bbm.edit',$item->id) }}">Edit</a>
                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('pengeluaran-bbm.hapus', $item->id) }}">Hapus</a>
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
