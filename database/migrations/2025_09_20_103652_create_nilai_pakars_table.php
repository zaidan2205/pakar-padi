<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *  Untuk membuat tabel pivot Penyakit-Gejala
     */
    public function up(): void
    {
        Schema::create('nilai_pakars', function (Blueprint $table) {
            $table->foreignId('penyakit_id')->constrained('penyakits')->onDelete('cascade');
            $table->foreignId('gejala_id')->constrained('gejalas')->onDelete('cascade');
            $table->decimal('nilai_pakar', 5, 2);
            $table->primary(['penyakit_id', 'gejala_id']);
            $table->timestamps();
        });
    }

    /** 
    * onDelete('cascade') memastikan jika sebuah penyakit dihapus dari tabel penyakits, 
    * semua baris yang terhubung dengannya di tabel pivot ini juga akan ikut terhapus secara otomatis.
    */

    /** 
    * $table->decimal('nilai_pakar', 5, 2);
    * Ini adalah kolom tambahan yang akan menyimpan nilai bobot atau persentase dari pakar. Tipe datanya decimal 
    * dengan total 5 digit dan 2 digit di belakang koma (misal: 123.45). 
    */
    
    /**
    *Di tabel pivot penyakit-gejala, tidak ada satu kolom pun yang bisa menjadi kunci utama.
    *a) id_penyakit bisa berulang (karena satu penyakit punya banyak gejala).
    *b) id_gejala juga bisa berulang (karena satu gejala bisa dimiliki banyak penyakit).
    *Nah, kombinasi unik dari kedua kolom inilah yang bisa menjadi primary key.
    */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_pakars');
    }
};
