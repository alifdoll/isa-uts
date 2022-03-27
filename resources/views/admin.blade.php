@extends('layouts.admin')

@section('css')
<link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            DataTables Example
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td scope="col">ID</td>
                        <td scope="col">Name</td>
                        <td scope="col">Username</td>
                        <td scope="col">Email</td>
                        <td scope="col">Roles</td>
                        <td scope="col">Status</td>
                        <td scope="col">Manage</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p as $users)
                    <tr>
                        <td scope="row">{{ $users->id }}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->username }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->roles }}</td>
                        <td>{{ $users->suspend }}</td>
                        <td>
                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <form action="{{ route('users.update', $users->id) }}" method="POST">
                                        @method('PUT') @csrf

                                        <button type="submit" href="#" style="width: 100%" class="btn btn-primary">
                                            Reset Password
                                        </button>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    @if($users->suspend == 0)
                                    <form action="{{ route('users.destroy', $users->id) }}" method="POST">
                                        @method('DELETE') @csrf

                                        <button type="submit" href="#" style="width: 100%" class="btn btn-danger">
                                            Suspend
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('users.destroy', $users->id) }}" method="POST">
                                        @method('DELETE') @csrf

                                        <button type="submit" href="#" style="width: 100%" class="btn btn-success">
                                            Unsuspend
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="add-pegawai">
    <a href="/mgpegawai-add" role="button" class="btn btn-lg btn-primary"><i class="bi bi-plus"></i>
        Tambah Pegawai</a>
</div>
@endsection

@section('javascript')
<!-- Page level plugins -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection