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
            <a href="/mgproduct">List Products</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Detail Products</a>
            <i class="fa fa-angle-right"></i>
        </li>
        
        
    </ul>
    
</div>    
@endsection

@section('content')

    <section class="mg-product-detail-item" id="mg-product-detail-item">
        <div class="container">
            <div class="row justify-content-around">

                <div class="col-sm-6 text-center">
                    <img src="{{ $p->image }}" width="100%" alt="">
                </div>


                <div class="col-sm-6">
                    <div class="detail-product-description">
                        <h1 class="text-start mb-3">{{ $p->name }}</h1>
                        <p>
                            {{ $p->description }}
                        </p>
                        <h3 class="mt-4">
                            Harga: Rp. {{ $p->price }}
                        </h3>
                        
                    </div>

                    <div class="table-detail-product-item">
                        <h2>Spesifikasi</h2>
                        <table class="table">
                            <thead>

                                <tr>
                                    <th scope="col">CPU</th>
                                    <th scope="col">{{ $p->cpu }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">RAM</th>
                                    <th scope="col">{{ $p->ram }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Storage</th>
                                    <th scope="col">{{ $p->storage }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Graphics</th>
                                    <th scope="col">{{ $p->graphics }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Display</th>
                                    <th scope="col">{{ $p->display }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Battery</th>
                                    <th scope="col">{{ $p->battery_capacity }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Color</th>
                                    <th scope="col">{{ $p->color }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Dimensions</th>
                                    <th scope="col">{{ $p->dimensions }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Weight</th>
                                    <th scope="col">{{ $p->weight }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Ports</th>
                                    <th scope="col">{{ $p->ports }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Connectivity</th>
                                    <th scope="col">{{ $p->connectivity }}</th>
                                </tr>

                            </thead>
                        </table>
                    </div>
                    <div class="caption-button text-center">
                        <div class="row justify-content-around">
                            <div class="col-sm-6">
                                {{-- <button class="btn btn-primary" style="width: 100%;"><i class="bi bi-pencil"></i>Edit</button> --}}

                                <a href="/mgproduct-edit/{{ $p->id }}" role="button" style="width: 100%;" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                                
                            </div>
                            <div class="col-sm-6">
                                <form action="{{ route('products.update', $p->id) }}" method="POST">
                                    @method('delete')
                                    @csrf


                                    <button type="submit" href="#" style="width: 100%;" class="btn btn-danger"><i
                                            class="bi bi-trash"></i>Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
