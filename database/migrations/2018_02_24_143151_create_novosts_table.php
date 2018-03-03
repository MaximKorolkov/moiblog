<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novosts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url')->unique();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('tag_h1')->nullable();
            $table->string('general_image')->nullable();
            $table->string('author')->nullable();
            $table->boolean('show_image')->default(false);
            $table->text('text')->nullable();
            $table->integer('img_width')->nullable();
            $table->integer('img_height')->nullable();
            $table->boolean('show_news')->default(false);
            $table->boolean('published')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novosts');
    }
}
