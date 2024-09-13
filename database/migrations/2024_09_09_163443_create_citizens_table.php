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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('family_id')->nullable();
            $table->string('ihs_number')->nullable();
            $table->string("no_rm")->nullable();
            $table->string("nik",16)->nullable();
            $table->string("nomor_asuransi")->nullable();
            $table->string("nama_asuransi")->nullable();
            $table->string("name");
            $table->string("first_name")->nullable();
            $table->string("middle_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("front_title")->nullable();
            $table->string("back_degree")->nullable();
            $table->string("religion")->nullable();
            $table->string("blood_type")->nullable();
            $table->string("gender");
            $table->date("birth_date");
            $table->string("birth_place");
            $table->string("address");
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            //$table->string("country_name")->nullable();
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            //$table->string("province_name")->nullable();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            //$table->string("city_name")->nullable();
            $table->foreignId('district_id')->constrained()->cascadeOnDelete();
            //$table->string("district_name")->nullable();
            $table->foreignId('village_id')->constrained()->cascadeOnDelete();
            //$table->string("village_name")->nullable();
            $table->foreignId('dusun_id')->constrained()->cascadeOnDelete();
             //$table->string("country_name")->nullable();
            $table->char('zip_code', 5)->nullable();
            $table->string("rt")->nullable();
            $table->string("rw")->nullable();
            $table->string("e_ktp_status")->nullable();
            $table->string("pendidikan_terakhir")->nullable();
            $table->string("pekerjaan")->nullable();
            $table->string("pekerjaan_suami")->nullable();
            $table->string("penyandang_cacat")->nullable();
            $table->string("status_kawin");
            $table->string("status_keluarga");
            $table->string("no_kk",16)->nullable();
            $table->string("nama_kk",60);
            $table->string("no_akta_lahir")->nullable();
            $table->string("nik_ibu",16)->nullable();
            $table->string("nama_ibu")->nullable();
            $table->string("nik_ayah",16) ->nullable();
            $table->string("nama_ayah")->nullable();
            $table->string("ras_suku")->nullable();
            $table->string("nomor_paspor")->nullable();
            $table->string("negara_asal")->nullable();
            $table->string("no_hp1",13)->nullable();
            $table->string("no_hp2",13)->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string("kode_pos",5);
            $table->string("kode_id_dihubungi")->nullable();
            $table->string("nama_kontak")->nullable();
            $table->string("self_pic");
            $table->string("e_ktp_pic");
            $table->string("status_hidup");
            $table->string("keterangan_cacat")->nullable();
            $table->tinyInteger('anak_ke');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
