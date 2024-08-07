<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function review()
    {
        $reviews = Review::all();
        return view('review', compact('reviews'));
    }

    public function store(Request $request) {

        $request->validate([
            'nama' => 'required|string|max:255',
            'nama_makanan' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        $review = new Review;
        $review->nama = $request->nama;
        $review->nama_makanan = $request->nama_makanan;
        $review->comment = $request->comment;
        $review->save();

        return redirect()->route('review');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('review');
    }
}
