<?php

namespace App\Http\Livewire\User\Information;

use App\Models\Admin\Information\Information;
use App\Models\Admin\Information\InformationReview;
use Livewire\Component;

class AddReview extends Component
{
    //variable
    public $rate, $review, $user;

    //exiting data
    public $information;


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
        return view('livewire.user.information.add-review');
    }


    public function storeReview()
    {
        $this->validate([
                'rate' => 'required|max:5',
                'review' => 'required'
            ]);
        
        $review_existing = InformationReview::where(['user_id'=>$this->user->id, 'information_id' => $this->information->id])->first(); 
        $information_data = Information::where('id', $this->information->id)->first();
        $existing_rating = $review_existing!=null ? $review_existing->rating : 0;
        $total_rating = (int) $information_data->total_rating - (int) $existing_rating + (int) $this->rate;
        
        InformationReview::updateOrCreate(
            ['user_id'=>$this->user->id],
            [
                'information_id' => $this->information->id,
                'rating' => $this->rate,
                'review' => $this->review
            ]
        );

        
        $information_data->update([
            'total_rating'=> $total_rating
        ]);

        $this->resetInputField();
        $this->emit('reviewStored');
    }

    public function editReview()
    {
        $reviewData = InformationReview::where('information_id', $this->information->id)->where('user_id', $this->user->id)->first();
        $this->rate = $reviewData->rating;
        $this->review = $reviewData->review;
    }

}
