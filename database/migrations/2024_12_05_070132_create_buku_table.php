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
        Schema::create('buku', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('judul', 255); // Nama buku
            $table->string('penulis', 255); // Nama penulis
            $table->string('penerbit', 255); // Nama penerbit
            $table->integer('tahun_terbit'); // Tahun terbit
            $table->decimal('harga', 10, 2); 
            $table->integer('stok'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
