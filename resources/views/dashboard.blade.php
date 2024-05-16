@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')  
@if (auth()->user()->role == 'ADMIN')
<div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                <h5 class="card-category text-dark"><strong style="color: #90A1FF;">PO MASUK</strong></h5>
                    <h3 class="card-title"><i class="tim-icons icon-notes text-primary"></i> {{ $po }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                <h5 class="card-category text-dark"><strong style="color: #90A1FF;">INVOICE KELUAR</strong></h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-info"></i>{{ $inv }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                <h5 class="card-category text-dark"><strong style="color: #90A1FF;">SURAT JALAN KELUAR</strong></h5>
                    <h3 class="card-title">
                        <i class="tim-icons icon-delivery-fast text-success"></i>{{ $sj }}</h3>
                        
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-tasks">
            </div>
        </div>
    </div>
</div>
@endif

@if (auth()->user()->role == 'DIREKTUR') 
 <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <br>
                    <center><h1 style="color: #5C74FB; font-weight: bold;">SELAMAT DATANG DI DASHBOARD DIREKTUR</h1></center>
                    <br>
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

@endif
@if (auth()->user()->role == 'KEUANGAN')  
 <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <br>
                    <center><h2 style="color: #5C74FB; font-weight: bold;">SELAMAT DATANG DI DASHBOARD KEUANGAN</h2></center>
                    <br>
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

@endif
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
