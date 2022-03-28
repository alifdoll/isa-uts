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
                <h1 class="mb-5">Tambah Shipment</h1>
                <div class="row text-left">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form method="POST" action="{{ route('transactions.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Order id</label>
                                <input type="text" readonly value="{{ $order->id }}" class="form-control" name="order_id">

                            </div>


                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Pickup Address</label>
                                <input type="text" class="form-control" name="pickup_address" value="">

                            </div>

                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Destination address</label>
                                <input type="text" class="form-control" name="destination" id="exampleInputEmail1" value=""
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                    else.</div>

                            </div>

                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Courier</label>
                                
                                <select class="form-select" aria-label="Default select example" name="courier">
    
                                    <option selected>Open this select menu</option>
                                    @foreach ($p as $user)
                                    <option value="{{ $user->id }}">{{ $user->id }}. {{ $user->name }}</option>
                                    @endforeach
                                    
                                    
                                    
                                </select>
                                
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Shipment Date</label>
                                <input type="date" class="form-control" name="shipment_date" value=""
                                    id="exampleInputPassword1">

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