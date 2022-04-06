@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="/test2" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                List Barang Yang Dikirim Oleh Sender
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td scope="col">ID</td>
                            <td scope="col">Sender</td>
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
                                <td>{{ $s->sender->name }}</td>
                                <td>{{ $s->item }}</td>
                                <td>{{ decrypt($s->pickup_address) }}</td>
                                <td>{{ decrypt($s->destination_address) }}</td>
                                <td>{{ $s->price }}</td>
                                <td>
                                    @if ($s->shipped == 0)
                                        <div class="add-pegawai">
                                            <a href="/locDetail/{{ $s->id }}" role="button" style="width: 100%"
                                                class="btn btn-lg btn-danger"><i class="bi bi-plus"></i>
                                                Add Location</a>
                                        </div>
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
