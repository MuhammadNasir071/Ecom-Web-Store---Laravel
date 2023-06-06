<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->uuid('to_user_id');
            $table->foreign('to_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('from_user_id');
            $table->foreign('from_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('action');
            $table->string('node_type');
            $table->string('node_id')->nullable();
            $table->mediumText('message')->nullable();
            $table->enum('seen',['0','1'])->default(0);
            $table->enum('read',['0','1'])->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
