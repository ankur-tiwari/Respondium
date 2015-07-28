<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public function getCreatedAtAttribute($value)
	{
		return \Carbon\Carbon::parse($value)->diffForHumans();
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function commentable()
	{
		return $this->morphTo();
	}

}
