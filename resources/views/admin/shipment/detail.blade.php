@extends('layouts.admin')

@section('header')
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
@endsection

@section('content')
    <section class="mg-pegawai-item" id="mg-pegawai-item">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <h1 class="pb-5">Details</h1>
                    <br />
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="table-td-head">
                                <td scope="col">ID</td>
                                <td scope="col">Name</td>
                                <td scope="col">Order Id</td>
                                <td scope="col">Manage</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($shipment as $s)
                                <tr>
                                    <td>{{ $s->shipment_id }}</td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->order_id }}</td>
                                    <td>
                                        <div>
                                            <a role="button" style="width: 80%;" class="btn btn-primary"></i>Details</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
