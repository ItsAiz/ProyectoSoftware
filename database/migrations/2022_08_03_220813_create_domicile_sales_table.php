<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('domicile_sales', function (Blueprint $table) {
            $table->id();
            $table->date('saleDate');
            $table->string('totalCost');
            $table->string('name');
            $table->string('address');
            $table->string('phoneNumber');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('domicile_sales');
    }

};
