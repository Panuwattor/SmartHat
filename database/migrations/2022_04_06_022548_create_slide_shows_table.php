<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_shows', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('number');
            $table->text('photo');
            $table->enum('font_style', ['left', 'center', 'right']);
            $table->integer('status')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('slide_shows');
        
    }
}
