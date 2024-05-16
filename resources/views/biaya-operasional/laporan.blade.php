@extends('layouts.app', ['pageSlug' => 'laporan-biayaoperasional'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <br>
                <div class="card-body">
                <div>
                <form action="{{ route('biaya-operasional.filter') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="start_date">Tanggal Awal:</label>
                            <input type="date" name="startDate" class="form-control" value="{{ request('startDate') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="end_date">Tanggal Akhir:</label>
                            <input type="date" name="endDate" class="form-control" value="{{ request('endDate') }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-sm btn-info mt-4"> <i class="fas fa-filter"></i> filter</button>
                            <a href="{{ route('biaya-operasional.cetak') }}?startDate={{ request('startDate') }}&endDate={{ request('endDate') }}"  class="btn btn-sm btn-info mt-4">
                                 <i class="fas fa-print"></i> Cetak PDF
                            </a>                            
                        </div>
                    </div>
                </form>
                    <div class=" table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead class=" table-bordered" >
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kategori Pengeluaran</th>
                                    <th scope="col">Jenis Pengeluaran</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->tanggal }}
                                        </td>
                                        <td>
                                            {{ $item->kategori_pengeluaran }}
                                        </td>
                                        <td>
                                            {{ $item->jenis_pengeluaran }}
                                        </td>
                                        <td>
                                            {{ $item->deskripsi}}
                                        </td>
                                        <td>
                                        {{ number_format($item->harga_biaya, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->total, 0, ',', '.') }}
                                        </td>
                                        <td>
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only " href="#" role="button"
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