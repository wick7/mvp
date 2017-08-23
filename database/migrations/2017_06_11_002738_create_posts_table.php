<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('org_site');
            $table->string('org_name');
            $table->string('avatar_photo');
            $table->text('description');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('title');
            $table->integer('user_id');
            $table->integer('organization_id')->nullable();
            $table->integer('photo_id')->nullable();
            $table->text('address_street')->nullable();
            $table->text('address_city')->nullable();
            $table->text('address_state')->nullable();
            $table->integer('address_zip')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
