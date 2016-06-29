<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_category')->unsigned();
            $table->string('title');
            $table->mediumText('description');
            $table->string('path_image')->default('no_img_blog.jpg');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('blog_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('blogs');
    }

}
