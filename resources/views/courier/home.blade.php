@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            List Barang Yang Dikirim Oleh Kurir
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td scope="col">ID</td>
                        <td scope="col">Courier</td>
                        <td scope="col">Item Name</td>
                        <td scope="col">Pickup Address</td>
                        <td scope="col">Destination Address</td>
                        <td scope="col">Price</td>
                        <td scope="col">Manage</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shipment as $s)
                    <tr>
                        <td scope="row">{{ $s->id }}</td>
                        <td>{{ $s->courier->name }}</td>
                        <td>{{ $s->item }}</td>
                        <td>{{ $s->pickup_address }}</td>
                        <td>{{ $s->destination_address }}</td>
                        <td>{{ $s->price }}</td>
                        <td>
                            @if($s->shipped == 0)
                            <form method="POST">
                                @method('DELETE') @csrf

                                <button type="submit" href="#" style="width: 100%" class="btn btn-danger">
                                    Add Location
                                </button>
                            </form>
                            @else
                            <button type="submit" href="#" style="width: 100%" class="btn btn-success">
                                SHIPPED
                            </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection