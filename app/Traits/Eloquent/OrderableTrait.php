<?php 

namespace App\Traits\Eloquent;

trait OrderableTrait
{
	public function scopeLatestFirst($query)
    {
    	return $query->orderBy('created_at','desc');
    }
}