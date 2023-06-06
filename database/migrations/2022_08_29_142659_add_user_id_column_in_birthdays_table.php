<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdColumnInBirthdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('birthdays'))
        {
            Schema::table('birthdays', function (Blueprint $table) {
                $table->foreignIdFor(User::class);
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('birthdays'))
        {
            Schema::table('birthdays', function (Blueprint $table) {
                $table->dropColumn('user_id');
            });
        }
    }
}
