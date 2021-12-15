<?php

namespace App\Models\Admin\Gallery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        // 'admin_id',
        'title',
        'image',
        'desc',
    ];
}
