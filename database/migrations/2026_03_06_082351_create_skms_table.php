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
        Schema::create('skms', function (Blueprint $table) {
            $table->id();
            
            // Pastikan kolom profil ini ada di sini semua
            $table->string('email');
            $table->string('jenis_kelamin');
            $table->string('umur');
            $table->string('pendidikan');
            $table->string('pekerjaan');

            // Unsur SKM
            $table->integer('u1');
            $table->integer('u2');
            $table->integer('u3');
            $table->integer('u4');
            $table->integer('u5');
            $table->integer('u6');
            $table->integer('u7');
            $table->integer('u8');
            $table->integer('u9');
            
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skms');
    }
};