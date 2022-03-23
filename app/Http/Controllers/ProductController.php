<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\CartSession;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Shipment;
use App\Shipment_Stop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('products.listproduct', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product();



        $data->name = $request->get('name');
        $data->description = $request->get('description');
        $data->image = $request->get('image');
        $data->price = $request->get('price');
        
        $data->cpu = $request->get('cpu');
        $data->ram = $request->get('ram');
        $data->storage = $request->get('storage');
        $data->graphics = $request->get('graphics');
        $data->display = $request->get('display');
        $data->battery_capacity = $request->get('battery_capacity');
        $data->color = $request->get('color');
        $data->dimensions = $request->get('dimensions');
        $data->weight = $request->get('weight');
        $data->ports = $request->get('ports');
        $data->connectivity = $request->get('connectivity');
        $data->category_id = $request->get('category_id');
        $data->brand_id = $request->get('brand_id');

        $data->save();
        return redirect()->route('admin.product.homeProduct')->with('status', 'Data Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->image = $request->get('image');
        $product->price = $request->get('price');
        
        $product->cpu = $request->get('cpu');
        $product->ram = $request->get('ram');
        $product->storage = $request->get('storage');
        $product->graphics = $request->get('graphics');
        $product->display = $request->get('display');
        $product->battery_capacity = $request->get('battery_capacity');
        $product->color = $request->get('color');
        $product->dimensions = $request->get('dimensions');
        $product->weight = $request->get('weight');
        $product->ports = $request->get('ports');
        $product->connectivity = $request->get('connectivity');
        $product->category_id = $request->get('category_id');
        $product->brand_id = $request->get('brand_id');

        $product->save();
        return redirect()->route('admin.product.homeProduct')->with('status', 'Data Product berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('admin.product.homeProduct')->with('delete', 'Data brand Berhasil Dihapus');
        } catch (\PDOException $e) {
        }
    }

    public function addToCart(Request $request, $id)
    {
        // $cart = CartSession::where("id", "")
        // $cartSession = CartSession::create(Auth::user()->id);
        // CartItem::create([
        //     "session_id"=>$cartSession->id,
        //     "product_id"=>$id,
        //     "quantity"=>$request->post('quantity')
        // ]);
        $p = Product::find($id);
        $cart = session()->get('cart');
        if (!isset($cart[$id])) {
            $cart[$id] = [
                "id" => $p->id,
                "image" => $p->image,
                "name" => $p->name,
                "quantity" => $request->post('quantity'),
                "price" => $p->price,

            ];
        } else {
            $cart[$id]["quantity"] += $request->post('quantity');
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function removeFromCart($id)
    {
        $p = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product deleted from cart successfully');
    }

    public function cart()
    {
        $cart = session()->get('cart');
        return view('products.cart', compact('cart'));
        // return dd(Auth::user()->id);
    }

    public function compareView()
    {
        $product1 = Product::All();
        $product2 = Product::All();
        return view('products.compare', compact('product1', 'product2'));
    }

    public function compare(Request $request)
    {
        $id = $request->get('id');
        $product = Product::find($id);
        return response()->json(array(
            "msg" => $product
        ), 200);
    }

    public function checkout()
    {
        $cart = session()->get('cart');
        return view('products.checkout', compact('cart'));
        // if ($cart == null) {
        //     abort(404);
        // } else {
        //     // return dd($cart);
        //     return view('products.checkout', compact('cart'));
        // }
    }

    public function order()
    {
        $cart = session()->get('cart');
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $saved = $order->save();
        foreach ($cart as $item) {
            $detail = new OrderDetail;
            $detail->order_id = $order->id;
            $detail->product_id = $item['id'];
            $detail->quantity = $item['quantity'];
            $detail->total_price = $item['quantity'] * $item['price'];
            $detail->save();
        }

        if (!$saved) {
            abort(500, 'error');
        } else {
            session()->forget('cart');
            return redirect()->route('result');
        }
    }

    public function history()
    {
        $order = Order::where('user_id', Auth::user()->id)->get();
        $shipment=[];
        $shipment_stop=[];
        foreach($order as $o)
        {
            $shipment[] = Shipment::where('order_id', $o->id)->get();
        }
        // foreach($shipment as $s)
        // {
        //     $shipment_stop[] = Shipment_Stop::where('shipment_id', $s->id)->get();
        // }
        // $order = Order::find(1);
        // return dd($order[0]->details);
        return view('products.history', compact('order','shipment'));
        // dd($shipment);
    }

    public function shipmentHistory(Request $request)
    {
        $id = $request->get('id');
        $shipment_stop = Shipment_Stop::select(
            "sequence",
            "current_location"
        ) 
        ->join("shipments as s", "s.id", "=", "shipment_stops.shipment_id")
        ->where('shipment_id', $id)
        ->get();
        // $order = Order::find($id)->join("order_details", "order_details.order_id", "=", "orders.id");
        return response()->json(array(
            "msg" => $shipment_stop
        ), 200);
        // dd($shipment_stop);
    }
}
