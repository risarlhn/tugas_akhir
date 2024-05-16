@extends('layouts.app', ['pageSlug' => 'laporan-surat-jalan'])

@section('content')
@include('sweetalert::alert')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
           <br>
            <div class="card-body">
            <form action="{{ route('surat-jalan.filter') }}" method="GET">
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
                        <a href="{{ route('surat-jalan.cetak') }}?startDate={{ request('startDate') }}&endDate={{ request('endDate') }}" class="btn btn-sm btn-info mt-4">
                                 <i class="fas fa-print"></i> Cetak PDF
                            </a>                            
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table tablesorter  table-bordered" id="myTable">
                        <thead class="table-bordered ">
                            <tr>
                            <th scope="col">#</th>
                                    <th scope="col">Kepada</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">No Surat Jalan</th>
                                    <th scope="col">No PO</th>
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">No Telp</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Nama Transportir</th>
                                    <th scope="col">Segel Atas</th>
                                    <th scope="col">Segel Bawah</th>
                                    <th scope="col">Plat</th>
                                    <th scope="col">Pengirim</th>
                                    @if (auth()->user()->role == 'ADMIN')
                                    <th scope="col">Action</th>
                                    @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->kepada }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal }}
                                        </td>
                                        <td>
                                            {{ $item->no_surat }}
                                        </td>
                                        <td>
                                            {{ $item->no_po }}
                                        </td>
                                        <td>
                                            {{ $item->tujuan }}
                                        </td>
                                        <td>
                                            {{ $item->contact }}
                                        </td>
                                        <td>
                                            {{ $item->no_telp }}
                                        </td>
                                        <td>
                                            {{ $item->qty }}
                                        </td>
                                        <td>
                                            {{ $item->jenis }}
                                        </td>
                                        <td>
                                            {{ $item->nama_transportir }}
                                        </td>
                                        <td>
                                            {{ $item->segel_atas }}
                                        </td>
                                        <td>
                                            {{ $item->segel_bawah }}
                                        </td>
                                        <td>
                                            {{ $item->plat }}
                                        </td>
                                        <td>
                                            {{ $item->pengirim }}
                                        </td>
                                        
                                        @if (auth()->user()->role == 'ADMIN')
                                        <td>
                                            <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('surat-jalan.edit',$item->id) }}">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');"
                                                href="{{ route('surat-jalan.hapus', $item->id) }}">Hapus</a>
                                                <a class="dropdown-item" href="{{ route('surat-jalan.pdf', $item->id) }}">Detail</a>
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
