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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('truck');
            $table->string('registation')->nullable();
            $table->string('tax_token')->nullable();
            $table->string('fitness')->nullable();
            $table->string('route_permit')->nullable();
            $table->string('tier_information')->nullable();
            $table->string('lubricant')->nullable();
            $table->integer('driver');
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
        Schema::dropIfExists('trucks');
    }
};
