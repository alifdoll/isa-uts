@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            List Barang Oleh Pengirim
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
                            <button type="submit" style="width: 100%" class="btn btn-danger" data-toggle="modal"
                                data-target="#logoutTrack" onclick="getLocation({{$s->id}})">
                                Track
                            </button>
                            @else
                            <button type="submit" style="width: 100%" class="btn btn-success">
                                SHIPPED
                            </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="add-pegawai">
                <a href="/send" role="button" class="btn btn-lg btn-primary"><i class="bi bi-plus"></i>
                    Kirim Barang</a>
            </div>
        </div>
    </div>
</div>



{{-- Modal track item --}}
<div class="modal fade" id="logoutTrack" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item's current location</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function getLocation(id) {
         $.ajax({
             type: 'GET',
             url: `stops/${id}`,
             data: {
                 id: id,
             },
             success: function(data) {
                 $(".modal-body").html(data);
             }
         })
     }
</script>
@endsection