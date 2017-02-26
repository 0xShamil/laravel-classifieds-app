<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\{Category, Area, Listing};

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function favouriteListings()
    {
        return $this->morphedByMany(Listing::class, 'favouriteable')
                    ->withPivot(['created_at'])
                    ->orderByPivot('created_at', 'desc');
    }

    public function viewedListings()
    {
        return $this->belongsToMany(Listing::class, 'user_listing_views')
                    ->withTimestamps()
                    ->withPivot(['count', 'id']); 
    }
}
