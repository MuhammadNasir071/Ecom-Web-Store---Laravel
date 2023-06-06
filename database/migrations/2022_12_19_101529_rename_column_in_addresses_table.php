<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnInAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->renameColumn('city', 'city_id');
            $table->renameColumn('state', 'state_id');
            $table->renameColumn('country', 'country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->renameColumn('city_id', 'city');
            $table->renameColumn('state_id', 'state');
            $table->renameColumn('country_id', 'country');
        });
    }
}
