<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Order;
use Illuminate\Http\Request;
use App\Product;
use App\Shipment;
use App\Users;
use Exception;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->roles == 'administrator') {
            return $this->adminView();
        } else if ($user->roles == 'sender') {
            $shipment = Shipment::where('sender_id', Auth::user()->id)->get();
            // return dd(Crypt::decryptString($shipment[0]->pickup_address));
            return view('sender.home', compact('shipment'));
        } else {
            $shipment = Shipment::where('courier_id', Auth::user()->id)->get();
            return view('courier.home', compact('shipment'));
        }
    }

    public function adminView()
    {
        $p = User::all();
        return view('admin.home', compact('p'));
    }

    public function editUser($id)
    {
        $p = User::find($id);
        return view('admin.pegawai.editPegawai', compact('p'));
    }

    public function sendItemView()
    {
        $courier = User::where('roles', 'courier')->get();
        return view('sender.addShipment', compact('courier'));
    }

    public function createLoc($id)
    {
        return view('courier.addLocation', compact('id'));
    }
}
