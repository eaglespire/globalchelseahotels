<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'admin_id',
        'is_published',
        'views',
        'image'
    ];


    public function scopeFilter($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('title', 'like', $search  . '%')
                ->orWhere('body', 'like', $search . '%');
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

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'owner_id');
    }

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function scopePrevious($query, $id)
    {
        return $query->where(function($query) use($id) {
                $query->where('id', '<', $id)->max('id');  
        });
    }

    public function scopeNext($query, $id)
    {
        return $query->where(function ($query) use ($id) {
            $query->where('id', '>', $id)->max('id');
        });

    }
    
}