<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Wisata;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {

        $articles = Article::getAllArticle();
        $wisatas = Wisata::wisataRandom();

        return view('frontend.pages.article.ArticleIndex', [
            'articles' => $articles,
            'wisatas' => $wisatas
        ]);
    }

    public function show($slug) {
        $item = Article::getArticle($slug);
        $wisatas = Wisata::wisataRandom();

        return view('frontend.pages.article.ArticleDetail', [
            'item' => $item,
            'wisatas' => $wisatas
        ]);
    }
}
