<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id');
            $table->string('patient_name');
            $table->string('patient_email');
            $table->string('symptoms');
            $table->string('result');
            $table->string('lens');
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
        Schema::dropIfExists('optics');
    }
}
