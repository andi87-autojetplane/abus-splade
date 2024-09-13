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
            $table->foreignId('kader_posyandu_id')->constrained()->cascadeOnDelete();
            $table->integer('kunjungan_ke');
            $table->date('tanggal_input');
            $table->date('tanggal_intervensi');
            $table->tinyInteger('anak_ke');
            $table->float('suhu',2)->nullable();
            $table->string('suhu2')->nullable();
            $table->enum('buku_kia',['Yes','No']);
            $table->enum('asi_eksklusif',['Yes','No']);
            $table->enum('pelayanan_esensial(0-6)',['Yes','No']);
            $table->enum('kn1',['Yes','No']);
            $table->enum('kn2',['Yes','No']);
            $table->enum('kn3',['Yes','No']);
            $table->enum('timbang_bayi',['Yes','No']);
            $table->float('bb',2)->nullable();
            $table->float('tb',2)->nullable();
            $table->float('lingkar_kepala',2)->nullable();
            $table->enum('waktu_timbang_bayi',['Yes','No']);
            $table->date('waktu_timbang')->nullable();
            $table->string('jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('dokter_timbang',['Yes','No']);
            $table->enum('bidan_timbang',['Yes','No']);
            $table->enum('kader_timbang',['Yes','No']);
            $table->enum('petugas_gizi_timbang',['Yes','No']);
            $table->date('pe_kunjung')->nullable();
            $table->string('pe_jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('pe_nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('pe_dokter_timbang',['Yes','No']);
            $table->enum('pe_bidan_timbang',['Yes','No']);
            $table->enum('pe_kader_timbang',['Yes','No']);
            $table->enum('pe_petugas_gizi_timbang',['Yes','No']);
            $table->date('kn1_kunjung')->nullable();
            $table->string('kn1_jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('kn1_nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('kn1_dokter_timbang',['Yes','No']);
            $table->enum('kn1_bidan_timbang',['Yes','No']);
            $table->enum('kn1_kader_timbang',['Yes','No']);
            $table->enum('kn1_petugas_gizi_timbang',['Yes','No']);
            $table->date('kn2_kunjung')->nullable();
            $table->string('kn2_jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('kn2_nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('kn2_dokter_timbang',['Yes','No']);
            $table->enum('kn2_bidan_timbang',['Yes','No']);
            $table->enum('kn2_kader_timbang',['Yes','No']);
            $table->enum('kn2_petugas_gizi_timbang',['Yes','No']);
            $table->date('kn3_kunjung')->nullable();
            $table->string('kn3_jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('kn3_nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('kn3_dokter_timbang',['Yes','No']);
            $table->enum('kn3_bidan_timbang',['Yes','No']);
            $table->enum('kn3_kader_timbang',['Yes','No']);
            $table->enum('kn3_petugas_gizi_timbang',['Yes','No']);
            // Imunisasi
            $table->enum('HBO_24jam',["yes","No"]);
            $table->enum('BCG_1bulan',["yes","No"]);
            $table->enum('OPV1_1bulan',["yes","No"]);
            $table->enum('DPT-HB-HIb1_2bulan',["yes","No"]);
            $table->enum('OPV2_2bulan',["yes","No"]);
            $table->enum('PCV1_2bulan',["yes","No"]);
            $table->enum('RV1_2bulan',["yes","No"]);
            $table->enum('DPT-HB-HIb2_3bulan',["yes","No"]);
            $table->enum('OPV3_3bulan',["yes","No"]);
            $table->enum('PCV2_3bulan',["yes","No"]);
            $table->enum('RV2_3bulan',["yes","No"]);
            $table->enum('DPT-HB-HIb3_4bulan',["yes","No"]);
            $table->enum('OPV4_4bulan',["yes","No"]);
            $table->enum('IPV1_4bulan',["yes","No"]);
            $table->enum('RV3_4bulan',["yes","No"]);
            //Tanda Bahaya Bayi
            $table->enum("nafas<40_>60",["yes","No"]);
            $table->enum("bayi_lemah",["yes","No"]);
            $table->enum("bayi_kuning",["yes","No"]);
            $table->enum("tidak_menyusui",["yes","No"]);
            $table->enum("bayi_kejang",["yes","No"]);
            $table->enum("suhu>37_5",["yes","No"]);
            $table->enum("bayi_diare",["yes","No"]);
            $table->enum("bayi_air_seni_kuning_pekat",["yes","No"]);
            $table->enum("bayi_tali_pusar_kemerahan",["yes","No"]);
            $table->enum("bayi_matacekung",["yes","No"]);
            $table->enum("bayi_muntah2",["yes","No"]);
            //Skrining TB
            $table->enum("bayi_batuk_terus",["yes","No"]);
            $table->enum("bayi_demam>2minggu",["yes","No"]);
            $table->enum("bb_bayi_tidaknaik2bulan",["yes","No"]);
            $table->enum("bayi_kontak_pasientb",["yes","No"]);
            $table->enum("diagnosa_tb",["yes","No"]);
            $table->enum("perilaku_merokok",["yes","No"]);
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
