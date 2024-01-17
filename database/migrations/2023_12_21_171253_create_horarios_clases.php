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
        Schema::create('horarios_clases', function (Blueprint $table) {
            $table->id();


                $table->foreignId('horario_id')
    ->constrained('horarios')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();

        $table->foreignId('clase_id')
        ->constrained('clases')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_clases');
    }
};
