<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->decimal('harga', 15, 2);
            $table->integer('stok');
            $table->enum('status', ['Aktif', 'Nonaktif', 'Stok Habis'])->default('Aktif');
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
