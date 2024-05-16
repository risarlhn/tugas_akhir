@extends('layouts.app', ['pageSlug' => 'laporan-invoice'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <br>
                <div class="card-body">
                <div>
                <form action="{{ route('invoice.filter' ) }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="start_date">Tanggal Awal:</label>
                            <input type="date" name="startDate" class="form-control" value="{{ request('startDate') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="end_date">Tanggal Akhir:</label>
                            <input type="date" name="endDate" class="form-control" value="{{ request('endtDate') }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-sm btn-info mt-4"> <i class="fas fa-filter"></i> filter</button>
                            <a href="{{ route('invoice.cetak') }}?startDate={{ request('startDate') }}&endDate={{ request('endDate') }}"  class="btn btn-sm btn-info mt-4">
                                 <i class="fas fa-print"></i> Cetak PDF
                            </a>                            
                        </div>
                    </div>
                </form>
                </div>
                    <div class=" table-responsive">
                        <table class="table table-bordered " id="myTable">
                            <thead class=" table-bordered" >
                                <tr>
                                    <th >No.</th>
                                    <th scope="col">No Invoice</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Telp</th>
                                    <th scope="col">No Purhase Order</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Term</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Nama Kapal/Site</th>
                                    <th scope="col">Wilayah Pengisian</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">satuan</th>
                                    <th scope="col">harga</th>
                                    <th scope="col">harga dasar</th>
                                    <th scope="col">PPN</th>
                                    <th scope="col">Jumlah Harga Dasar</th>
                                    <th scope="col">Jumlah PPN</th>
                                    <th scope="col">Total</th>
                                    @if (auth()->user()->role == 'ADMIN' )
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->no_invoice }}
                                        </td>
                                        <td>
                                            {{ $item->nama_perusahaan }}
                                        </td>
                                        <td>
                                            {{ $item->alamat }}
                                        </td>
                                        <td>
                                            {{ $item->no_telp }}
                                        </td>
                                        <td>
                                            {{ $item->no_po }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal }}
                                        </td>
                                        <td>
                                            {{ $item->term }}
                                        </td>
                                        <td>
                                            {{ $item->produk }}
                                        </td>
                                        <td>
                                            {{ $item->nama_kapal }}
                                        </td>
                                        <td>
                                            {{ $item->wilayah_pengisian }}
                                        </td>
                                        <td>
                                            {{ $item->qty }}
                                        </td>
                                        <td>
                                            {{ $item->satuan }}
                                        </td>
                                        <td>
                                        {{ number_format($item->harga, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->harga_dasar, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->ppn, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->jumlah_harga_dasar, 0, ',', '.') }}
                                        </td>
                                        <td>
                                        {{ number_format($item->jumlah_ppn, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ number_format($item->total, 0, ',', '.') }}
                                        </td>
                                        
                                        @if (auth()->user()->role == 'ADMIN')
                                        <td>
                                            <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only " href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('invoice.edit',$item->id) }}">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');"
                                                href="{{ route('invoice.hapus', $item->id) }}">Hapus</a>
                                                <a class="dropdown-item" href="{{ route('invoice.pdf', $item->id) }}">Detail</a>
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
                         @csrf
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