<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'uniq_id',
        'judul',
        'slug',
        'body',
        'thumbnail'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function galleries() {
        return $this->hasMany(Gallery::class, 'article_id');
    }

    public function scopeGetAllArticle($q) {
        return $q->latest()->paginate(10);
    }

    public function scopeGetArticle($q, $slug) {
        return $q->with('user')->where('slug', $slug)->first();
    }
}
