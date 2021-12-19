<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wahana extends Model
{
    use HasFactory;

    protected $table = 'wahana';
    protected $guarded = [];

    public function wahanaImages()
    {
        return $this->hasMany(WahanaImage::class, 'wahana_id', 'id');
    }

    public function informationReviews()
    {
        return $this->hasMany(WahanaReview::class);
    }
}
