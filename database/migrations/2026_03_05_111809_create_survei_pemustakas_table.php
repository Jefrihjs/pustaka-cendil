<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('survei_pemustakas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kategori'); // Pelajar, Mahasiswa, Umum
            $table->string('pendidikan'); // SD, SMP, dll
            $table->string('pekerjaan'); // Pelajar, ASN, dll
            $table->integer('usia');
            $table->string('subjek_disarankan'); // Agama, Teknologi, dll
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survei_pemustakas');
    }
};