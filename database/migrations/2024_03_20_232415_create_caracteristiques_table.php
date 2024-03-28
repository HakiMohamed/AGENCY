<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristiquesTable extends Migration
{
    public function up()
    {
        Schema::create('caracteristiques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->integer('etage')->nullable();
            $table->integer('surface')->nullable();
            $table->boolean('ascenseur')->default(false);
            $table->boolean('RezDeChaussé')->default(false);
            $table->boolean('balcon')->default(false);
            $table->boolean('terrasse')->default(false);
            $table->boolean('piscine')->default(false);
            $table->boolean('jardin')->default(false);
            $table->boolean('parking')->default(false);
            $table->integer('number_rooms')->nullable();
            $table->integer('number_sallon')->nullable();
            $table->integer('number_salleBain')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('caracteristiques');
    }
}
