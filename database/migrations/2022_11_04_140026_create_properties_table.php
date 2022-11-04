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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Nombre
            $table->text('description'); //Descripcion
            $table->unsignedBigInteger('user_id'); //Usuario
            $table->unsignedBigInteger('property_type_id')->nullable(); //Tipo de propiedad
            $table->unsignedBigInteger('room_type_id'); //Tipo de habitación
            $table->unsignedBigInteger('category_id'); //Categorías
            $table->unsignedBigInteger('subcategory_id'); //Subcategorías
            $table->unsignedBigInteger('country_id'); //País
            $table->unsignedBigInteger('state_id'); //Estado o Departamento
            $table->unsignedBigInteger('city_id'); //Ciudad o Municipio
            $table->text('address')->nullable(); //Direccion, Calle, Colonia, Pasaje, Casa, etc
            $table->string('latitude')->nullable(); //Latitud
            $table->string('longitude')->nullable(); //Longitud
            $table->string('accommodate_count'); //Cantidad a alojar/acomodar. Example: The hotel can accommodate up to 40 people.
            $table->string('bedroom_count'); //Cantidad de habitaciones
            $table->string('bed_count'); //Cantidad de camas
            $table->string('bathroom_count'); //Cantidad de baños
            $table->unsignedBigInteger('currency_id')->nullable(); //Divisa
            $table->string("price"); ///Precio
            $table->string("cover")->nullable(); ///Portada imagen
            $table->string("refund_type")->nullable(); ///Reembolso
            $table->string('status')->nullable()->default(1); //Status

            $table->timestamps(); //created_at y update_at

            $table->foreign('user_id')->references('id')->on('users'); //Realacion users
            $table->foreign('property_type_id')->references('id')->on('property_types'); //Relacion property_types
            $table->foreign('room_type_id')->references('id')->on('room_types'); //Relacion room_types
            $table->foreign('category_id')->references('id')->on('categories'); //Relacion categories
            $table->foreign('subcategory_id')->references('id')->on('subcategories'); //Relacion subcategories
            $table->foreign('country_id')->references('id')->on('countries'); //Relacion countries
            $table->foreign('state_id')->references('id')->on('states'); //Relacion states
            $table->foreign('city_id')->references('id')->on('cities'); //Relacion cities
            $table->foreign('currency_id')->references('id')->on('currencies'); //Relacion currencies
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
