<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function gejalas()
    {
        //return $this->belongsToMany(Gejala::class, 'nilai_pakars')>withPivot('nilai_pakar');
        return $this->belongsToMany(Gejala::class, 'nilai_pakars', 'penyakit_id', 'gejala_id')
                    ->withPivot('nilai_pakar');
        
    }
}
