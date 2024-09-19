<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

class DataTable extends Component
{
    public $perPage = 5;
    public $search = '';


    public $deceasedId;

    public function render()
    {
        $donations = DB::table('donations')->join('members', 'members.id', '=', 'donations.memberId')
        ->select('members.*','members.id as memberId' , 'members.first_name' , 'members.last_name' , 'members.id_number' , 'donations.amount')
        ->where('deceasedId' , '=' , $this->deceasedId)
        ->Where('id_number' , 'like' , "%{$this->search}%")
        ->paginate($this->perPage);
        return view('livewire.data-table' , ['donations' => $donations , 'id' => $this->deceasedId]);
    }
}
