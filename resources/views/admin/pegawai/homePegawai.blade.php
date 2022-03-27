@extends('layouts.admin')

@section('header')
<h3 class="page-title">Users <small>List Users</small></h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">List Users</a>
            <i class="fa fa-angle-right"></i>
        </li>
    </ul>
</div>
@endsection @section('content')

<section class="mg-pegawai-item" id="mg-pegawai-item">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12">
                <h1 class="pb-5">Management Users</h1>
                <br />
                <table class="table table-striped text-center">
                    <thead>
                        <tr class="table-td-head">
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

                        <tr class="table-td-content">
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
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session("status") }}
                    </div>
                    @endif @if (session('delete'))
                    <div class="alert alert-danger">
                        {{ session("delete") }}
                    </div>
                    @endif
                </table>
                <div class="add-pegawai">
                    <a href="/mgpegawai-add" role="button" class="btn btn-lg btn-primary"><i class="bi bi-plus"></i>
                        Tambah Pegawai</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection