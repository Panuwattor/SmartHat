<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousestylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housestyles', function (Blueprint $table) {
            $table->id();
            $table->string('codePlan');
            $table->string('img')->nullable();
            $table->string('plan')->nullable();
            $table->integer('space');                               //พื้นที่ใช้สอย
            $table->integer('floor');                               //กี่ชั้น
            $table->integer('bedroom');                             //ห้องนอน
            $table->integer('toilet');                              //ห้องน้ำ
            $table->integer('car');                                 //ที่จอดรถ
            $table->decimal('buildingWide',16,2);                   //ขนาดอาคารขั้นต่ำจาก
            $table->decimal('buildingLong',16,2);                   //ขนาดอาคารขั้นต่ำถึง
            $table->decimal('minimumWide',16,2);                    //ขนาดที่ดินขั้นต่ำจาก
            $table->decimal('minimumLong',16,2);                    //ขนาดที่ดินขั้นต่ำถึง
            $table->string('status')->default(1);
            $table->decimal('price',16,2)->nullable();              //ราคา
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
        Schema::dropIfExists('housestyles');
    }
}
