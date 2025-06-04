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
        Schema::create('jobsheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_pekerjaan');
            $table->string('nama_perusahaan');
            $table->string('lokasi');
            $table->string('slug')->unique();
            $table->string('gaji');
            $table->text('image');
            $table->enum('tempat_kerja', ['WFH', 'WFO']);
            $table->enum('tipe_pekerjaan', ['Magang', 'Paruh Waktu','Penuh Waktu','Harian', 'Kontrak', 'Freelance']);
            $table->string('waktu_pekerjaan');
            $table->longText('deskripsi_pekerjaan');
            $table->text('link_pendaftaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
