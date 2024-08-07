<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function base()
    {
        return view('base');
    }
    public function user()
    {
        $items = Item::all();
        return view('base')->with('items', $items);
    }
}
