<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class BookingList extends Component
{
    use WithPagination;

    public $index = 0;
    public $enlist = 5;
    public $search = '';
    public $currentDate = NULL;
    public $page = 1;
    public $active;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = [
        'sortAsc',
        'sortField',
        'enlist',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'currentDate' => ['except' => ''],
        
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
        Booking::destroy($id);
    }


    public function render()
    {
        $bookings = Booking::filter($this->search)
            ->currentCheckInList($this->currentDate)
            ->sort($this->sortField, $this->sortAsc)
            ->latest()->paginate($this->enlist);
        return view('livewire.admin.booking-list', compact('bookings'));
    }
}