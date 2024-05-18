<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function gejalaArea()
    {
        return $this->belongsToMany(Area::class, 'gejala_areas')->withPivot('id')->with('langkah');
    }
    public function kerusakan()
    {
        return $this->hasMany(GejalaArea::class);
    }
}
