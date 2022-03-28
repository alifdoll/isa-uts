<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id'];


    public function details()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function shipment()
    {
        return $this->hasOne('App\Shipment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
