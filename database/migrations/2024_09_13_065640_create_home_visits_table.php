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
        Schema::create('home_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('family_id')->constrained()->cascadeOnDelete();
            $table->string("no_kk",16)->nullable();
            $table->string("nama_kk",60);
            $table->string("no_hp",13)->nullable();
            $table->string('email')->nullable();
            $table->string("kode_id_dihubungi")->nullable();
            $table->string("nama_kontak")->nullable();
            $table->string("kk_pic")->nullable();
            $table->string('home_pic')->nullable();
            $table->integer('sum_family');
            $table->integer('sum_pregnant');
            $table->integer('sum_newborn'); // Usia sampai dengan 3 bulan
            $table->integer('sum_infant'); // usia 3–12 bulan
            $table->integer('sum_toddler'); // usia 1–5 tahun
            $table->integer('sum_kids'); // usia 5–13 tahun
            $table->integer('sum_adult'); // Usia 13 - 45 tahun
            $table->integer('sum_middle_age'); // usia 45 tahun sampai 59 tahun
            $table->integer('sum_elderly'); // usia 60 – 74 tahun
            $table->integer('sum_old'); // usia antara 75 – 90 tahun
            $table->integer('sum_veryold'); // usia > 90 tahun
            $table->integer('sum_bayibalita'); // Masa bayi balita adalah masa setelah lahir hingga sebelum berusia 59 bulan
            $table->integer('sum_anak2'); // Masa anak-anak dimulai dari usia prasekolah (60-84 bulan) hingga anak usia sekolah (7-10 tahun)
            $table->integer('sum_remaja'); // Remaja adalah kelompok usia 10 tahun hingga sebelum berusia 18 tahun.
            $table->integer('sum_dewasa'); // Dewasa adalah kelompok usia 19-59 tahun.
            $table->integer('sum_lansia'); // Upaya kesehatan lanjut usia dilakukan sejak seseorang berusia 60 tahun.
            $table->string('networth_range');
            $table->enum('clean_water_facilities', ['Yes', 'No'])->change();
            $table->enum('toilet', ['Yes', 'No'])->change();
            $table->enum('ventilation', ['Yes', 'No'])->change();
            $table->enum('tbc', ['Yes', 'No'])->change();
            $table->enum('dm', ['Yes', 'No'])->change();
            $table->enum('hypertension', ['Yes', 'No'])->change();
            $table->enum('stroke', ['Yes', 'No'])->change();
            $table->enum('heart_failure', ['Yes', 'No'])->change();
            $table->enum('atshma', ['Yes', 'No'])->change();
            $table->enum('cancer', ['Yes', 'No'])->change();
            $table->enum('hypercholesterol', ['Yes', 'No'])->change();
            $table->foreignId('kader_posyandu_id')->nullable();
            $table->integer('kunjungan_ke');
            $table->date('tanggal_input');
            $table->date('tanggal_intervensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_visits');
    }
};
