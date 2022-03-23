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
        @foreach ($order->details as $item)
        <tr>
            <td class="product-thumbnail">
                <img src="{{ $item->image }}" alt="Image" class="img-fluid" />
            </td>
            <td class="product-name">
                <h2 class="h5 text-black">
                    {{ $item->name }}
                </h2>
            </td>
            <td>Rp. {{ $item->price}}</td>
            <td>
                <div class="input-group mb-3" style="max-width: 120px">
                    <h2>{{ $item->quantity }}</h2>
                </div>
            </td>
            <td>Rp. {{ $item->total_price }}</td>
            <td>
                <a
                    href="/remove-from-cart/{{ $item['id'] }}"
                    class="btn btn-primary btn-sm"
                    >X</a
                >
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
