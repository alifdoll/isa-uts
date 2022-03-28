<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    // use SoftDeletes;
    protected $fillable = ['order_id'];


    public function details()
    {
        return $this->hasMany('App\Shipment_Stop');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
