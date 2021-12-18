<?php

namespace App\Models\Admin\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function informationImages()
    {
        return $this->hasMany(InformationImages::class, 'information_id', 'id');
    }

    public function informationReviews()
    {
        return $this->hasMany(InformationReview::class);
    }
}
