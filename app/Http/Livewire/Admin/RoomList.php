<?php

namespace App\Http\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class RoomList extends Component
{
    use WithPagination;

    public $index = 0;
    public $enlist = 5;
    public $search = '';
    public $page = 1;
    public $active;
    public $sortField;
    public $filter = '';
    public $sortAsc = true;
    protected $queryString = [
        'sortAsc',
        'sortField',
        'search' => ['except' => ''],
        'filter' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortField = $field;
        }
    }

    public function destory($id)
    {
        Alert::success('Success Title', 'Success Message');
        Room::destroy($id);
    }


    public function render()
    {
        $rooms = Room::latest()
            ->search($this->search)
            ->filter($this->filter)
            ->sort($this->sortField, $this->sortAsc)
            ->paginate($this->enlist);
        return view('livewire.admin.room-list', compact('rooms'));
    }
}