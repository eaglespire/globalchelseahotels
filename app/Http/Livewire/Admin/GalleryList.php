<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryList extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();
    }
    
    public function render()
    {
        $galleries = Gallery::latest()->paginate(6);
        return view('livewire.admin.gallery-list', compact('galleries'));
    }
}