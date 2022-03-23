@extends('layouts.admin')

@section('header')
    <h3 class="page-title">
        Brand <small>Edit Brand</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/mgpegawai">List Brands</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Edit Brand</a>
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
                    <h1 class="mb-5">Edit Brand</h1>

                    <div class="row text-left">
                        <div class="col-sm-6 col-sm-offset-3">
                            <form method="POST" action="{{ route('brands.update', $b->id) }}">
                                @csrf
                                @method("PUT")
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                    <input type="text" name="name"  id="nama" value="{{ $b->name }}" class="form-control">

                                </div>




                                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Submit</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>


@endsection
