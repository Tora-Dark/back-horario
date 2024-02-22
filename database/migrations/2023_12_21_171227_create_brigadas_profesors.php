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
        Schema::create('brigadas_profesors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesor_id')->constrained('profesors')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('brigada_id')->constrained('brigadas')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brigadas_profesors');
    }
};
