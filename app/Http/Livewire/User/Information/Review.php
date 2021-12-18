<?php

namespace App\Http\Livewire\User\Information;

use App\Models\Admin\Information\Information;
use App\Models\Admin\Information\InformationReview;
use Livewire\Component;

class Review extends Component
{

    //for key
    public $user;

    //variable
    public $reviews;
    public $userReviewed;

    //existing data
    public $information;
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
        $this->userReviewed = InformationReview::where('information_id', $this->information->id)->where('user_id', $this->user->id)->first();
        $this->reviews = InformationReview::where('information_id', $this->information->id)->whereNotIn('user_id',[$this->user->id])->get();
        
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
        return view('livewire.user.information.review');
    }

    
    public function editReview()
    {
        $this->editReview = true;
        $this->emit('editReview');
    }

    public function deleteReview()
    {
        
        $reviewData = InformationReview::where('information_id', $this->information->id)->where('user_id', $this->user->id)->first();
        
        //min rating
        $data_information = Information::where('id',$this->information->id)->first();
        $total_rating = (int) $data_information->total_rating - (int) $reviewData->rating;
        $data_information->update([
            'total_rating'=>$total_rating
        ]);

        $reviewData->delete($reviewData->id);
        $this->isReviewed = false;
        $this->mount();
        session()->flash('reviewDeleted', 'berhasil mengahpus ulasan');
    }

    public function reviewStored()
    {
        $this->mount();
        $this->editReview = false;
        session()->flash('reviewStored', 'berhasil memberikan ulasan');
    }
}
