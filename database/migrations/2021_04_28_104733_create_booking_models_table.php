<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_models', function (Blueprint $table) {
            $table->id();
            $table->string('cust_id');
            $table->string('b_name');
            $table->string('email');
            $table->string('b_phone');
            $table->string('b_date');
            $table->string('l_id');
            $table->string('m_id');
            $table->string('cons_id');
            $table->string('b_amt');
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
        Schema::dropIfExists('booking_models');
    }
}
