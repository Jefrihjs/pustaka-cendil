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
        Schema::create('members', function (Blueprint $table) {

            $table->id();

            // IDENTITAS
            $table->string('kode_anggota')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);

            // PEKERJAAN
            $table->enum('kategori_pekerjaan', [
                'umum',
                'asn',
                'mahasiswa',
                'siswa'
            ]);

            $table->string('sektor')->nullable(); // untuk umum
            $table->string('instansi')->nullable(); // tempat kerja / universitas / sekolah
            $table->string('fakultas')->nullable(); // mahasiswa
            $table->string('kelas')->nullable(); // siswa
            $table->text('alamat_instansi')->nullable(); // alamat kerja/kampus/sekolah

            // ALAMAT RUMAH
            $table->text('alamat_rumah');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('desa');

            // KONTAK
            $table->string('no_hp');

            // ADMINISTRASI
            $table->date('tanggal_daftar');
            $table->enum('status', ['pending', 'aktif', 'nonaktif'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
