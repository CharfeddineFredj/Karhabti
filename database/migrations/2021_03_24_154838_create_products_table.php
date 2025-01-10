<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
           # $table->foreign('user_id')->references('id')->on('users');
            # $table->foreign('agency_id')->references('id')->on('agencies');
            $table->timestamps();
            $table->string('make');
            $table->string('model');
            $table->string('model_year');
            $table->string('month');
            $table->string('year');
            $table->string('motor');
            $table->string('body');
            $table->string('kilometrage');
            $table->string('price');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->string('energy');
            $table->string('box');
            $table->string('color');
            $table->text('description');
            $table->json('photos')->nullable();
            $table->boolean('Eq_Foglights');
            $table->boolean('Eq_parking_sensor');
            $table->boolean('Eq_Rearview_camera');
            $table->boolean('Eq_Reversing_radar');
            $table->boolean('Eq_LED_lights');
            $table->boolean('Eq_Sunroof');
            $table->boolean('Eq_Tinted_glass');
            $table->boolean('Eq_Satnav');
            $table->boolean('Eq_Climate_control');
            $table->boolean('Eq_Cruise_control');
            $table->boolean('Eq_Touchscreen_infotainment');
            $table->boolean('Eq_Heated_seats');
            $table->boolean('Eq_Leather_seats');
            $table->boolean('Eq_Apple_CarPlay');
            $table->boolean('Eq_Android_Auto');
            $table->String('Created_type')->nullable();
            $table->integer('Created_by')->nullable();




            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
