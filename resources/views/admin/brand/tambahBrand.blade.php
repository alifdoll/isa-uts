@extends('layouts.admin')
@section('header')
<h3 class="page-title">
    Brand <small>Tambah Brand</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="/mgbrand">List Brands</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Tambah Brand</a>
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
                    <h1 class="mb-5">Tambah Brand</h1>
                    <div class="row text-left">
                        <div class="col-sm-6 col-sm-offset-3">
                            <form method="POST" action="{{ route('brands.store') }}">
                                @csrf
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" value="" name="name" id="nama" class="form-control">
                                   
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
