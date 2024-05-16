@extends('layouts.app', ['pageSlug' => 'purchase-order'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                <div class="row">
                        <div class="col-8">
                        </div>
                    </div>
                    @if (auth()->user()->role == 'CUSTOMER')
                        <div class="col-14 text-right">
                            <a href="{{ route('purchase-order.create') }}" class="btn btn-sm btn-info"  >+ Ajukan Purchase Order</a>                        </div>
                        @endif
                    <br>
                    <div class=" table-responsive" >
                        <table class="table tablesorter table-bordered" id="myTable">
                            <thead class=" text-primary table-bordered">
                                <tr class=" table-bordered">
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">File Purchase Order</th>
                                    <th scope="col">Status</th>
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
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->nama_perusahaan }}
                                        </td>
                                        <td>
                                            PO_{{ $item->name }} <a href="{{ asset('file') . '/' . $item->file }}"><i
                                                    class="tim-icons icon-cloud-download-93"></i></a>
                                        </td>
                                        <td>
                                            @if ($item->status == 'Proses')
                                                <span class="badge badge-pill  badge-info">{{ $item->status }}</span>
                                            @elseif($item->status == 'Batal')
                                                <span class="badge badge-pill text-white bg-danger">{{ $item->status }}</span>
                                            @elseif($item->status == 'Selesai')
                                                <span class="badge badge-pill badge-success">{{ $item->status }}</span>
                                            @endif
                                        </td >
                                        @if (auth()->user()->role == 'ADMIN')
                                        <form action="{{ route('purchase-order.store') }}" method="post" enctype="multipart/form-data">
                                        <td>
                                            <a href="{{ route('purchase-order.status', ['status' => 'proses', 'id' => $item->id]) }}"
                                                class=" btn-info btn-sm text-white mr-1">
                                                <i class="tim-icons icon-refresh-02"></i>
                                            </a>
                                            <a href="{{ route('purchase-order.status', ['status' => 'batal', 'id' => $item->id]) }}"
                                                class=" btn-danger btn-sm text-white mr-1">
                                                <i class="tim-icons icon-simple-remove"></i>
                                            </a>
                                            <a href="{{ route('purchase-order.status', ['status' => 'selesai', 'id' => $item->id]) }}"
                                                class="btn- btn-success btn-sm text-white mr-1">
                                                <i class="tim-icons icon-check-2"></i>
                                            </a>
                                        </td>
                                        </form>
                                        @endif
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
