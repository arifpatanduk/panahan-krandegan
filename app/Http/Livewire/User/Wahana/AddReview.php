<?php

namespace App\Http\Livewire\User\Wahana;

use App\Models\Wahana;
use App\Models\WahanaReview;
use Livewire\Component;

class AddReview extends Component
{
    //variable
    public $rate, $review, $user;

    //exiting data
    public $wahana;


    protected $listeners = [
        'editReview',
    ];

    public function resetInputField()
    {
        $this->rate = null;
        $this->review = null;
    }


    public function render()
    {
        return view('livewire.user.wahana.add-review');
    }


    public function storeReview()
    {
        $this->validate([
                'rate' => 'required|max:5',
                'review' => 'required'
            ]);
        
        $review_existing = WahanaReview::where(['user_id'=>$this->user->id, 'wahana_id' => $this->wahana->id])->first(); 
        $wahana_data = Wahana::where('id', $this->wahana->id)->first();
        $existing_rating = $review_existing!=null ? $review_existing->rating : 0;
        $total_rating = (int) $wahana_data->total_rating - (int) $existing_rating + (int) $this->rate;
        
        WahanaReview::updateOrCreate(
            ['user_id'=>$this->user->id],
            [
                'wahana_id' => $this->wahana->id,
                'rating' => $this->rate,
                'review' => $this->review
            ]
        );

        
        $wahana_data->update([
            'total_rating'=> $total_rating
        ]);

        $this->resetInputField();
        $this->emit('reviewStored');
    }

    public function editReview()
    {
        $reviewData = WahanaReview::where('wahana_id', $this->wahana->id)->where('user_id', $this->user->id)->first();
        $this->rate = $reviewData->rating;
        $this->review = $reviewData->review;
    }
}
