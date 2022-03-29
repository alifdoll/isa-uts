@extends('layouts.admin')

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
                                <label for="exampleInputEmail1" class="form-label">Item Name</label>
                                <input type="text" class="form-control" name="item">

                            </div>

                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Pickup Address</label>
                                <input type="text" class="form-control" name="pickup_address" value="">

                            </div>

                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Destination address</label>
                                <input type="text" class="form-control" name="destination_address">
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Distance</label>
                                <input type="number" class="form-control" name="distance" min="1">
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Courier</label>

                                <select class="form-select" aria-label="Default select example" name="courier">

                                    <option selected>Open this select menu</option>
                                    @foreach ($courier as $i => $c)
                                    <option value="{{ $c->id }}">{{ $i+1 }}. {{ $c->name }}</option>
                                    @endforeach



                                </select>

                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Shipment Date</label>
                                <input type="date" class="form-control" name="shipment_date" value=""
                                    id="exampleInputPassword1">
                            </div>

                            <input type="hidden" name="sender" value="{{ Auth::user()->id }}" />

                            <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Submit</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>


@endsection