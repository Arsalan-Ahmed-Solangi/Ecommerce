<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UuiModel;
class Review extends UuiModel
{
    use HasFactory;
    protected $table      = 'reviews';
    protected $primaryKey  = 'review_id';

    protected $fillable = [
        'review_id',
        'user_id',
        'product_id',
        'ratings',
        'message',
    ];
}
