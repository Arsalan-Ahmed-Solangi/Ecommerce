<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table      = 'categories';

    protected $fillable =
        [
            'category_id',
            'title',
            'description',
            'status',
        ];
}
