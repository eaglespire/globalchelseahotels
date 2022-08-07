<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', $search . '%')
                      ->orWhere('email', 'like', $search . '%');
    }

    public function scopeFilter($query, $filter)
    {
        return $query->where('is_approve', 'like', $filter . '%');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approve', true);
    }

    public function scopeNotApproved($query)
    {
        return $query->where('is_approve', false);
    }

    public function getProfilePicAttribute($value)
    {
        return asset($value ? 'storage/'. $value : 'images/user_1.png');
    }
}