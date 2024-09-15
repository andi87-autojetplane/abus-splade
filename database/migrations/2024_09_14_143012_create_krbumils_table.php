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
        Schema::create('krbumils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained()->cascadeOnDelete();
            $table->foreignId('citizen_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->integer('kunjungan_ke');
            $table->date('tanggal_input');
            $table->date('tanggal_intervensi');
            //INFORMASI KEHAMILAN
            $table->tinyinteger('kehamilan_ke');
            $table->string('jarak_kehamilan');
            $table->enum('buku_kia',['Y','T']);
            $table->enum('tahu_hpht',['Y','T']);
            $table->date('tanggal_hpht')->nullable();
            $table->enum('pemeriksaan_usg',['Y','T']);
            $table->tinyinteger('usg_ke')->nullable();
            //SKRINING IBU HAMIL
            $table->enum('anc1',['Y','T']);
            $table->enum('anc2',['Y','T']);
            $table->enum('anc3',['Y','T']);
            $table->enum('anc4',['Y','T']);
            $table->enum('anc5',['Y','T']);
            $table->enum('anc6',['Y','T']);
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
            //PENGUKURAN TINGGI BADAN DAN BERAT BADAN
            $table->enum('timbang_bumil',['Y','T']);
            $table->float('bb',2)->nullable();
            $table->float('tb',2)->nullable();
            $table->enum('waktu_timbang_bumil',['Y','T']);
            $table->date('waktu_timbang')->nullable();
            $table->string('jenis_fasyankes_tempat_timbang')->nullable();
            $table->string('nama_fasyankes_tempat_timbang')->nullable();
            $table->enum('dokter_timbang',['Y','T']);
            $table->enum('bidan_timbang',['Y','T']);
            $table->enum('kader_timbang',['Y','T']);
            $table->enum('petugas_gizi_timbang',['Y','T']);
            //ISI PIRINGKU BUMIL
            $table->enum('kesesuaian_isi_piringku',['Y','T']);
            $table->enum('makanan_pokok',['Y','T']);
            $table->enum('lauk_pauk_hewani',['Y','T']);
            $table->enum('lauk_pauk_nabati',['Y','T']);
            $table->enum('sayur2an',['Y','T']);
            $table->enum('buah2an',['Y','T']);
            // GIZI IBU HAMIL (TTD dan MT KEK)
            $table->enum('tablet_tambah_darah',['Y','T']);
            $table->enum('lingkar_lengan_kurang23_5',['Y','T']);
            // KELAS IBU HAMIL
            $table->enum('mengikuti_kelas_bumil',['Y','T']);
            // TANDA BAHAYA PADA KEHAMILAN
            $table->float('suhu_tubuh',2)->nullable();
            $table->enum('demam_lebih2hari',['Y','T']);
            $table->enum('pusing',['Y','T']);
            $table->enum('sulit_tidur_cemas',['Y','T']);
            $table->enum('diare_berulang',['Y','T']);
            $table->enum('resiko_tbc',['Y','T']);
            $table->enum('tidak_ada_gerakan_janin',['Y','T']);
            $table->enum('nyeuri_dada',['Y','T']);
            $table->enum('keluar_cairan_jalan_lahir',['Y','T']);
            $table->enum('sakit_kencing',['Y','T']);
            $table->enum('nyeuri_perut_hebat',['Y','T']);
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
        Schema::dropIfExists('krbumils');
    }
};
