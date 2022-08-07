<?php

namespace App\Http\Livewire\Admin;

use App\Models\AboutSection;
use Livewire\Component;

class EditAboutUs extends Component
{
    public function render()
    {
        $about = AboutSection::first();
        return view('livewire.admin.edit-about-us', compact('about'));
    }
}