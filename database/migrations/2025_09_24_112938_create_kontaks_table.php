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
        //Buat tabel
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('no_whatsapp')->nullable();
            $table->string('no_telephone')->nullable();
            $table->timestamps();
        });

        // Masukkan data awal langsung di migrasi
        DB::table('kontaks')->insert([
            'no_whatsapp' => '6281226799098', // Ganti dengan nomor WhatsApp LPHP
            'no_telephone' => '622816848498', // Ganti dengan nomor telepon LPHP
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
