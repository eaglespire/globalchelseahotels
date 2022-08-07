<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class GuestList extends Component
{
    use WithPagination;

    public $index = 0;
    public $enlist = 5;
    public $search = '';
    public $page = 1;
    public $active;
    public $filter = '';
    protected $queryString = [
        'search' => ['except' => ''],
        'filter' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public function destory($id)
    {
        User::destroy($id);
    }
    
    public function render()
    {
        $guests = User::search($this->search)
            	        ->filter($this->filter)
                        ->latest()
                        ->paginate($this->enlist);
        return view('livewire.admin.guest-list', compact('guests'));
    }
}