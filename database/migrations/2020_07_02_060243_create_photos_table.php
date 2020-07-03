<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('photo_id');
            $table->integer('photo_post_id')->unsigned();
            $table->foreign('photo_post_id')->references('post_id')->on('posts')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->date('photo_date');
            $table->string('photo_slug');
            $table->string('photo_title');
            $table->text('photo_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
