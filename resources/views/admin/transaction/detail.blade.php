@extends('layouts.admin') @section('header')
    <h3 class="page-title">Transactions <small>List Transactions</small></h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">List Transactions</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
    </div>
    @endsection @section('content')

    <section class="mg-pegawai-item" id="mg-pegawai-item">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <h1 class="pb-5">Details</h1>
                    <br />
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="table-td-head">
                                <td scope="col">ID</td>

                                <td scope="col">Name</td>
                                <td scope="col">Image</td>
                                <td scope="col">Price</td>
                                <td scope="col">Quantity</td>
                                <td scope="col">Total</td>
                                <td scope="col">Order Date</td>
                            </tr>
                        </thead>
                        <tbody>



                            @for ($i = 0; $i < count($order); $i++)
                                
                            
                                
                            
                            <tr class="table-td-content">
                                <td scope="row">{{ $order[$i]['order_id'] }}</td>

                                <td>{{ $order[$i]['productName'] }}</td>
                                <td>
                                    <img src="{{ $order[$i]['productImage'] }}" style="width: 300px; height: 200px;">
                                </td>
                                <td>
                                    {{ $order[$i]['unitPrice'] }}
                                </td>
                                <td>
                                    {{ $order[$i]['quantity'] }}
                                </td>
                                <td>
                                    {{ $order[$i]['total'] }}
                                </td>
                                <td>{{ $order[$i]['pembelian'] }}</td>



                            </tr>
                            @endfor

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
