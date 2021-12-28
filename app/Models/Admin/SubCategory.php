<?php

namespace App\Models\Admin;
use App\Models\UuiModel;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends UuiModel
{
    use HasFactory;
    protected $table      = 'sub_categories';
    protected $primaryKey  = 'sub_category_id';
    protected $fillable =
    [
        'sub_category_id',
        'category_id',
        'title',
        'status',
    ];


    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }



}
