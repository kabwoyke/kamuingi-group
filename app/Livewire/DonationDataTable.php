<?php

namespace App\Livewire;

use App\Models\Deceased;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DonationDataTable extends Component
{
    public $perPage = 5;
    public $search = '';
    // public $donations_per_page = '';
    public function render()
    {
        $donations = DB::table('deceased')->join('members', 'members.id', '=', 'deceased.memberId')
        ->where('deadline_date' , '>' , now())
        ->Where('id_number' , 'like' , "%{$this->search}%")

        ->paginate($this->perPage);
        return view('livewire.donation-data-table',['donations' => $donations]);
    }
}
