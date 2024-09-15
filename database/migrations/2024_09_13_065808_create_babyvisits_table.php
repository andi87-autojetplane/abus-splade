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
        Schema::create('babyvisits', function (Blueprint $table) {
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
            $table->enum('asi_eksklusif',['Y','T']);
            $table->enum('pelayanan_esensial(0-6)',['Y','T']);
            $table->enum('kn1',['Y','T']);
            $table->enum('kn2',['Y','T']);
            $table->enum('kn3',['Y','T']);
            $table->enum('timbang_bayi',['Y','T']);
            $table->float('bb',2)->nullable();
            $table->float('tb',2)->nullable();
            $table->float('lingkar_kepala',2)->nullable();
            $table->enum('waktu_timbang_bayi',['Y','T']);
            $table->date('waktu_timbang')->nullable();
            $table->string('jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('dokter_timbang',['Y','T']);
            $table->enum('bidan_timbang',['Y','T']);
            $table->enum('kader_timbang',['Y','T']);
            $table->enum('petugas_gizi_timbang',['Y','T']);
            $table->date('pe_kunjung')->nullable();
            $table->string('pe_jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('pe_nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('pe_dokter_timbang',['Y','T']);
            $table->enum('pe_bidan_timbang',['Y','T']);
            $table->enum('pe_kader_timbang',['Y','T']);
            $table->enum('pe_petugas_gizi_timbang',['Y','T']);
            $table->date('kn1_kunjung')->nullable();
            $table->string('kn1_jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('kn1_nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('kn1_dokter_timbang',['Y','T']);
            $table->enum('kn1_bidan_timbang',['Y','T']);
            $table->enum('kn1_kader_timbang',['Y','T']);
            $table->enum('kn1_petugas_gizi_timbang',['Y','T']);
            $table->date('kn2_kunjung')->nullable();
            $table->string('kn2_jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('kn2_nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('kn2_dokter_timbang',['Y','T']);
            $table->enum('kn2_bidan_timbang',['Y','T']);
            $table->enum('kn2_kader_timbang',['Y','T']);
            $table->enum('kn2_petugas_gizi_timbang',['Y','T']);
            $table->date('kn3_kunjung')->nullable();
            $table->string('kn3_jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('kn3_nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('kn3_dokter_timbang',['Y','T']);
            $table->enum('kn3_bidan_timbang',['Y','T']);
            $table->enum('kn3_kader_timbang',['Y','T']);
            $table->enum('kn3_petugas_gizi_timbang',['Y','T']);
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
            //Tanda Bahaya Bayi
            $table->enum("nafas<40_>60",['Y','T']);
            $table->enum("bayi_lemah",['Y','T']);
            $table->enum("bayi_kuning",['Y','T']);
            $table->enum("tidak_menyusui",['Y','T']);
            $table->enum("bayi_kejang",['Y','T']);
            $table->enum("suhu>37_5",['Y','T']);
            $table->enum("bayi_diare",['Y','T']);
            $table->enum("bayi_air_seni_kuning_pekat",['Y','T']);
            $table->enum("bayi_tali_pusar_kemerahan",['Y','T']);
            $table->enum("bayi_matacekung",['Y','T']);
            $table->enum("bayi_muntah2",['Y','T']);
            $table->enum('bayi_aktivitas_aktif', ['yes','No']);
            $table->enum('hisapan_bayi', ['yes','No']);
            //Skrining TB
            $table->enum("bayi_batuk_terus",['Y','T']);
            $table->enum("bayi_demam>2minggu",['Y','T']);
            $table->enum("bb_bayi_tidaknaik2bulan",['Y','T']);
            $table->enum("bayi_kontak_pasientb",['Y','T']);
            $table->enum("diagnosa_tb",['Y','T']);
            $table->enum("perilaku_merokok",['Y','T']);
            //Tempat Melahirkan dan Penolong Kelahiran
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
        Schema::dropIfExists('babyvisits');
    }
};
