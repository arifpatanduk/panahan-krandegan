<?php

namespace App\Models\Admin\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationType extends Model
{
    use HasFactory;

    protected $table='information_type';
    protected $guarded = [];
}
