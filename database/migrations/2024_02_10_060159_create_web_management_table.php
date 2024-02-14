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
        Schema::create('web_management', function (Blueprint $table) {
            $table->id();
            $table->string('hero_background')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_url')->nullable();
            $table->string('kajian_title')->nullable();
            $table->string('kajian_subtitle')->nullable();
            $table->string('infaq_title')->nullable();
            $table->string('infaq_subtitle')->nullable();
            $table->string('infaq_image')->nullable();
            $table->string('informasi_address')->nullable();
            $table->string('informasi_phone1')->nullable();
            $table->string('informasi_phone2')->nullable();
            $table->string('informasi_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_management');
    }
};
