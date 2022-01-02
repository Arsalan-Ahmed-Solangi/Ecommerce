<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UuiModel;
class OrderProduct extends UuiModel
{
    use HasFactory;

    protected $table      = 'orders';
    protected $primaryKey  = 'order_product_id';

    protected $fillable = [
        'order_product_id',
        'order_id',
        'product_id',
        'cost',
        'order_amount',
        'order_status',

    ];

    public function orders(){

        return $this->belongsTo(Order::class, 'order_id');

    }

    public function products(){

        return $this->belongsTo(Product::class, 'product_id');

    }
}
