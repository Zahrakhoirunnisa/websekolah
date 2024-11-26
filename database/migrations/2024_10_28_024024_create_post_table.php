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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade'); // Menambahkkan constraint
            $table->text('isi');
            $table->foreignId('petugas_id')->constrained('petugas')->onDelete('cascade'); // Menambahkkan constraint
            $table->string('status')->default('draft'); // Tambah kolom status dengan default nilai 'draft'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
