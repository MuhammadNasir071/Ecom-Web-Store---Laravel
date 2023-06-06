<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreatePrivacyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privacy', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->boolean('is_active')->default('0');
            $table->foreignIdFor(User::class)->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('privacy');
    }
}
