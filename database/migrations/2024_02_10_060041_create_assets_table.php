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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('tahun_pembelian');
            $table->string('jumlah');
            $table->enum('satuan', ['unit', 'set', 'buah', 'pcs', 'roll', 'lembar', 'batang', 'kodi', 'lusin', 'rim', 'dus', 'kotak', 'karung', 'kantong', 'sak']);
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
