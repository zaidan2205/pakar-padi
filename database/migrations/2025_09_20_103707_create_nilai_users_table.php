
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Untuk membuat tabel pivot Diagnosa-Gejala
     */
    public function up(): void
    {
        Schema::create('nilai_users', function (Blueprint $table) {
            $table->foreignId('diagnosa_id')->constrained('diagnosas')->onDelete('cascade'); //Baris ->constrained('diagnosas', 'user_id') adalah kuncinya. constrained('diagnosas'): Memberitahu Laravel bahwa foreign key ini mengacu ke tabel diagnosas. 'user_id': Memberitahu Laravel bahwa kolom yang diacu di tabel diagnosas itu bukan id (standar), melainkan user_id.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('gejala_id')->constrained('gejalas')->onDelete('cascade');
            $table->decimal('nilai_user', 5, 2);
            $table->primary(['diagnosa_id', 'gejala_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_users');
    }
};
