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
        Schema::create('matkuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen_id');
            $table->string('kode_matkul')->unique();
            $table->string('nama_matkul');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('hari');
            $table->string('jam');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('prodi_id');
            $table->foreign('dosen_id')->references('id')->on('dosens');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('prodi_id')->references('id')->on('prodis');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matkuls');
    }
};
