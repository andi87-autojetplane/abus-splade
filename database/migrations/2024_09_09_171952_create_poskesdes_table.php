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
        Schema::create('poskesdes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puskesmas_id')->constrained()->cascadeOnDelete();
            $table->string('name',60);
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->constrained()->cascadeOnDelete();
            $table->foreignId('village_id')->constrained()->cascadeOnDelete();
            $table->string('address');
            $table->char('zip_code',5)->nullable();
            $table->tinyinteger('rt')->nullable();
            $table->tinyInteger('rw')->nullable();
            $table->string('longitude')->nullable();
            $table->string('lattitude')->nullable();
            $table->string('pic_name')->nullable();
            $table->string('no_pic')->nullable();
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poskesdes');
    }
};
