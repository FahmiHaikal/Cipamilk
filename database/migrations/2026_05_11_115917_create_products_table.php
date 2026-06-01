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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->foreignId('umkm_id')->constrained('umkms')->cascadeOnDelete();
        $table->string('nama_produk');
        $table->integer('harga');
        $table->string('kategori');
        $table->text('deskripsi')->nullable();
        $table->string('masa_simpan')->nullable();
        $table->string('label_gizi')->nullable();
        $table->string('image')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
