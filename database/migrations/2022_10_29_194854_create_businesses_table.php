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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('company')->nullable();
            $table->string('load_point')->nullable();
            $table->string('unload_point')->nullable();
            $table->integer('total_point')->nullable();
            $table->string('truck_datails')->nullable();
            $table->string('mobile')->nullable();
            $table->string('agency')->nullable();
            $table->string('rent')->nullable();
            $table->string('advance')->nullable();
            $table->string('advance_by')->nullable();
            $table->string('demurrage')->nullable();
            $table->string('total_due')->nullable();
            $table->string('paid_by')->nullable();
            $table->string('rate')->nullable();
            $table->string('commission')->nullable();
            $table->string('bill')->nullable();
            $table->string('other')->nullable();
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
        Schema::dropIfExists('businesses');
    }
};
