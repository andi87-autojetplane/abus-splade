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
        Schema::create('balitavisits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained()->cascadeOnDelete();
            $table->foreignId('citizen_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->integer('kunjungan_ke');
            $table->date('tanggal_input');
            $table->date('tanggal_intervensi');
            $table->tinyInteger('anak_ke');
            $table->float('suhu',2)->nullable();
            $table->string('suhu2')->nullable();
            $table->enum('buku_kia',['Y','T']);
            $table->enum('timbang_balita',['Y','T']);
            $table->float('bb',2)->nullable();
            $table->float('tb',2)->nullable();
            $table->float('lingkar_kepala',2)->nullable();
            $table->enum('waktu_timbang_balita',['Y','T']);
            $table->date('waktu_timbang')->nullable();
            $table->string('jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('dokter_timbang',['Y','T']);
            $table->enum('bidan_timbang',['Y','T']);
            $table->enum('kader_timbang',['Y','T']);
            $table->enum('petugas_gizi_timbang',['Y','T']);
            // Imunisasi
            $table->enum('HBO_24jam',['Y','T']);
            $table->enum('BCG_1bulan',['Y','T']);
            $table->enum('OPV1_1bulan',['Y','T']);
            $table->enum('DPT-HB-HIb1_2bulan',['Y','T']);
            $table->enum('OPV2_2bulan',['Y','T']);
            $table->enum('PCV1_2bulan',['Y','T']);
            $table->enum('RV1_2bulan',['Y','T']);
            $table->enum('DPT-HB-HIb2_3bulan',['Y','T']);
            $table->enum('OPV3_3bulan',['Y','T']);
            $table->enum('PCV2_3bulan',['Y','T']);
            $table->enum('RV2_3bulan',['Y','T']);
            $table->enum('DPT-HB-HIb3_4bulan',['Y','T']);
            $table->enum('OPV4_4bulan',['Y','T']);
            $table->enum('IPV1_4bulan',['Y','T']);
            $table->enum('RV3_4bulan',['Y','T']);
            $table->enum("Campak_rubela_9bulan",['Y','T']);
            $table->enum("IPV2_9bulan",['Y','T']);
            $table->enum("PCV3_12bulan",['Y','T']);
            $table->enum("Campak_rubela_18bulan",['Y','T']);
            $table->enum("DPT-HB-HIb4_18bulan",['Y','T']);
            // Makanan Pendamping Asi kaya protein hewani
            $table->enum("makanan_pokok",['Y','T']);
            $table->enum("protein_hewani",['Y','T']);
            $table->enum("protein_nabati",['Y','T']);
            $table->enum("sumber_lemak",['Y','T']);
            $table->enum("buah2an",['Y','T']);
            $table->enum("sayur2an",['Y','T']);
            // Obat Cacing
            $table->enum("memiliki_obat_cacing",['Y','T']);
            $table->date('waktu_minum_obat_cacing');
            // Vit A
            $table->enum("dapat_kapsul_vit_a",['Y','T']);
            $table->string("jenis_vit_a");
            $table->string('waktu_pemberian_vit_a');
            // Masalah Gizi
            $table->enum("punya_masalah_gizi",['Y','T']);
            $table->enum("kepatuhan_konsumsi_pmt_lokal",['Y','T']);
            // Tanda Bahaya balita
            $table->enum("nafas_kurang40_lebih60",['Y','T']);
            $table->enum("batuk_berdahak_pilek",['Y','T']);
            $table->enum("balita_lemah",['Y','T']);
            $table->enum("balita_kuning",['Y','T']);
            $table->enum("tidak_menyusui",['Y','T']);
            $table->enum("balita_kejang",['Y','T']);
            $table->enum("suhu_lebih37_5",['Y','T']);
            $table->enum("balita_diare",['Y','T']);
            $table->enum("balita_air_seni_kuning_pekat",['Y','T']);
            $table->enum("balita_matacekung",['Y','T']);
            $table->enum("balita_muntah2",['Y','T']);
            $table->enum('balita_aktivitas_aktif', ['yes','No']);
            // Skrining TB
            $table->enum("balita_batuk_terus",['Y','T']);
            $table->enum("balita_demamLebih2minggu",['Y','T']);
            $table->enum("bb_balita_tidaknaik2bulan",['Y','T']);
            $table->enum("balita_kontak_pasientb",['Y','T']);
            $table->enum("diagnosa_tb",['Y','T']);
            $table->enum("perilaku_merokok",['Y','T']);
            // Tempat Melahirkan dan Penolong Kelahiran
            $table->string('jenis_fasyankes_lahir');
            $table->string('penolong_kelahiran');
            $table->text('keterangan_lain')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balitavisits');
    }
};
