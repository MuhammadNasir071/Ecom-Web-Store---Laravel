<?php

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(State::class);
            $table->string('state_code');
            $table->foreignIdFor(Country::class);
            $table->string('country_code');
            $table->decimal('latitude')->default(NULL);
            $table->decimal('longitude')->default(NULL);
            $table->timestamps();
            $table->integer('flag')->default(1);
            $table->string('wikiDataId')->default(NULL);
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
        Schema::dropIfExists('cities');
    }
}
