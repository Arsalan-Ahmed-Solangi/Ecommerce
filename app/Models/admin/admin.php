<?php

namespace App\Models\Admin;
use App\Models\UuiModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends UuiModel
{
    use HasFactory;

    protected $table      = 'admin';

    protected $fillable =
        [
            'admin_id',
            'designation_id',
            'user_name',
            'user_password',
            'status',
        ];
}
