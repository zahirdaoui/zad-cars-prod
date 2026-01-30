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
        Schema::create('cars', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('name_model')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('price');
            $table->string('ville');
            $table->string('Gearboxe');
            $table->softDeletes();
            $table->string('motor');
            $table->integer('distance_km');
            $table->integer('horses')->nullable();
            $table->integer('date_out')->nullable();
            $table->decimal('tax')->nullable();
            $table->longText('details');
            $table->string('cover')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
