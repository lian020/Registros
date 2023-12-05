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
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('N°_documento');
            $table->string('Nombres');
            $table->string('Apellidos');
            $table->foreignId('Codigo_tipo_documento')
            ->constrained('documentos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('Telefono');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnicos');
    }
};
