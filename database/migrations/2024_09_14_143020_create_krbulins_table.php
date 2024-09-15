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
        Schema::create('krbulins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained()->cascadeOnDelete();
            $table->foreignId('citizen_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->integer('kunjungan_ke');
            $table->date('tanggal_input');
            $table->date('tanggal_intervensi');
            // INFORMASI PERSALINAN
            $table->dateTime('tanggal_bulin');
            $table->tinyinteger('kehamilan_ke');
            $table->string('jarak_kehamilan');
            $table->enum('buku_kia',['Y','T']);
            $table->string('tempat_persalinan')->nullable();
            $table->tinyInteger('usia_kehamilan');
            $table->string('penolong_persalinan')->nullable();
            $table->string('metode_persalinan')->nullable();
            $table->string('keadaan_ibu_saat_persalinan')->nullable();
            $table->enum('imd',['Y','T']);
            $table->enum('kunjung_pasca_persalinan',['Y','T']);
            $table->enum('kf1',['Y','T']);
            $table->enum('kf2',['Y','T']);
            $table->enum('kf3',['Y','T']);
            $table->enum('kf4',['Y','T']);
            $table->float('suhu_tubuh',2)->nullable();
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
            //ISI PIRINGKU BUMIL
            $table->enum('makanan_pokok',['Y','T']);
            $table->enum('lauk_pauk_hewani_daging',['Y','T']);
            $table->enum('lauk_pauk_hewani_unggas',['Y','T']);
            $table->enum('lauk_pauk_nabati',['Y','T']);
            $table->enum('sayur2an',['Y','T']);
            $table->enum('buah2an',['Y','T']);
            // VIT A BUFAS
            $table->enum('ada_vita',['Y','T']);
            $table->date('pemberian_vita');
            $table->enum('ibu_menyusui',['Y','T']);
            //KB AKTIF
            $table->string('kb_aktif')->nullable();
             //Skrining Jiwa
             $table->enum('skrining_jiwa',['Y','T']);
             $table->string('waktu_pemeriksaan_skrining_jiwa')->nullable();
             $table->string('jenis_fasyankes_tempat_jiwa')->nullable();
             $table->string('nama_fasyankes_tempat_jiwa')->nullable();
             $table->enum('dokter_jiwa',['Y','T']);
             $table->enum('bidan_jiwa',['Y','T']);
             $table->enum('kader_jiwa',['Y','T']);
             $table->enum('petugas_gizi_jiwa',['Y','T']);
            // TANDA BAHAYA PADA IBU BERSALIN
            $table->enum('demam_lebih2hari',['Y','T']);
            $table->enum('gangguan_konsentrasi',['Y','T']);
            $table->enum('tidak_bisa_BAK',['Y','T']);
            $table->enum('nafas_terengah2',['Y','T']);
            $table->enum('payudara_bengkak_nyeuri',['Y','T']);
            $table->enum('sakit_kepala',['Y','T']);
            $table->enum('pendarahan',['Y','T']);
            $table->enum('area_kelamin_nyeuri',['Y','T']);
            $table->enum('keluar_cairan',['Y','T']);
            $table->enum('pandangan_kabur',['Y','T']);
            $table->enum('darah_nifas_bau',['Y','T']);
            $table->enum('keputihan_berlebih',['Y','T']);
            $table->enum('jantung_berdebar',['Y','T']);
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
        Schema::dropIfExists('krbulins');
    }
};
