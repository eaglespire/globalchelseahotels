<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateProfile extends Component
{
    use WithFileUploads;
    
    public $name;
    public $email;
    public $password;
    public $profile_pic;
    

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|string|email',
        'profile_pic' => 'nullable|image:jpg,jpeg,png',
        'password' => 'required|string'
    ];

    public function mount()
    {
        $this->name = admin()->name;
        $this->email = admin()->email;
    }
    
    public function updateProfile()
    {
        $attributes = $this->validate();
        
        $attributes['profile_pic'] = $attributes['profile_pic'] ? $attributes['profile_pic']->store('admin/profile_pic') : admin()->profile_pic;
        
        $attributes['password'] = Hash::make($this->password);

        admin()->update($attributes);
        
        Alert::success('Updated');
    }
    
    public function render()
    {
        return view('livewire.admin.update-profile');
    }
}