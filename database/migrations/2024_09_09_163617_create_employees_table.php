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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('kode_fingerprint')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('citizen_id')->constrained()->cascadeOnDelete();
            $table->string('nip')->nullable();
            $table->string('front_title')->nullable();
            $table->string('name');
            $table->string('back_degree')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender');
            $table->string('birth_place');
            $table->string('city_id_birth_place');
            $table->date('birth_date');
            $table->string('address');
            $table->foreignId('dusun_id')->nullable();
            $table->tinyInteger('rt')->nullable();;
            $table->tinyInteger('rw')->nullable();;
            $table->foreignId('village_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('province_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->string('latittude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('altittude')->nullable();
            $table->string('precision')->nullable();
            $table->char('zip_code', 5)->nullable();
            $table->string('status_ASN')->nullable();
            $table->string('status_pegawai')->nullable();
            $table->string('jenis_pegawai');
            $table->string("no_hp1",13)->nullable();
            $table->string("no_hp2",13)->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
