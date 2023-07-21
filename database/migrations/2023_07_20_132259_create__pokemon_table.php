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
        Schema::create('Pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->float('Height');
            $table->float('Weight');
            $table->string('Type1');
            $table->string('Type2')->nullable();
            $table->integer('Hp');
            $table->integer('Attack');
            $table->integer('Defense');
            $table->integer('SpecialAttack');
            $table->integer('SpecialDefense');
            $table->integer('Speed');
            $table->string('img');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pokemon');
    }
};
