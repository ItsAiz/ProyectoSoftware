<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domicile_sale_id');
            $table->foreign('domicile_sale_id')
                ->references('id')
                ->on('domicile_sales')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->decimal('price', 15, 0);
            $table->string('amount');
            $table->string('image');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }

};
