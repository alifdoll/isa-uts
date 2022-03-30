<head>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">

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
                                <td scope="col">Courier</td>
                                <td scope="col">Item Name</td>
                                <td scope="col">Pickup Address</td>
                                <td scope="col">Destination Address</td>
                                <td scope="col">Distance</td>
                                <td scope="col">Price</td>
                                <td scope="col">Manage</td>
                            </tr>
                        </thead>
                        <tbody>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                            {{-- @foreach ($data as $s)
                                <tr>
                                    <td>{{ $s->courier->name }}</td>
                                    <td>{{ $s->item }}</td>
                                    <td>{{ $s->pickup_address }}</td>
                                    <td>{{ $s->destination_address }}</td>
                                    <td>{{ $s->distance }}km</td>
                                    <td>Rp.{{ $s->price }}</td>
                                    <td>
                                        @if ($s->shipped == 0)
                                            <button type="submit" style="width: 100%" class="btn btn-danger"
                                                data-toggle="modal" data-target="#logoutTrack"
                                                onclick="getLocation({{ $s->id }})">
                                                Track
                                            </button>
                                        @else
                                            <button type="submit" style="width: 100%" class="btn btn-success">
                                                SHIPPED
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach --}}

                        </tbody>
                    </table>
                    <div class="add-pegawai">
                        <a href="/send" role="button" class="btn btn-lg btn-primary"><i class="bi bi-plus"></i>
                            Kirim Barang</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
