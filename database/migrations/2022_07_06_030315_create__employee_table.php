<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name')->nullable(false);
            $table->string('lastName')->nullable(false);
            $table->string('documentType')->nullable(false);
            $table->integer('documentNumber')->nullable(false)->unique();
            $table->integer('phoneNumber')->nullable(false)->unique();
            $table->string('address')->nullable(false);
            $table->date('hiringDate')->nullable(false);
            $table->integer('salary')->nullable(false);
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
