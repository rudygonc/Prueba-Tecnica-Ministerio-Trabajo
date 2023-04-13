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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_nacimiento');
            $table->string('primer_nombre',100);
            $table->string('segundo_nombre',100);
            $table->string('primer_apellido',100);
            $table->string('segundo_apellido',100);
            $table->integer('numero');
            $table->string('correo',100);
            $table->integer('sexo');
            $table->integer('estado_civil');
            $table->integer('departamento');
            $table->integer('municipio');
            $table->string('direccion');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
