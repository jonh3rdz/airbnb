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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); //Usuario
            $table->unsignedBigInteger('property_id')->nullable(); //Propiedad
            $table->date('dateini')->nullable(); //Fecha inicio
            $table->date('datefini')->nullable(); //Fecha fin
            $table->string('total_days')->nullable()->default(1); //Total de dias
            $table->string("price_per_day")->default(10); ///Precio por dia
            $table->string("price_for_stay")->default(10); ///Precio por estadia
            $table->string("cleaning_fee")->default(10); ///Precio por limpieza
            $table->string("service_fee")->default(10); ///Precio por servicio app
            $table->string("price_total")->default(10); ///Precio total
            $table->string('status')->nullable()->default(1);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); //Realacion users
            $table->foreign('property_id')->references('id')->on('properties'); //Realacion users
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
