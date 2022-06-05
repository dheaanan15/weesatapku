<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WisataController extends Controller
{

    public function index(Request $request) {

        $query = $request->query('q');

        if($query) {
            $wisatas = Wisata::search($query);
        } else {
            $wisatas = Wisata::getAll();
        }

        $reviews = Review::all();

        return view('frontend.pages.wisata.WisataIndex', [
            'wisatas' => $wisatas,
            'reviews' => $reviews,
            'query' => $query
        ]);
    }

    public function show($slug)
    {
        $item = Wisata::getWisata($slug);
        $reviews = Review::getReviewWisata($item->id);

        return view('frontend.pages.wisata.WisataDetail', [
            'item' => $item,
            'reviews' => $reviews
        ]);
    }

    public function review(Request $request, $id) {
        $data = $request->all();

        if (!is_null($request->rating) || !is_null($request->komentar)) {
            if (!is_null($request->rating)) {
                $rating = $data['rating'];
            } else {
                $rating = 0;
            }
    
            Review::create([
                'user_id' => Auth::user()->id,
                'wisata_id' => $id,
                'komentar' => $data['komentar'],
                'rating' => $rating
            ]);
        }

        return back();
    }
}
