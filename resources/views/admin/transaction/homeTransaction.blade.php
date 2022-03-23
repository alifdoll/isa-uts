@extends('layouts.admin') @section('header')
    <h3 class="page-title">Transactions <small>List Transactions</small></h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">List Transactions</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
    </div>
    @endsection @section('content')

    <section class="mg-pegawai-item" id="mg-pegawai-item">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <h1 class="pb-5">Management Transaction</h1>
                    <br />
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="table-td-head">
                                <td scope="col">ID</td>

                                <td scope="col">Name</td>
                                <td scope="col">Date</td>
                                <td scope="col">Details</td>
                                <td scope="col">Manage</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $o)

                                <tr class="table-td-content">
                                    <td scope="row">{{ $o->id }}</td>

                                    <td>{{ $o->name }}</td>
                                    <td>{{ $o->created_at }}</td>
                                    <td>
                                    
                                        <div class="col-sm-12">
                                            <a href="/detailtr/{{ $o->id }}" role="button"
                                                class="btn btn-primary" style="width: 100%;"><i class="bi bi-pencil"></i>Details</a>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="row justify-content-center">
                                            @if(Auth::user()->roles == "administrator")
                                            <div class="col-sm-5">
                                                @if ($o->paid_at == null)
                                                    <a href="/mgpegawai-edit/{{ $o->id }}" role="button" style="width: 80%;"
                                                        class="btn btn-primary"></i>Confirm</a>
                                                @else
                                                    <a role="button" class="btn  btn-success" style="width: 80%;"></i>Confirmed</a>
                                                @endif
                                            </div>
                                            @else
                                            <div class="col-sm-12">
                                                @if ($o->paid_at == null)
                                                    <a href="/mgpegawai-edit/{{ $o->id }}" role="button" style="width: 80%;"
                                                        class="btn btn-primary"></i>Confirm</a>
                                                @else
                                                    <a role="button" class="btn  btn-success" style="width: 80%;"></i>Confirmed</a>
                                                @endif
                                            </div>
                                            @endif
                                            <div class="col-sm-5">
                                                {{-- @can('delete-permission', $o) --}}
                                                    @if (Auth::user()->roles == 'administrator')
                                                    <form action="/orders/{{ $o->id }}" method="POST">
                                                        @method('delete')
                                                        @csrf
        
        
                                                        <button type="submit" href="#" style="width: 100%;" class="btn btn-danger"><i
                                                                class="bi bi-trash"></i>Delete</button>
                                                    </form>
                                                    @endif
                                                {{-- @endcan --}}
                                            </div>
                                        </div>




                                    </td>
                                </tr>

                            @endforeach
                            @if (session('delete'))
                            <div class="alert alert-danger">
                                {{ session('delete') }}
                            </div>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
