<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class PostList extends Component
{
    use WithPagination;

    public $index = 0;
    public $enlist = 5;
    public $search = '';
    public $page = 1;
    public $active;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = [
        'sortAsc',
        'sortField',
        'search' => ['except' => ''],
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
        Post::destroy($id);
    }


    public function render()
    {
        $posts = Post::latest()
            ->filter($this->search)
            ->sort($this->sortField, $this->sortAsc)
            ->paginate(10);
        return view('livewire.admin.post-list', compact('posts'));
    }
}