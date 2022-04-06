<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h6 class="m-0 font-weight-bold text-primary">
            List Pegawai
        </h6>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Name</td>
                    <td scope="col">Username</td>
                    <td scope="col">Email</td>
                    <td scope="col">Roles</td>
                    <td scope="col">Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles }}</td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                @if($user->suspend == 0)
                                <button type="submit" href="#" style="width: 100%" class="btn btn-success">
                                    ACTIVE
                                </button>
                                @else
                                <button type="submit" href="#" style="width: 100%" class="btn btn-danger">
                                    SUSPENDED
                                </button>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <p>Total Pengirim Suspended {{count($suspendedSender)}}</p>
        <p>Total Kurir Suspended {{count($suspendedCourier)}}</p>
    </div>

</body>