<?php

namespace App\Http\Controllers;

use App\Shipment;
use App\Shipment_Stop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

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
        return redirect()->route('home')->with('status', 'Data User berhasil ditambahkan');
    }



    public function shipped(Shipment $shipment, $id)
    {

        // User::where('id', $user->id)
        //     ->update(['password' => Hash::make("password")]);

        // return dd($id);
        Shipment::where('id', $id)
            ->update(['shipped' => 1]);

        // $shipment->shipped = 1;
        // $shipment->save();
        return redirect()->route('home')->with('status', 'Data Product berhasil diubah');
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
        return redirect()->route('home')->with('status', 'Data User berhasil ditambahkan');
    }

    public function getTrack($id)
    {
        $stops = Shipment::where('id', $id)->get();
        return view("sender.track", compact('stops'));
    }

    public function senderReport()
    {
        $user = Auth::user();
        if ($user->roles == 'sender') {
            $shipment = Shipment::where('sender_id', Auth::user()->id)->get();
            $html = view('sender.report', compact('shipment'))->render();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHtml($html);
            return $pdf->download('report_sender.pdf');
        } else {
            abort(403, 'Unauthorized Act');
        }
    }
}
