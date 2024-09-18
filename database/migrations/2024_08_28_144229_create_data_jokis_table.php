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
        Schema::create('data_jokis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->unsignedBigInteger('paket_joki_id')->nullable();
            $table->unsignedBigInteger('penjoki_id')->nullable();
            $table->string('login_joki')->nullable();
            $table->string('nama')->nullable();
            $table->string('perspective')->nullable();
            $table->string('mode_joki')->nullable();
            $table->string('akun_joki')->nullable();
            $table->string('password_joki')->nullable();
            $table->string('nomor_pesanan')->nullable();
            $table->string('no_wa')->nullable();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('paket_joki_id')->references('id')->on('paket_jokis')->onDelete('cascade');
            $table->foreign('penjoki_id')->references('id')->on('penjokis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_jokis');
    }
};
