<?php

namespace App\Models\Admin;

use App\Models\UuiModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends UuiModel
{
    use HasFactory;

    protected $table      = 'products';
    protected $primaryKey  = 'product_id';

    protected $fillable = [
        'product_id',
        'category_id',
        'sub_category_id',
        'product_no',
        'product_name',
        'product_price',
        'product_selling_price',
        'product_stock',
        'product_weight', 
        'is_feature',
        'product_description',
        'status',
    ];


    // $table->string('category_id');
    // $table->string('sub_category_id');
    // $table->string('product_no');
    // $table->string('product_name');
    // $table->string('product_description');
    // $table->string('product_no');
    // $table->string('product_price');
    // $table->string('product_selling_price');
    // $table->integer('product_stock');
    // $table->string('product_weight');
    // $table->integer('is_feature');
    // $table->integer('status')->default(1);

}
