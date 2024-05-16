@extends('layouts.app', ['pageSlug' => 'user'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                <div class="row">
                        <div class="col-12 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-info">+ Tambah User</a>
                        </div>
                    </div>
                    <br>
                    <div class="">
                        <table class="table tablesorter table-bordered " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ $item->role }}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only " href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('user.edit',$item->id) }}">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');"
                                                 href="{{ route('user.hapus',$item->id) }}">Hapus</a>
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
