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
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            // miei campi
            $table->string("title");
            $table->string("developer");
            $table->string("publisher");
            $table->date("release_date");
            $table->decimal("price", total: 5, places: 2)->nullable();
            $table->decimal("rating", total: 2, places: 1)->nullable();
            $table->integer("reviews")->nullable();
            $table->longText("description");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
