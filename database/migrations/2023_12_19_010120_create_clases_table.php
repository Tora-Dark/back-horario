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
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->integer('turn');
            $table->string('fecha');
            $table->foreignId('asignatura_id')
                ->constrained('asignaturas')->onUpdate('cascade')
                ->onDelete('cascade');;




            $table->foreignId('local_id')->constrained('locals');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
