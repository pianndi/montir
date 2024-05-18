<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $attributes = [
        'video_url' => 'https://youtu.be/jRWA0o5-kTc?si=HoaK9Bs14h1zKSmd',
        'video_embed_url' => 'https://youtube.com/embed/jRWA0o5-kTc?si=HoaK9Bs14h1zKSmd',
    ];
    public function langkah()
    {
        return $this->hasMany(Step::class);
    }
    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, GejalaArea::class)->withPivot('id');
    }
}
