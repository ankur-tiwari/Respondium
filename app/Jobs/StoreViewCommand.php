<?php

namespace App\Jobs;

use App\View;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class StoreViewCommand extends Job implements SelfHandling
{
    public $ip;

    public $postId;

    public function __construct($ip, $postId)
    {
        $this->ip = $ip;

        $this->postId = $postId;
    }


    public function handle()
    {
        $view = View::where('post_id', $this->postId)->where('ip', $this->ip)->first();
        if (is_null($view))
        {
            $view = new View();

            $view->ip = $this->ip;

            $view->post_id = $this->postId;

            $view->save();

            return $view;
        }
    }
}
