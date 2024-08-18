<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('joueurs', function (Blueprint $table) {
            $table->unsignedBigInteger('parente_id')->nullable()->after('id');
            $table->foreign('parente_id')->references('id')->on('parentes')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('joueurs', function (Blueprint $table) {
            $table->dropForeign(['parente_id']);
            $table->dropColumn('parente_id');
        });
    }
};