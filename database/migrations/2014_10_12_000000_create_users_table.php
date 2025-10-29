<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->String('role')->default('umum');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('kecamatan'); 
            $table->string('desa'); 
            $table->string('alamat');
            $table->timestamps();
        });
        // Masukkan data awal langsung di migrasi
        DB::table('users')->insert([
            'name' => 'Admin', // Ganti dengan nama admin
            'role' => 'admin', 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),  //mengenkripsi user admin
            'kecamatan' => 'Jatilawang',
            'desa' => 'Tinggarjaya',
            'alamat' => 'Kantor LPHP Kabupaten Banyumas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
