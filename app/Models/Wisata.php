<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'jenis',
        'alamat',
        'thumbnail',
        'hp',
        'maps',
        'deskripsi'
    ];

    public function galleries() {
        return $this->hasMany(Gallery::class, 'wisata_id');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'wisata_id');
    }

    public function scopeSearch($q, $search) {
        return $q->where('judul', 'LIKE', '%' . $search . '%')->latest()->paginate(12);
    }

    public function scopeGetAll($q) {
        return $q->latest()->paginate(12);
    }

    public function scopeGetWisata($q, $slug) {
        return $q->with('galleries')->where('slug', '=', $slug)->first();
    }

    public function scopeWisataRandom($q) {
        return $q->inRandomOrder()->take(5)->get();
    }
}
