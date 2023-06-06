<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdAndLevelPrivacy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('privacy', function (Blueprint $table) {
            $table->integer('parent_id')->after('is_active')->nullable();
            $table->integer('level')->after('parent_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('privacy', function($table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('level');
        });
    }
}
