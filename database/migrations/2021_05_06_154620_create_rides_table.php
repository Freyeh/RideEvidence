<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ID_cityFrom');
            $table->integer('ID_cityTo');
            $table->integer('ID_worker');
            $table->integer('ID_purpose');
            $table->integer('ID_car');
            $table->float('fuelUsed');
            $table->float('cost');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
