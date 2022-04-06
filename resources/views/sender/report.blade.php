<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h6 class="m-0 font-weight-bold text-primary">
            List Barang Oleh Pengirim
        </h6>

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
                    @foreach ($shipment as $s)
                    <tr>
                        <td>{{ $s->courier->name }}</td>
                        <td>{{ $s->item }}</td>
                        <td>{{ decrypt($s->pickup_address) }}</td>
                        <td>{{ decrypt($s->destination_address) }}</td>
                        <td>{{ $s->distance }}km</td>
                        <td>Rp.{{ $s->price }}</td>
                        <td>
                            @if ($s->shipped == 0)
                            <p class="text-warning">SHIPPING</p>
                            @else
                            <p class="text-success">SHIPPED</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <p>Total barang terkirim {{ count($shipped) }}</p>
    </div>

</body>