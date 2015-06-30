<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	public function getCreatedAtAttribute($value)
	{
		return \Carbon\Carbon::parse($value)->format('c');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
