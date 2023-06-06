<?php

use App\Models\Contact;
use App\Models\Privacy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPrivacyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_privacy', function (Blueprint $table)
        {
            $table->id();
            $table->foreignIdFor(Contact::class);
            $table->foreignIdFor(Privacy::class);

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
        Schema::dropIfExists('contact_privacy');
    }
}
