@extends('layouts.index')
<!--  -->

@section('ajax')
    <script>
        function historyDetail(id) {
            console.log(id);
            $.ajax({
                type: 'POST',
                url: "{{ route('order.history') }}",
                data: {
                    _token: "<?= csrf_token() ?>",
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $("#content").html('');
                    for (i = 0; i < data.msg.length; i++) {
                        let paidStatus = data.msg[i].order_paid_at;
                        if (paidStatus == null) {
                            paidStatus = "Still not Paid";
                        } else {
                            paidStatus = paidStatus
                        }
                        $("#content").append(
                            `
                            <tr class="table-td-content" >
                                <td scope="row">
                                    ${i+1}
                                    </td>
                                
                <td scope="row">
                    {{ Auth::user()->name }}  
                  
                </td>
                <td>
                    ${data.msg[i].productName}  
                    
                </td>    

                

                <td>
                    <img src="${data.msg[i].productImage}" style="width: 300px; height: 200px;">             
                </td>
                <td>
                  ${data.msg[i].unitPrice}                              
                </td>
                <td>
                  ${data.msg[i].quantity}                              
                </td>
                <td>
                  ${data.msg[i].total}                              
                </td>
                

                <td>
                  ${paidStatus}
                </td>

</tr>
          
          `
                        );
                    }

                }
            })
        }

        function shipmentDetail(id) {
            console.log(id);
            $.ajax({
                type: 'POST',
                url: "{{ route('product.shipmentHistory') }}",
                data: {
                    _token: "<?= csrf_token() ?>",
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $("#content2").html('');
                    for (i = 0; i < data.msg.length; i++) {

                        $("#content2").append(
                            `
                            <tr class="table-td-content" >
                                
                                <td>
                                    ${data.msg[i].sequence}  
                                    
                                </td>    
                                
                <td scope="row">
                    ${data.msg[i].current_location}  

                  
                </td>
            </tr>`
                        );
                    }

                }
            })
        }
    </script>
@endsection

<!--  -->
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="/">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">History</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        @if (count($order) == 0)
                            <h1 class="text-center">No Data</h1>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Id</th>
                                        <th class="product-thumbnail">Order Date</th>
                                        <th class="product-name">Action</th>
                                        <th class="product-name">Status</th>
                                        <th class="product-name">Shipment Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $o)
                                        <tr class="table-td-content">
                                            <td scope="row">{{ $o->id }}</td>

                                            <td>{{ $o->created_at }}</td>
                                            <td>
                                                <a role="button" class="btn btn-primary"
                                                    onclick="historyDetail('{{ $o->id }}')" data-toggle="modal"
                                                    data-target="#modal" href="#modal"></i>Details</a>
                                            </td>

                                            <td>
                                                @if ($o->paid_at == null)
                                                    <p></i>Wait Confirmation</p>
                                                @else
                                                    <p></i>Confirmed</p>
                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($shipment as $s)
                                                    <a role="button" class="btn btn-primary"
                                                        onclick="shipmentDetail('{{ $s }}')" data-toggle="modal"
                                                        data-target="#modal2" href="#modal"></i>Details</a>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="msg_modal" class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Number</th>
                                {{-- <th class="product-thumbnail">Id</th> --}}
                                <th class="product-name">Buyer Name</th>
                                <th class="product-name">Product Name</th>
                                <th class="product-name">Image Product</th>
                                <th class="product-name">Unit Price</th>
                                <th class="product-name">Quantity</th>
                                <th class="product-name">Total</th>
                                <th class="product-thumbnail">Paid Date</th>

                            </tr>
                        </thead>
                        <tbody id="content">



                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal Shipment --}}
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Shipment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="msg_modal" class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Sequence</th>
                                {{-- <th class="product-thumbnail">Id</th> --}}
                                <th class="product-name">Current Location</th>


                            </tr>
                        </thead>
                        <tbody id="content2">



                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
