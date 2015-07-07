<?php

namespace App;

use App\Vote;
use App\View;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = [
		'title', 'description', 'slug'
	];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getViews()
    {
        return View::where('post_id', $this->id)->get()->count();
    }

    public function getVotes()
    {
        $upvotes = Vote::where('post_id', $this->id)->where('type', 'upvote')->get()->count();

        $downvotes = Vote::where('post_id', $this->id)->where('type', 'downvote')->get()->count();

        return $upvotes - $downvotes;
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
