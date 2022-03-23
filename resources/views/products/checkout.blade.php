@extends('layouts.index') @section('content') @php $total = 0; if ($cart !=
null) { foreach ($cart as $key => $value) { $price = (int) $value['price'];
$quan = (int) $value['quantity']; $total = $price * $quan + $total; } } @endphp

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span>
                <a href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Checkout</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                        <thead>
                            <th>Product</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                            <tr>
                                <td>
                                    {{ $item["name"]
                                    }}<strong class="mx-2">x</strong
                                    >{{ $item["quantity"] }}
                                </td>
                                <td>Rp. {{ number_format($item["price"] * $item["quantity"]) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-black font-weight-bold">
                                    <strong>Order Total</strong>
                                </td>
                                <td class="text-black font-weight-bold">
                                    <strong>Rp. {{ number_format($total) }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group">
                        <button
                            class="btn btn-primary btn-lg py-3 btn-block"
                            type="submit"
                            onclick="window.location='/order'"
                        >
                            Place Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- </form> -->
    </div>
</div>

@endsection
