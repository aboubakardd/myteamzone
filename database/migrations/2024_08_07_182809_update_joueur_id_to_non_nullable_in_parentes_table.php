<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJoueurIdToNonNullableInParentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parentes', function (Blueprint $table) {
            $table->foreignId('joueur_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parentes', function (Blueprint $table) {
            $table->foreignId('joueur_id')->nullable()->change();
        });
    }
}
