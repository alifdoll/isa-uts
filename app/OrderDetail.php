<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;
    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'total_price'];
}
