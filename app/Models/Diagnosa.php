<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //protected $table = 'diagnosas';      /** Properti ini digunakan untuk secara eksplisit memberitahu Laravel bahwa model ini menggunakan tabel bernama diagnosas. Ini berguna jika nama tabelmu tidak mengikuti konvensi penamaan jamak standar Laravel. */
    //protected $primaryKey = 'id';   /** Ini mendefinisikan kolom id sebagai primary key untuk tabel ini, 
   // public $incrementing = false;        /** Properti ini harus disetel false karena user_id tidak bertambah secara otomatis. Laravel secara default mengasumsikan primary key-nya auto-increment, jadi kita perlu mematikan asumsi itu. */
    //protected $fillable = ['user_id', 'penyakit_id', 'persentase']; /** Properti ini adalah mass assignment protection. Ia memberitahu Laravel bahwa kolom-kolom yang ada di dalam array ini aman untuk diisi secara massal (misalnya menggunakan Diagnosa::create([...])) dari inputan pengguna. Tanpa ini, Laravel akan menolak operasi tersebut demi keamanan */
    
    /**
     * Menonaktifkan fitur timestamps
     * * @var bool
     */
    

    /**
     * Get the user that owns the diagnosis.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the penyakit associated with the diagnosis.
     */
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

    /**
     * The gejalas that belong to the diagnosis.
     */
    public function gejalas()
    {
       // return $this->belongsToMany(Gejala::class, 'nilai_users')->withPivot('nilai_user');
        return $this->belongsToMany(Gejala::class, 'nilai_users', 'diagnosa_id', 'gejala_id')
                    ->withPivot('nilai_user', 'user_id')
                    ->withTimestamps(false);
    }
}
