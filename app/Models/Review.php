<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wisata_id',
        'komentar',
        'rating'
    ];

    public function wisata() {
        return $this->belongsTo(Wisata::class, 'wisata_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeGetAll($q)
    {
        return $q->latest()->paginate(10);
    }

    public function scopeGetReviewWisata($q, $wisata) {
        return $q->where('wisata_id', '=', $wisata)->latest()->paginate(8);
    }
}
