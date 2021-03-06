<?php

namespace App\Http\Controllers;

use App\Shipment;
use App\Shipment_Stop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;


class ShipmentController extends Controller
{

    public function store(Request $request)
    {
        $pricePerKm = 5000;
        $data = new Shipment();
        $data->pickup_address = Crypt::encrypt($request->get('pickup_address'));
        $data->destination_address = Crypt::encrypt($request->get('destination_address'));
        $data->courier_id = $request->get('courier');
        $data->sender_id = $request->get('sender');
        $data->shipment_date = $request->get('shipment_date');
        $data->item = $request->get('item');
        $data->distance = $request->get('distance');
        $data->price = $pricePerKm * $request->get('distance');

        $data->save();
        return redirect()->route('home')->with('status', 'Data User berhasil ditambahkan');
    }



    public function shipped($id)
    {
        Shipment::where('id', $id)
            ->update(['shipped' => 1]);
        return redirect()->route('home')->with('status', 'Data Product berhasil diubah');
    }

    public function storeLoc(Request $request)
    {
        $stops = Shipment_Stop::where('shipment_id', $request->get('id'))->get();
        $data = new Shipment_Stop();
        $data->shipment_id = $request->get('shipment_id');

        $data->current_location = Crypt::encrypt($request->get('current_location'));
        if (count($stops) == 0) {
            $data->sequence = 1;
        }
        $data->sequence = count($stops) + 1;
        $data->save();
        return redirect()->route('home')->with('status', 'Lokasi barang berhasil ditambahkan');
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
            $shipped = Shipment::where('sender_id', Auth::user()->id)->where('shipped', 1)->get();
            $html = view('sender.report', compact('shipment', 'shipped'))->render();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHtml($html);
            $pdf->setPaper('a3', 'landscape');
            return $pdf->download('report_sender.pdf');
        } else {
            abort(403, 'Unauthorized Act');
        }
    }

    public function courierReport()
    {
        $user = Auth::user();
        if ($user->roles == 'courier') {
            $shipment = Shipment::where('courier_id', Auth::user()->id)->get();
            $shipped = Shipment::where('courier_id', Auth::user()->id)->where('shipped', 1)->get();
            $html = view('courier.report', compact('shipment', 'shipped'))->render();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHtml($html);
            $pdf->setPaper('a3', 'landscape');
            return $pdf->download('report_courier.pdf');
        } else {
            abort(403, 'Unauthorized Act');
        }
    }

    public function adminReport()
    {
        $user = Auth::user();
        if ($user->roles == 'administrator') {
            $users = User::all();
            $suspendedCourier = User::where('suspend', 1)->where('roles', 'courier')->get();
            $suspendedSender = User::where('suspend', 1)->where('roles', 'sender')->get();
            $html = view('admin.report', compact('users', 'suspendedCourier', 'suspendedSender'))->render();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHtml($html);
            $pdf->setPaper('a3', 'landscape');
            return $pdf->download('report_admin.pdf');
        } else {
            abort(403, 'Unauthorized Act');
        }
    }
}
