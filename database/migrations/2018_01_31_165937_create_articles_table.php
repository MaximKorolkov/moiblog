<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('general_image')->nullable();
            $table->string('image')->nullable();
            $table->boolean('view_image')->default(false);
            $table->string('header_h1')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('author')->nullable();
            $table->string('per_post')->nullable();
            $table->string('per_post_url')->nullable();
            $table->string('next_post')->nullable();
            $table->string('next_post_url')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('show_post')->default(false);
            $table->boolean('general_article')->default(false);
            $table->boolean('second_article')->default(false);
            $table->boolean('third_article')->default(false);
            $table->integer('width_image')->nullable();
            $table->integer('height_image')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
