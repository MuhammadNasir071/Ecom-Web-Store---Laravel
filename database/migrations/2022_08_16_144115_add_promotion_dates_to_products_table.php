<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPromotionDatesToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->uuid('vendor_id')->after('id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('run_continuously')->after('promotion_price')->default(0);
            $table->date('promotion_start_date')->after('run_continuously')->nullable();
            $table->date('promotion_end_date')->after('promotion_start_date')->nullable();
            $table->string('product_stock_owner')->after('promotion_end_date')->nullable();
            $table->integer('stock_limit')->after('product_stock_owner')->nullable();
            $table->unsignedBigInteger('shipping_type_id')->after('brand_id')->nullable();
            $table->foreign('shipping_type_id')->references('id')->on('shipping_types')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('vendor_id');
            $table->dropColumn('vendor_id');  
            $table->dropForeign('shipping_type_id');
            $table->dropColumn('shipping_type_id');
            $table->dropColumn('run_continuously');
            $table->dropColumn('promotion_start_date');
            $table->dropColumn('promotion_end_date');
            $table->dropColumn('product_stock_owner');
            $table->dropColumn('stock_limit');
        });
    }
}
