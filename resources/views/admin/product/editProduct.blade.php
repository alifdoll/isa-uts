@extends('layouts.admin')
@section('header')
    <h3 class="page-title">
        Products <small>Edit Products</small>
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
                <a href="/mgproduct-detail/{{ $p->id }}">Detail Products</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Edit Products</a>
                <i class="fa fa-angle-right"></i>
            </li>


        </ul>

    </div>
@endsection

@section('content')

    <section class="mg-product-detail-item" id="mg-product-detail-item">
        <div class="container">
            <h1 class="mt-5 mb-5 text-center">Edit Product</h1>
            <div class="row justify-content-around">

                <div class="col-sm-8">
                    <form method="POST" action="{{ route('products.update', $p->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $p->name }}" id="name"
                                aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $p->price }}" id="price">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" name="stock" value="{{ $p->stock }}" id="stock">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image URL</label>
                            <input type="url" class="form-control" name="image" value="{{ $p->image }}" id="image">
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" name="description" placeholder="Leave a description here"
                                id="desc" style="height: 100px">{{ $p->description }}</textarea>
                            <label for="desc">Description</label>
                        </div>

                        <div class="mb-4 mt-4">
                            <label for="exampleInputEmail1" class="form-label">Category</label>

                            <select class="form-select" aria-label="Default select example" name="category_id">

                                @foreach ($c as $cate)

                                    <option {{ $cate->id == $p->category_id ? 'selected' : '' }} value="{{ $cate->id }}">
                                        {{ $cate->name }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Brand</label>

                            <select class="form-select" name="brand_id" aria-label="Default select example">

                                @foreach ($b as $brand)
                                    <option {{ $brand->id == $p->brand_id ? 'selected' : '' }} value="{{ $brand->id }}">
                                        {{ $brand->name }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="table-detail-product-item">
                            <h2 class="mt-5">Spesifikasi</h2>
                            <table class="table">
                                <thead>

                                    <tr>
                                        <th scope="col">CPU</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="cpu"
                                                value="{{ $p->cpu }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">RAM</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="ram"
                                                value="{{ $p->ram }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Storage</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="storage"
                                                value="{{ $p->storage }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Graphics</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="graphics"
                                                value="{{ $p->graphics }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Display</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="display"
                                                value="{{ $p->display }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Battery</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="battery_capacity"
                                                value="{{ $p->battery_capacity }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Color</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="color"
                                                value="{{ $p->color }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Dimensions</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="dimensions"
                                                value="{{ $p->dimensions }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Weight</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="weight"
                                                value="{{ $p->weight }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Ports</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="ports"
                                                value="{{ $p->ports }}" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Connectivity</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="connectivity"
                                                value="{{ $p->connectivity }}" id="">
                                        </th>
                                    </tr>

                                </thead>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Submit</button>
                    </form>





                </div>
            </div>
        </div>
    </section>


@endsection
