<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment_Stop extends Model
{
    // use SoftDeletes;
    protected $table = 'shipment_stops';
    protected $fillable = ['shipment_id', 'sequence', 'current_location'];
}
