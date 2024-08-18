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
        Schema::create('statistiques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('joueur_id')->constrained()->onDelete('cascade');
            $table->integer('matchs_joues');
            $table->integer('buts');
            $table->integer('passes_decisives');
            $table->integer('cartons_jaunes');
            $table->integer('cartons_rouges');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistiques');
    }
};

