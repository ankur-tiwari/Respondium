<?php

use App\HtmlGenerators\AnswerVideo;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnswerVideoTest extends TestCase
{
    protected $answerVideo;

    public function setUp()
    {
        $this->answerVideo = new AnswerVideo;
    }
}
