<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UuiModel;
class ProductImage extends UuiModel
{
    use HasFactory;

    protected $table      = 'product_images';
    protected $primaryKey  = 'product_image_id';

    protected $fillable = [
        'product_image_id',
        'product_id',
        'product_image',

    ];
    public function setFilenamesAttribute($value)
    {
        $this->attributes['product_image'] = json_encode($value);
    }
}
