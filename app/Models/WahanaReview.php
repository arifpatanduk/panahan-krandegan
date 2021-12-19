<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WahanaReview extends Model
{
    use HasFactory;

    protected $table = 'wahana_reviews';

    protected $guarded = [];

    public function userReview()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
