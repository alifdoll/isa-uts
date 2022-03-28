<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Shipment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::select(
            "orders.id",
            "orders.user_id",
            "orders.created_at",
            "orders.paid_at",
            "users.id as users_id_name",
            "users.name"
        )
            ->join("users", "users.id", "=", "orders.user_id")
            ->get();
        return view('admin.transaction.homeTransaction', compact('order'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // $this->authorize('delete-permission', $order);


        try {
            $this->authorize('isAdmin', Auth::user());
            Order::destroy($order->id);
            return redirect()->route('admin.transaction.homeTransaction')->with('delete', 'Data Transaksi Berhasil Dihapus');
        } catch (\PDOException $e) {
        }

        // try {
        //     $order->delete();
        //     return redirect()->route('admin.transaction.homeTransaction')->with('delete', 'Data Transaction Berhasil Dihapus');
        // } catch (\PDOException $e) {
        // }
    }

    public function createOrder()
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

    public function result()
    {
        return view('products.result');
    }

    public function confirmOrder($id)
    {
        $date = Carbon::now();
        Order::where('id', $id)->update(['paid_at' => $date->toDateTimeString()]);
        return redirect()->back();
    }

    public function detailsTr($id)
    {
        $order = Order::select(
            "orders.id as order_id",
            "orders.paid_at as order_paid_at",
            "od.quantity as quantity",
            "od.total_price as total",
            "od.created_at as pembelian",
            "p.id as productId",
            "p.name as productName",
            "p.image as productImage",
            "p.price as unitPrice"
        )
            ->join("order_details as od", "od.order_id", "=", "orders.id")
            ->join("products as p", "p.id", "=", "od.product_id")
            ->where('order_id', $id)
            ->get();
        // $order = Order::find($id)->join("order_details", "order_details.order_id", "=", "orders.id");
        return view('admin.transaction.detail', compact('order'));
        // return dd($order);
    }

    public function history(Request $request)
    {
        $id = $request->get('id');
        $order = Order::select(
            "orders.id as order_id",
            "orders.paid_at as order_paid_at",
            "od.quantity as quantity",
            "od.total_price as total",
            "od.created_at as pembelian",
            "p.id as productId",
            "p.name as productName",
            "p.image as productImage",
            "p.price as unitPrice"


        )
            ->join("order_details as od", "od.order_id", "=", "orders.id")
            ->join("products as p", "p.id", "=", "od.product_id")
            ->where('order_id', $id)
            ->get();
        // $order = Order::find($id)->join("order_details", "order_details.order_id", "=", "orders.id");
        return response()->json(array(
            "msg" => $order
        ), 200);
    }

    public function detailShipment($id)
    {
        $shipment = Shipment::where('courier', $id)->get();
        return view('admin.shipment.detail', compact('shipment'));
    }
}
