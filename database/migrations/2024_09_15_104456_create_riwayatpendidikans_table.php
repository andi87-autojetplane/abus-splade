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
        Schema::create('riwayatpendidikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->constrained()->cascadeOnDelete();
            $table->foreignId('jenjangsekolah_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sekolah_id')->constrained()->cascadeOnDelete();
            $table->date('tanggal_masuk');
            $table->date('tanggal_lulus');
            $table->string('no_ijazah');
            $table->string('jurusan');
            $table->string('file_ijazah')->nullable();
            $table->string('file_transkip_nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayatpendidikans');
    }
};
