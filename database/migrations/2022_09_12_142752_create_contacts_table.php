<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('birthdays');

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'contact_user_id')->nullable();
            $table->string('name');
            $table->string('contact_number');
            $table->string('email')->nullable();
            $table->string('nick_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('image')->nullable();

            $table->enum('gender', ['male', 'female', 'other'])->default('other');
            $table->text('street_address')->nullable();
            $table->text('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('company')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
