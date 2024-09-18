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
        Schema::create('penjokis', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('nama_penjoki');
            $table->string('achievement_penjoki');
            $table->string('rank_penjoki');
            $table->string('kd_penjoki');
            $table->string('match_penjoki');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjokis');
    }
};
