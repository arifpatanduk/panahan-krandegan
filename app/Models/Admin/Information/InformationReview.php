<?php

namespace App\Models\Admin\Information;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationReview extends Model
{
    use HasFactory;

    protected $table = 'information_review';

    protected $guarded = [];

    public function userReview()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
