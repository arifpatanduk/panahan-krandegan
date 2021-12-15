<?php

namespace App\Models\Admin\Ads;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'image',
        'link',
    ];
}
