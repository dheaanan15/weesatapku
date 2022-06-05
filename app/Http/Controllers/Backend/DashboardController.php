<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Review;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $wisata = Wisata::all()->count();
        $article = Article::all()->count();
        $review = Review::all()->count();
        $user = User::all()->count();

        return view('backend.pages.Dashboard', [
            'wisata' => $wisata,
            'article' => $article,
            'review' => $review,
            'user' => $user,
        ]);
    }
}
