<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Order;
use App\Shipment;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $order = Order::find($id);

        $p = User::where('roles', 'courier')->get();

        return view('admin.shipment.addShipment', compact('p', 'order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pricePerKm = 5000;
        $data = new Shipment();
        $data->pickup_address = $request->get('pickup_address');
        $data->destination_address = $request->get('destination_address');
        $data->courier_id = $request->get('courier');
        $data->sender_id = $request->get('sender');
        $data->shipment_date = $request->get('shipment_date');
        $data->item = $request->get('item');
        $data->distance = $request->get('distance');
        $data->price = $pricePerKm * $request->get('distance');

        $data->save();
        return redirect()->route('homeAdmin')->with('status', 'Data User berhasil ditambahkan');
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
    public function destroy($id)
    {
        //
    }
}
