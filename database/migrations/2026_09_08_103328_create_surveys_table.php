<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_whatsapp');
            $table->string('email');
            $table->string('sosialmedia');
            $table->tinyInteger('rating'); // Nilai 1 - 5
            $table->text('masukan_saran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};