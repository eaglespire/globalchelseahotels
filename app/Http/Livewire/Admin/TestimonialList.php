<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\Testimonial;
use Livewire\Component;

class TestimonialList extends Component
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
        Testimonial::destroy($id);
    }

    public function toggleStatus($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->is_approve) {
            $testimonial->is_approve = !$testimonial->is_approve;
        } else {
            $testimonial->is_approve = !$testimonial->is_approve;
        }
            $testimonial->save();
    }

    public function render()
    {
        $testimonials = Testimonial::search($this->search)
                    ->filter($this->filter)
                     ->latest()
                     ->paginate($this->enlist);
        return view('livewire.admin.testimonial-list', compact('testimonials'));
    }
}