<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $table      = 'admin';

    protected $fillable =
        [
            'id',
            'designation_id',
            'user_name',
            'user_password',
            'status'
        ];
}
