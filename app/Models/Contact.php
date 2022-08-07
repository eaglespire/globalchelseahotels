<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'subject',
    ];

    public function scopeSearch($query, $search)
    {
        $query->where('name', 'like', $search . '%')
            ->orWhere('email', 'like', $search . '%');
    }
}
