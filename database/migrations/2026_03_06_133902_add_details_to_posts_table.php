<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Tambahkan field baru setelah kolom 'konten'
            $table->string('kategori')->default('Umum')->after('konten');
            $table->string('lokasi')->nullable()->after('kategori');
            
            // Catatan: created_at sudah ada bawaan $table->timestamps(), 
            // jadi kita tidak perlu tambah kolom lagi, cukup nanti kita atur jamnya.
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'lokasi']);
        });
    }
};
