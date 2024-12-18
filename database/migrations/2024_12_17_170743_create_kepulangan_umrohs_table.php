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
        Schema::create('kepulangan_umrohs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jemaah');
            $table->date('tanggal_kepulangan');
            $table->enum('status_kepulangan', ['Menunggu', 'Selesai', 'Tertunda'])->default('Menunggu'); // Kolom status kepulangan            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepulangan_umrohs');
    }
};
