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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('codigo_tecnico')
            ->constrained('tecnicos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('codigo_equipo')
            ->constrained('equipos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('codigo_instituto')
            ->constrained('institutos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->date('fecha_registro');
            $table->foreignId('codigo_marca')
            ->constrained('marcas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('modelo_registro')->nullable();
            $table->string('serial_registro');
            $table->string('n°_inventario');
            $table->string('ubicacion_registro');
            $table->string('MAC_registro')->nullable();
            $table->boolean('tarjeta_red_registro')->nullable();;
            $table->string('monitor_marca')->nullable();;
            $table->string('monitor_n°inventario')->nullable();
            $table->string('monitor_estado')->nullable();
            $table->string('mouse_marca')->nullable();
            $table->string('mouse_n°inventario')->nullable();
            $table->string('mouse_estado')->nullable();
            $table->string('teclado_marca')->nullable();
            $table->string('teclado_n°inventario')->nullable();
            $table->string('teclado_estado')->nullable();
            $table->string('cargador_marca')->nullable();
            $table->string('cargador_n°inventario')->nullable();
            $table->string('cargador_estado')->nullable();
            $table->string('sistema operativo')->nullable();
            $table->string('control_marca')->nullable();
            $table->string('control_n°inventario')->nullable();
            $table->string('n°parlantes')->nullable();
            $table->text('observaciones');
            $table->foreignId('codigo_estado')
            ->constrained('estados')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
