<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideShowfontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_showfonts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slide_show_id');
            $table->enum('type', ['text_small', 'text_normal','text_large','button','button_outline']);
            $table->text('link')->nullable();
            $table->text('note');
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
        Schema::dropIfExists('slide_showfonts');
    }
}
