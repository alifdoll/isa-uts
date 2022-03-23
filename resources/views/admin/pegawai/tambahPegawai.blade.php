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
                    <h1 class="mb-5">Tambah User</h1>
                    <div class="row text-left">
                        <div class="col-sm-6 col-sm-offset-3">
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                    <input type="text" value="" class="form-control" name="username">
                                   
                                </div>


                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="">
                                   
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value=""
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                        else.</div>
                                   
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" value="" id="exampleInputPassword1">
                                   
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
