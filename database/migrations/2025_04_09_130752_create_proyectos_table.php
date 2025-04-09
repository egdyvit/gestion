<?php

use App\Models\Responsable;
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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion', 500);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreignIdFor(Responsable::class)->constrained();
            $table->enum('estado', ['finalizado', 'activo', 'pausa', 'cancelado'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
