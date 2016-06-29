<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('article_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_article')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('text_comment');
            $table->foreign('id_article')->references('id')->on('blog_articles');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article_comments');
    }
}
