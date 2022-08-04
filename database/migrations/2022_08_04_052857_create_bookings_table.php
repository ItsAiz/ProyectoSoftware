<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('bookingDate');
            $table->date('bookingHour');
            $table->string('description');
            $table->unsignedBigInteger('restaurant_table_id');
            $table->foreign('restaurant_table_id')
                ->references('id')
                ->on('restaurant_tables')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }

};
