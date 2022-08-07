<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\WithPagination;
use Livewire\Component;

class InboxMessages extends Component
{
    use WithPagination;

    public $index = 0;
    public $enlist = 5;
    public $search = '';
    public $page = 1;
    public $active;
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public function destory($id)
    {
        Contact::destroy($id);
    }
    public function render()
    {
        $inboxes = Contact::search($this->search)
                            ->latest()
                            ->paginate($this->enlist);

        return view('livewire.admin.inbox-messages', compact('inboxes'));
    }
}
