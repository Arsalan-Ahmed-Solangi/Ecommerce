<?php

namespace App\Models\Admin;
use App\Models\UuiModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends UuiModel
{
    use HasFactory;
    protected $table      = 'colors';
    protected $primaryKey  = 'color_id';

    protected $fillable = [
        'color_id',
        'product_id',
        'status',
    ];

}
