<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFiledInUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('city')->nullable();
            $table->text('about')->nullable();
            $table->boolean('published_email')->default(true);
            $table->text('social_vk')->nullable();
            $table->text('social_fb')->nullable();
            $table->text('social_twitter')->nullable();
            $table->text('social_instagram')->nullable();
            $table->text('social_google')->nullable();
            $table->text('social_telegram')->nullable();
            $table->text('site')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->text('about')->nullable();
            $table->boolean('published_email')->default(false);
            $table->text('social_vk')->unique();
            $table->text('social_fb')->unique();
            $table->text('social_twitter')->unique();
            $table->text('social_instagram')->unique();
            $table->text('social_google')->unique();
            $table->text('social_telegram')->unique();
            $table->text('site')->nullable();
        });
    }
}
