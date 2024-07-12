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
        Schema::create('armadas', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('nopol');
            $table->integer('thn_beli');
            $table->string('deskripsi');
            $table->integer('kapasitas_kursi');
            $table->integer('rating');
            $table->foreignId('jenis_kendaraan_id')->constrained('jenis_kendaraans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armadas');
    }
};
