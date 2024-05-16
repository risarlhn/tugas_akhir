@extends('layouts.app', ['pageSlug' => 'laporan-pengeluaran-bbm'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <br>
                <div class="card-body">
                <form action="{{ route('pengeluaran-bbm.filter') }}" method="GET">
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
                            <a href="{{ route('pengeluaran-bbm.cetak') }}?startDate={{ request('startDate') }}&endDate={{ request('endDate') }}" class="btn btn-sm btn-info mt-4">
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
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Harga Dasar</th>
                                    <th scope="col">PPN</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">No</th>
                                    @if (auth()->user()->role == 'KEUANGAN')
                                    <th scope="col">Action</th>
                                    @endif
                                    
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
                                            {{ $item->nama_perusahaan }}
                                        </td>
                                        <td>
                                        {{ number_format($item->qty, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->harga_dasar, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->ppn, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->total, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ $item->no_pengeluaran }}
                                        </td>
                                        @if (auth()->user()->role == 'KEUANGAN')
                                        <td>
                                        <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('pengeluaran-bbm.edit',$item->id) }}">Edit</a>
                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('pengeluaran-bbm.hapus', $item->id) }}">Hapus</a>
                                        </div>
                                        </div>
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
                    </div>
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