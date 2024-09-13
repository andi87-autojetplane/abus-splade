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
        Schema::create('immunizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->constrained()->cascadeOnDelete();
            $table->foreignId('family_id')->constrained()->cascadeOnDelete();
            $table->string('nik',16)->nullable();
            $table->string('no_kk',16)->nullable();
            $table->string('jenis_imunisasi');
            $table->string('nama_imunisasi');
            $table->date('tanggal_pemberian');
            $table->string('no_batch')->nullable();
            $table->string('fasyankes');
            $table->foreignId('posyandu_id')->nullable();
            $table->string('jenis_tenaga')->nullable();
            $table->date('tanggal_imunisasi')->nullable();
            $table->string('estimasi_waktu_pemberian');
            $table->foreignId('kader_posyandu_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immunizations');
    }
};
