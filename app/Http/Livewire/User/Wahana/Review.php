<?php

namespace App\Http\Livewire\User\Wahana;

use App\Models\Wahana;
use App\Models\WahanaReview;
use Livewire\Component;

class Review extends Component
{
    //for key
    public $user;

    //variable
    public $reviews;
    public $userReviewed;

    //existing data
    public $wahana;
    public $totalReviews;

    //conditional
    public $isReviewed = false;
    public $isReviewedAll = false;
    public $editReview = false;

    protected $listeners = [
        'reviewStored'
    ];

    public function mount()
    {
        if($this->user != null){
            $this->userReviewed = WahanaReview::where('wahana_id', $this->wahana->id)->where('user_id', $this->user->id)->first();
            $this->reviews = WahanaReview::where('wahana_id', $this->wahana->id)->whereNotIn('user_id',[$this->user->id])->get();
        } else {
            $this->reviews = WahanaReview::where('wahana_id', $this->wahana->id)->get();
        }
        
        
        $this->totalReviews = 0;
        if($this->userReviewed != null){
            $this->isReviewed = true;
            $this->totalReviews+=1;
        }

        if($this->reviews != null){
            $this->isReviewedAll = true;
            $this->totalReviews += count($this->reviews);
        }
    }



    public function render()
    {
        return view('livewire.user.wahana.review');
    }

    public function editReview()
    {
        $this->editReview = true;
        $this->emit('editReview');
    }

    public function deleteReview()
    {
        
        $reviewData = WahanaReview::where('wahana_id', $this->wahana->id)->where('user_id', $this->user->id)->first();
        
        //min rating
        $data_wahana = Wahana::where('id',$this->wahana->id)->first();
        $total_rating = (int) $data_wahana->total_rating - (int) $reviewData->rating;
        $data_wahana->update([
            'total_rating'=>$total_rating
        ]);

        $reviewData->delete($reviewData->id);
        $this->isReviewed = false;
        $this->mount();
        session()->flash('reviewDeleted', 'berhasil menghapus ulasan');
    }

    public function reviewStored()
    {
        $this->mount();
        $this->editReview = false;
        session()->flash('reviewStored', 'berhasil memberikan ulasan');
    }
}
