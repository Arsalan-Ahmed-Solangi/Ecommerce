<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UuiModel;
class ProductImage extends UuiModel
{
    use HasFactory;

    protected $table      = 'products';
    protected $primaryKey  = 'product_id';

    protected $fillable = [
        'product_image_id',
        'product_id',
        'product_image',

    ];
}
