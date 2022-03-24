<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('join_us', function (Blueprint $table) {
          
            $table->increments('id');
            $table->string('position');
            $table->integer('salaryDesired');
            $table->string('fritName');
            $table->string('lastName');
            $table->string('nickName');
            $table->string('idCard');
            $table->integer('tel');
            $table->string('email');
            $table->string('homeAddress');
            $table->integer('mu');
            $table->string('road');
            $table->string('tumbon');
            $table->string('district');
            $table->string('provice');
            $table->integer('zipCode');
            $table->string('birth');
            $table->integer('age');
            $table->string('race');
            $table->string('nationality');
            $table->string('religion');
            $table->integer('height');
            $table->integer('weight');
            $table->string('sex');
            $table->string('status');
            $table->string('photo')->nullable();
            $table->integer('accept_status')->default(1);
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
        Schema::dropIfExists('join_us');
    }
}
