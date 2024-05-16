@extends('layouts.app', ['pageSlug' => 'laporan-pendapatan'])

@section('content')
@include('sweetalert::alert')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
               
                <div class="btn-group btn-group-toggle float-left" data-toggle="buttons">
                        <label onclick="redirectToPemasukan()" class="btn btn-sm btn-info btn-simple" id="0">
                        <input type="radio" name="options" checked="">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Pemasukan</span>
                        <span class="d-block d-sm-none">
                        <i class="tim-icons icon-single-02"></i>
                        </span>
                        </label>
                        <label onclick="redirectToIndex()" class="btn btn-sm btn-info btn-simple active" id="1">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Pendapatan</span>
                        <span class="d-block d-sm-none">
                        <i class="tim-icons icon-gift-2"></i>
                        </span>
                        </div>
                <br>
                <br>
                <form action="{{ route('pendapatan.filter') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="start_date">Tanggal Awal:</label>
                            <input type="date" name="startDate" class="form-control" value="{{ request('startDate') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="end_date">Tanggal Akhir:</label>
                            <input type="date" name="endDate" class="form-control" value="{{ request('startDate') }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-sm btn-dark mt-4"> <i class="fas fa-filter"></i> filter</button>
                            <a href="{{ route('pendapatan.cetak') }}?startDate={{ request('startDate') }}&endDate={{ request('endDate') }}" class="btn btn-sm btn-dark mt-4">
                                 <i class="fas fa-print"></i> Cetak PDF
                            </a>                            
                        </div>
                    </div>
                </form>
                    <table class="table table-bordered"  >
                            <thead class="text-primary table-bordered" style="background-color: #f0f0f0;">
                                <tr class="table-bordered ">
                                <th  style="text-align: center; font-size: 20px;"> PEMASUKAN</th>
                                </tr>
                            </thead>
                    </table>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" >
                            
                            <thead class="text-primary table-bordered">
                                <tr class="table-bordered ">
                                <th >No.</th>
                                    <th scope="">Nama Perusahaan</th>
                                    <th scope="col">No Invoice</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Term</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Nama Kapal/Site</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">satuan</th>
                                    <th scope="col">harga</th>
                                    <th scope="col">harga dasar</th>
                                    <th scope="col">PPN</th>
                                    <th scope="col">Jumlah Harga Dasar</th>
                                    <th scope="col">Jumlah PPN</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $total_harga = 0;
                            @endphp
                                @foreach ($invoice as $key => $item)
                                    <tr>
                                    <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->nama_perusahaan }}
                                        </td>
                                        <td>
                                            {{ $item->no_invoice }}
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
                                        </td>
                                    </tr>
                                    @php
                                    // Akumulasi harga dasar
                                    $total_harga += $item->total;
                                    @endphp 
                                @endforeach
                            </tbody>
                        </table>
                        <h4 class="text-center"> <strong>TOTAL PEMASUKAN = {{ number_format($total_harga, 0, ',', '.') }}</strong> </h4>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-bordered"  >
                            <thead class="text-primary table-bordered" style="background-color: #f0f0f0;">
                                <tr class="table-bordered ">
                                <th  style="text-align: center; font-size: 20px;"> PENGELUARAN</th>
                                </tr>
                            </thead>
                    </table>
                    <div class="table-responsive">
                        <table class="table tablesorter table-bordered " id="myTablee">
                        <thead class=" text-primary table-bordered">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Perushaan</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Harga Dasar</th>
                                <th scope="col">PPN</th>
                                <th scope="col">Total</th>
                                <th scope="col">No</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $total_harga = 0;
                            @endphp
                            @foreach ($bbm as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->nama_perusahaan }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ number_format($item->harga_dasar, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->ppn, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                                <td>{{ $item->no_pengeluaran}}</td>
                            </tr>
                            @php
                            // Akumulasi harga dasar
                            $total_harga += $item->total;
                            @endphp
                            @endforeach
                        </tbody>                 
                    </table>
                    <h4 class="text-center"> <strong>TOTAL PENGELUARAN = {{ number_format($total_harga, 0, ',', '.') }} </strong></h4>
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

<script>
    $(document).ready(function() {
        $('#myTablee').DataTable();
    });
</script>

<script>
    function redirectToPemasukan() {
        window.location.href = "{{ route('pendapatan.pemasukan') }}";
    }
</script>

<script>
    function redirectToIndex() {
        window.location.href = "{{ route('pendapatan.index') }}";
    }
</script>

@endpush
