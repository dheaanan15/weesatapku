<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Review;
use App\Models\Wisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $populars = Wisata::withSum('reviews', 'rating')->take(3)->get()->sortDesc();
        $items = Wisata::latest()->take(9)->get();
        $reviews = Review::all();
        $articles = Article::with('user')->latest()->get();

        return view('frontend.pages.Home', [
            'populars' => $populars,
            'items' => $items,
            'reviews' => $reviews,
            'articles' => $articles
        ]);
    }
}
