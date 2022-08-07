<?php

namespace App\Http\Livewire\Admin;

use App\Models\AboutSection;
use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        $about = AboutSection::first();
        return view('livewire.admin.about-page', compact('about'));
    }
}