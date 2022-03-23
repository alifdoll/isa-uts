@extends('layouts.admin')
@section('header')
    <h3 class="page-title">
        Products <small>List Products</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">List Products</a>
                <i class="fa fa-angle-right"></i>
            </li>


        </ul>

    </div>
@endsection
@section('content')

    <section class="mg-product-item" id="mg-product-item">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('delete'))
                            <div class="alert alert-danger">
                                {{ session('delete') }}
                            </div>
                        @endif
                    <h1 class="pb-5">Management Product</h1>
                    <br>

                    <div class="row text-center">
                        @foreach ($product as $p)


                            <div class="col-sm-3 mb-5">
                                <div class="card">
                                    <img src="{{ $p->image }}" class="card-img-top"
                                        style="width: 100%; height: 20rem;" alt="Hu-Tao">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $p->name }}</h5>
                                        <p class="card-text" style="overflow: hidden;
                                            white-space: nowrap;
                                            text-overflow: ellipsis;
                                            ">{{ $p->description }}</p>
                                        <a href="/mgproduct-detail/{{ $p->id }}" class="btn btn-primary">Detail
                                            Product</a>
                                    </div>
                                </div>


                            </div>
                        @endforeach
                        
                    </div>
                    <div class="add-product mt-5">
                        {{-- <button class="btn btn-primary btn-lg "><i class="bi bi-plus"></i> Tambah product</button> --}}

                        <a href="/mgproduct-add" role="button" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah
                            product</a>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection
