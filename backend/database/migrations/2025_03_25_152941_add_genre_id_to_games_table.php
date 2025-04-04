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
        Schema::table('games', function (Blueprint $table) {
            $table->foreignId("genre_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // prima eliminiamo la regola vincolo constrained 
            $table->dropForeign("games_genre_id_foreign");

            // poi eliminiamo la colonna genre_id
            $table->dropColumn("genre_id");
        });
    }
};
