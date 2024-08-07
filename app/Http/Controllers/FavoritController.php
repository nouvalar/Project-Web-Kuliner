<?php

namespace App\Http\Controllers;

use App\Models\Favorit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritController extends Controller
{
    public function favorit()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->get();
    
        return view('favorit', [
            'favorites' => $favorites
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => 'required',
        ]);

        $favorite = Favorit::where('user_id', auth()->id())
            ->where('item_id', $data['item_id'])
            ->first();

        if ($favorite) {
            $favorite->delete();

            return back();
        } else {
            $data['user_id'] = auth()->id();

            Favorit::create($data);

            return redirect('/favorit');
        }
    }
}
