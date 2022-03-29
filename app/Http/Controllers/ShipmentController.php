<?php

namespace App\Http\Controllers;

use App\Shipment;
use App\Shipment_Stop;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{

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



    public function shipped(Shipment $shipment)
    {
        $shipment->shipped = 1;
        $shipment->save();
        return redirect()->route('homeAdmin')->with('status', 'Data Product berhasil diubah');
    }

    public function storeLoc(Request $request)
    {
        $stops = Shipment_Stop::where('shipment_id', $request->get('id'))->get();
        $data = new Shipment_Stop();
        $data->shipment_id = $request->get('shipment_id');

        $data->current_location = $request->get('current_location');
        if (count($stops) == 0) {
            $data->sequence = 1;
        }
        $data->sequence = count($stops) + 1;
        $data->save();
        return redirect()->route('homeAdmin')->with('status', 'Data User berhasil ditambahkan');
    }

    public function getTrack($id)
    {
        $stops = Shipment::where('id', $id)->get();
        return view("sender.track", compact('stops'));
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
