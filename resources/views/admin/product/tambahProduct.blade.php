@extends('layouts.admin')
@section('header')
<h3 class="page-title">
    Products <small>Add Products</small>
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
            <a href="#">Add Products</a>
            <i class="fa fa-angle-right"></i>
        </li>
        
        
    </ul>
    
</div>    
@endsection

@section('content')

    <section class="mg-product-detail-item" id="mg-product-detail-item">
        <div class="container">
            <h1 class="mt-5 mb-5 text-center">Tambah Product</h1>
            <div class="row justify-content-around">
                
                <div class="col-sm-8">
                    <form method="POST" action="{{ route('products.store') }}" >
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="price">
                        </div>
                        

                        <div class="mb-3">
                            <label for="image" class="form-label">Image URL</label>
                            <input type="url" class="form-control" name="image" id="image">
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" name="description" placeholder="Leave a description here" id="desc"
                                style="height: 100px"></textarea>
                            <label for="desc">Description</label>
                        </div>

                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Category</label>
                            
                            <select class="form-select" aria-label="Default select example" name="category_id">

                                <option selected>Open this select menu</option>
                                @foreach ($c as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->id }}. {{ $cate->name }}</option>
                                @endforeach
                                
                                
                                
                            </select>
                            
                        </div>

                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Brand</label>
                            
                            <select class="form-select" aria-label="Default select example" name="brand_id">

                                <option selected>Open this select menu</option>
                                @foreach ($b as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->id }}. {{ $brand->name }}</option>
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
                                            <input type="text" class="form-control" name="cpu" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">RAM</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="ram" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Storage</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="storage" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Graphics</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="graphics" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Display</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="display" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Battery</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="battery_capacity" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Color</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="color" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Dimensions</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="dimensions" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Weight</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="weight" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Ports</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="ports" value="" id="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Connectivity</th>
                                        <th scope="col">
                                            <input type="text" class="form-control" name="connectivity" value="" id="">
                                        </th>
                                    </tr>
    
                                </thead>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary" style="width: 100%;">Submit</button>
                    </form>





                </div>
            </div>
        </div>
    </section>


@endsection
