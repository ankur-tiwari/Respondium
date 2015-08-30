<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	protected $fillable = [
		'description', 'video_url', 'user_id'
	];

	public function questions()
	{
		return $this->belongsTo('App\Question');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function delete()
    {
    	Comment::where('commentable_type', self::class)->where('commentable_id', $this->id)->delete();

    	return parent::delete();
    }
}
