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
        Schema::create('dewasavisits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained()->cascadeOnDelete();
            $table->foreignId('citizen_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->integer('kunjungan_ke');
            $table->date('tanggal_input');
            $table->date('tanggal_intervensi');
            //PENGUKURAN TINGGI BADAN DAN BERAT BADAN
            $table->enum('timbang_dewasa',['Y','T']);
            $table->float('bb',2)->nullable();
            $table->float('tb',2)->nullable();
            $table->enum('waktu_timbang_dewasa',['Y','T']);
            $table->date('waktu_timbang')->nullable();
            $table->string('jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('dokter_timbang',['Y','T']);
            $table->enum('bidan_timbang',['Y','T']);
            $table->enum('kader_timbang',['Y','T']);
            $table->enum('petugas_gizi_timbang',['Y','T']);
            //ISI PIRINGKU
            $table->enum('makanan_pokok',['Y','T']);
            $table->enum('lauk_pauk_hewani',['Y','T']);
            $table->enum('lauk_pauk_nabati',['Y','T']);
            $table->enum('sayur2an',['Y','T']);
            $table->enum('buah2an',['Y','T']);
            // Pengukuran Tensi Darah
            $table->enum('tensi_darah',['Y','T']);
            $table->enum('tau_hasil_td',['Y','T']);
            $table->enum('penderita_td',['Y','T']);
            $table->enum('minum_obat_td',['Y','T']);
            $table->float('sistol')->nullable();
            $table->float('diastol')->nullable();
            $table->string('waktu_pemeriksaan_terakhir_td')->nullable();
            $table->string('jenis_fasyankes_tempat_td')->nullable();
            $table->string('nama_fasyankes_tempat_td')->nullable();
            $table->enum('dokter_td',['Y','T']);
            $table->enum('bidan_td',['Y','T']);
            $table->enum('kader_td',['Y','T']);
            $table->enum('petugas_gizi_td',['Y','T']);
            // Pengukuran Gula
            $table->enum('gula_darah',['Y','T']);
            $table->enum('tau_hasil_gd',['Y','T']);
            $table->enum('penderita_gd',['Y','T']);
            $table->enum('minum_obat_gd',['Y','T']);
            $table->float('gd_puasa')->nullable();
            $table->float('gd_sewaktu')->nullable();
            $table->enum('cek_gd_puasa',['Y','T']);
            $table->enum('cek_gd_sewaktu',['Y','T']);
            $table->string('waktu_pemeriksaan_terakhir_gd')->nullable();
            $table->string('jenis_fasyankes_tempat_gd')->nullable();
            $table->string('nama_fasyankes_tempat_gd')->nullable();
            $table->enum('dokter_gd',['Y','T']);
            $table->enum('bidan_gd',['Y','T']);
            $table->enum('kader_gd',['Y','T']);
            $table->enum('petugas_gizi_gd',['Y','T']);
            // Kontrasepsi
            $table->enum('memakai_kontrasepsi',['Y','T']);
            $table->string('jenis_kontrasepsi')->nullable();
            //Skrining Jiwa
            $table->enum('skrining_jiwa',['Y','T']);
            $table->string('waktu_pemeriksaan_skrining_jiwa')->nullable();
            $table->string('jenis_fasyankes_tempat_jiwa')->nullable();
            $table->string('nama_fasyankes_tempat_jiwa')->nullable();
            $table->enum('dokter_jiwa',['Y','T']);
            $table->enum('bidan_jiwa',['Y','T']);
            $table->enum('kader_jiwa',['Y','T']);
            $table->enum('petugas_gizi_jiwa',['Y','T']);
            // Skrining TBC
            $table->enum("dewasa_batuk_terus",['Y','T']);
            $table->enum("dewasa_demamLebih2minggu",['Y','T']);
            $table->enum("bb_dewasa_tidaknaik2bulan",['Y','T']);
            $table->enum("dewasa_kontak_pasientb",['Y','T']);
            $table->enum("diagnosa_tb",['Y','T']);
            $table->enum("perilaku_merokok",['Y','T']);
            $table->text('keterangan_lain')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dewasavisits');
    }
};
