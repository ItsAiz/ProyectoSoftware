<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')
                ->references('id')
                ->on('rols')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }

};
