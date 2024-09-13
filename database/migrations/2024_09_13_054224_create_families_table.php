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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->constrained()->cascadeOnDelete();
            $table->string("no_kk",16)->nullable();
            $table->string("name");
            $table->string("first_name")->nullable();
            $table->string("middle_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("front_title")->nullable();
            $table->string("back_degree")->nullable();
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
            $table->string('latittude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('altittude')->nullable();
            $table->string('precision')->nullable();
            $table->char('zip_code', 5)->nullable();
            $table->string("rt")->nullable();
            $table->string("rw")->nullable();
            $table->string("nama_kk",60);
            $table->string("no_hp1",13)->nullable();
            $table->string("no_hp2",13)->nullable();
            $table->string('email')->nullable();
            $table->string("kode_id_dihubungi")->nullable();
            $table->string("nama_kontak")->nullable();
            $table->string("kk_pic")->nullable();
            $table->string('home_pic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
