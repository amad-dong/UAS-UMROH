<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeberangkatanUmrohsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keberangkatan_umrohs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jamaah');
            $table->date('tanggal_keberangkatan');
            $table->enum('paket', ['Reguler', 'VIP', 'Eksekutif']);
            $table->decimal('harga', 15, 2);
            $table->enum('status', ['Terdaftar', 'Berangkat', 'Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keberangkatan_umrohs');
    }
}
