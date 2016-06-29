<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_articles', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_blog')->unsigned();
            $table->text('title');
            $table->text('meta_key');
            $table->text('meta_desc');
            $table->longText('full_text');
            $table->string('path_image')->default('no_img_article.jpg');
            $table->foreign('id_blog')->references('id')->on('blogs');
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
        Schema::drop('blog_articles');
    }
}
