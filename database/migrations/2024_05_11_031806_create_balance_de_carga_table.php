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
        Schema::create('balance_de_carga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asignatura_id')
                ->constrained('asignaturas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('horario_id')
                ->constrained('horarios')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_de_carga');
    }
};
