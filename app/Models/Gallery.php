<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id', 'article_uniq', 'name', 'image', 'tipe'
    ];

    public function wisata() {
        return $this->belongsTo(Wisata::class, 'wisata_id', 'id');
    }

    public function article() {
        return $this->belongsTo(Article::class, 'article_uniq', 'uniq_id');
    }
}
