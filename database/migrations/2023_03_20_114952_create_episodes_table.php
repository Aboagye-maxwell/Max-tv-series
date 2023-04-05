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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('episode_name');
            $table->unsignedBigInteger('series_id');
            $table->unsignedBigInteger('seasons_id');
            $table->string('movie');
            $table->string('file_size');
            $table->timestamps();

            $table->index('series_id');
            $table->index('seasons_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
