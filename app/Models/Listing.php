<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Eloquent\{OrderableTrait, PivotOrderableTrait};

use App\Models\{User, Category, Area};

use Laravel\Scout\Searchable;

class Listing extends Model
{
    use SoftDeletes, OrderableTrait, PivotOrderableTrait, Searchable;

    public function scopeIsLive($query)
    {
    	return $query->where('live', true);
    }

    public function scopeIsNotLive($query)
    {
    	return $query->where('live', false);
    }

    public function scopeFromCategory($query, Category $category)
    {
    	return $query->where('category_id', $category->id);
    }

    public function scopeInArea($query, Area $area)
    {
    	return $query->whereIn('area_id', array_merge(
    		[$area->id],
    		$area->descendants->pluck('id')->toArray()
    	));
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function area()
    {
    	return $this->belongsTo(Area::class);
    }

    public function live()
    {
    	return $this->live;
    }

    public function cost()
    {
    	return $this->category->price;
    }

    public function favourites()
    {
        return $this->morphToMany(User::class, 'favouriteable');
    }

    public function favouritedBy(User $user)
    {
        return $this->favourites->contains($user);
    }

    public function viewedUsers()
    {
        return $this->belongsToMany(User::class, 'user_listing_views')
                    ->withTimestamps()
                    ->withPivot(['count']); 
    }

    public function views()
    {
        return array_sum($this->viewedUsers->pluck('pivot.count')->toArray());
        
        //return $this->viewedUsers()->sum('count');
    }

    public function ownedByUser(User $user)
    {
        return $this->user->id === $user->id;
    }
}
