<?php

namespace App;

use App\Vote;
use App\View;
use Illuminate\Database\Eloquent\Model;
use App\Search\Traits\SearchableModel;

class Post extends Model
{
    use SearchableModel;

	protected $fillable = [
		'id', 'title', 'description', 'slug'
	];

    protected static $indexName = 'questions';

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
}
