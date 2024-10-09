<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DonationHistory extends Component
{
    public $perPage = 5;
    public $search = '';
    public $drive_status = 'ongoing';
    public $from = '';
    public $to = '';

    public function render()
    {

        $donations = DB::table('deceased')->join('members', 'members.id', '=', 'deceased.memberId')
        ->select('deceased.*','members.id as memberId' , 'members.first_name' , 'members.last_name' , 'members.id_number' , 'deceased.created_at as range')
        ->whereBetween('deceased.created_at' , [$this->from , $this->to])
        ->where('drive_status' , 'completed')
        ->paginate($this->perPage);

        return view('livewire.donation-history', ['donations' => $donations]);
    }
}
