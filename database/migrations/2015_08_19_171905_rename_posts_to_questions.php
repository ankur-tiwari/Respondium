<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePostsToQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('questions');
        Schema::rename('posts', 'questions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('description');
            $table->string('slug')->unique();
            $table->integer('user_id');
            $table->integer('votes');
            $table->integer('answers');
            $table->integer('views');
            $table->timestamps();
        });
        Schema::rename('questions', 'posts');
    }
}
