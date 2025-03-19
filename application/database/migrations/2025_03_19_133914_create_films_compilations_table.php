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
        Schema::create('films_compilations', function (Blueprint $table) {
            $table->foreignId('film_id')->constrained()->onDelete('cascade');
            $table->foreignId('compilation_id')->constrained()->onDelete('cascade');
            $table->primary(['film_id', 'compilation_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films_compilations');
    }
};
