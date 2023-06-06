<?php

use App\Models\Category;
use App\Models\Privacy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesPrivacyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_privacy', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Privacy::class);
            $table->foreignIdFor(Category::class);
            
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
        Schema::dropIfExists('category_privacy');
    }
}
