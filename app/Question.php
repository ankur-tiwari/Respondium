<?php

namespace App;

use App\Services\Search\Searchable;
use App\View;
use App\Vote;
use Illuminate\Database\Eloquent\Model;

class Question extends Model implements Searchable
{
	protected $fillable = [
		'id', 'title', 'description', 'slug'
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

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function getViews()
    {
        return $this->views->count();
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

    public function search($keyword)
    {
        return self::where('title', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')->latest()->paginate(10);
    }
}
