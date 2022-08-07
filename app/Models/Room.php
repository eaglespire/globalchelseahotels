<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'image_url'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('room_no', 'like', $search  . '%')
                ->orWhere('name', 'like', $search . '%');
        });
    }

    public function scopeFilter($query, $filter)
    {
        return $query->where(function ($query) use($filter) {
             $query->where('status', 'like', $filter  . '%');
        });
    }


    public function scopeSort($query, $sortField, $sortAsc)
    {
        return $query->where(function ($query) use ($sortField, $sortAsc) {
            $query->when($sortField, function ($query) use ($sortField, $sortAsc) {
                $query->orderBy($sortField, $sortAsc ? 'asc' : 'desc');
            });
        });
    }

    public function scopeAvaliableRooms($query)
    {
        return $query->where(function ($query) {
            $query->where('status', 'Avaliable');
        })->get();
    }

    public function scopeUnAvaliableRooms($query)
    {
        return $query->where(function ($query) {
            $query->where('status', 'Unavaliable');
        })->get();
    }


    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPriceAttribute($value)
    {
        return number_format($value);
    }

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
        // return dd( public_path('storage/' . $value)) ?? asset('storage/' . $value);
    }

    public function getImageUrlAttribute()
    {
        $image = str_replace(config('app.url'), "", $this->image);
        return str_replace(config('app.url'), "", public_path($image));
    }
}
