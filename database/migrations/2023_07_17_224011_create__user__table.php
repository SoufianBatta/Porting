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
        Schema::create('Utenti', function (Blueprint $table) {
            $table->string('Email')->primary();
            $table->string('Nome');
            $table->string('Cognome');
            $table->string('Telefono')->nullable();
            $table->string('Username')->unique();
            $table->string('Password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Utenti');
    }
};
