@extends('layouts.index')
<!--  -->

<!--  -->
@section('content') @php $total = 0; if ($cart != null) { foreach ($cart as $key
=> $value) { $price = (int) $value['price']; $quan = (int) $value['quantity'];
$total = $price * $quan + $total; } } @endphp

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Cart</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    @if ($cart == null)
                    <p>No Data</p>
                    @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                            <tr>
                                <td class="product-thumbnail">
                                    <img
                                        src="{{ $item['image'] }}"
                                        alt="Image"
                                        class="img-fluid"
                                    />
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">
                                        {{ $item["name"] }}
                                    </h2>
                                </td>
                                <td>Rp. {{ number_format($item["price"]) }}</td>
                                <td>
                                    {{ $item["quantity"] }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item["price"] * $item["quantity"]) }}
                                </td>
                                <td>
                                    <a
                                        href="/remove-from-cart/{{
                                            $item['id']
                                        }}"
                                        class="btn btn-primary btn-sm"
                                        >X</a
                                    >
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <a href="/products"
                            ><button
                                class="btn btn-outline-primary btn-sm btn-block"
                            >
                                Continue Shopping
                            </button></a
                        >
                    </div>
                </div>
            </div>
            @if($cart!=null)
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div
                                class="col-md-12 text-right border-bottom mb-5"
                            >
                                <h3 class="text-black h4 text-uppercase">
                                    Cart Totals
                                </h3>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">{{ number_format($total) }}</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="/checkout">
                                    <button
                                        class="btn btn-primary btn-lg py-3 btn-block"
                                        onclick="window.location='checkout.html'"
                                    >
                                        Proceed To Checkout
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
