<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinAndMaxDaysToShippingTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipping_types', function (Blueprint $table) {
            $table->integer('is_active')->after('slug')->default(0);
            $table->integer('min_shipping_days')->after('is_active')->nullable();
            $table->integer('max_shipping_days')->after('min_shipping_days')->nullable();
            $table->integer('shipping_cost')->after('max_shipping_days')->nullable();

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
        Schema::table('shipping_types', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('min_shipping_days');
            $table->dropColumn('max_shipping_days');
            $table->dropColumn('shipping_cost');
        });
    }
}
