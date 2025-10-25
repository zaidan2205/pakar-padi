<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function penyakits()
    {
        return $this->belongsToMany(Penyakit::class, 'nilai_pakars')->withPivot('nilai_pakar');
    }
}
