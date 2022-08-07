<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'check_in_date_time',
        'check_out_date_time',
        'no_of_adult',
        'no_of_children',
        'no_of_rooms',
        'booking_type',
        'total_cost',
        'rooms',
        'duration'
    ];

    protected $casts = [
      'rooms' => 'array'  
    ];

    public function scopeFilter($query, $search)
    {
        return $query->whereHas('user', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%'); 
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

    public function scopeCurrentCheckInList($query, $currentDate)
    {
        return $query->where('created_at', 'like', '%' . $currentDate . '%');
    }

    public function scopeLatestBooking($query)
    {
        return $query->latest()->take(2)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}