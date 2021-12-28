<?php

namespace App\Models\Admin;
use App\Models\UuiModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SubCategory;
class Category extends UuiModel
{
    use HasFactory;

    protected $table      = 'categories';
    protected $primaryKey  = 'category_id';

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'status',
    ];


}
