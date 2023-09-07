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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('latin', 50);           
            $table->string('descripcion', 120);
            $table->string('img')->nullable();
            $table->string('habitat_id', 20);
            $table->string('especie_id', 20);

            // $table->foreign('habitat_id')->reference('id')->on('habitat');
            // $table->foreign('especie_id')->reference('id')->on('especie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
