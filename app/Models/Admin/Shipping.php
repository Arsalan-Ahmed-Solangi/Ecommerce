<?php

namespace App\Models\Admin;

use App\Models\UuiModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends UuiModel
{
    use HasFactory;

    protected $table      = 'shipping';
    protected $primaryKey  = 'shipping_id';

    protected $fillable = [
        'shipping_id',
        'shipping_title',
        'shipping_price',
        'status',

    ];

}
