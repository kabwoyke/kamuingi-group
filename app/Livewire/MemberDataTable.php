<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class MemberDataTable extends Component
{

    use WithPagination;

    public $members_per_page = 5;
    public $search = '';
    public $filter_by = '';

    public function render()
    {
        $members = Member::search($this->search)->filter($this->filter_by)->paginate($this->members_per_page);
        return view('livewire.member-data-table' , ['members' => $members]);
    }
}
