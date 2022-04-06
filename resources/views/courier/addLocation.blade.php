@extends('layouts.admin')

@section('header')
<h3 class="page-title">
    Users <small>Tambah Users</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="/mgpegawai">List Users</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Tambah Users</a>
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
                <h1 class="mb-5">Lokasi Saat Ini</h1>
                <div class="row text-left">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form method="GET" action="{{ route('addLocation') }}">
                            @csrf
                            <div class="mb-4">
                                <input type="hidden" value="{{ $id }}" class="form-control" name="shipment_id">
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Current Location</label>
                                <input type="text" class="form-control" name="current_location" id="exampleInputEmail1"
                                    value="" aria-describedby="emailHelp">
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Submit</button>
                        </form>
                        <br>
                        <form method="POST" action="{{ route('shipped', $id) }}">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button type="submit" class="btn btn-success btn-lg" style="width: 100%;">Shipped</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>


@endsection