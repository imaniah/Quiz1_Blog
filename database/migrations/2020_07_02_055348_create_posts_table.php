<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->integer('post_cat_id')->unsigned();
            $table->foreign('post_cat_id')->references('cat_id')->on('categories')
            ->oneDelete('cascade')->onUpdate('cascade');
            $table->date('post_date');
            $table->string('post_slug');
            $table->string('post_tittle');
            $table->text('post_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
