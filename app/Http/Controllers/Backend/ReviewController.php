<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {

        $reviews = Review::getAll();

        return view('backend.pages.review.ReviewIndex', [
            'reviews' => $reviews
        ]);
    }
}
