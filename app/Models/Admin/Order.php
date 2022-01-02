<?php

namespace App\Models\Admin;
use App\Models\UuiModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends UuiModel
{
    use HasFactory;
    protected $table      = 'orders';
    protected $primaryKey  = 'order_id';

    protected $fillable = [
        'order_id',
        'user_id',
        'order_no',
        'order_amount',
        'order_status',

    ];
}
