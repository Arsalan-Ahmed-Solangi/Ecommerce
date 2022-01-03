<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UuiModel;
class Cart extends UuiModel
{
    use HasFactory;

    protected $table      = 'cart';
    protected $primaryKey  = 'cart_id';

    protected $fillable = [
        'cart_id',
        'product_id',
        'color',
        'quantity',
    ];

}
