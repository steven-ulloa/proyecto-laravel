<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cedula')->unique();
            $table->string('username')->unique();
            $table->string('apellido');
            $table->integer('edad');
            $table->date('fecha')->default('1970-01-01');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->string('direccion');
            $table->string('genero');
            $table->string('estado_civil');
            $table->string('hobbies');
            $table->string('foto');

            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
