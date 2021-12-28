<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UuiModel extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
    ];
}
