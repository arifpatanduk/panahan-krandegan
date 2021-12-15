<?php

namespace App\Models\Admin\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Information extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];
}
