<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDendaTable extends Migration
{
    public function up()
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->id('id_denda');
            $table->unsignedBigInteger('id_peminjaman');
            $table->unsignedBigInteger('id_barang');
            $table->string('nisn');
            $table->integer('jumlah_denda')->default(0);
            $table->string('status')->default('belum dibayar'); // "belum dibayar" atau "sudah dibayar"
            $table->integer('keterlambatan')->default(0); // Jumlah hari keterlambatan
            $table->timestamps();
    
            // Foreign Key
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->onDelete('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade');
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('denda');
    }
}