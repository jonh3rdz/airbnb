<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenity_properties', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('amenity_id');
            $table->unsignedBigInteger('property_id');
            
            $table->timestamps();

            $table->foreign('amenity_id')->references('id')->on('amenities');
            $table->foreign('property_id')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenity_properties');
    }
};
