<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use Faker\Factory as Faker;
class ArticleController extends Controller
{
    public function article($id)
    {
        $hasil = Article::find($id);
        $komen = komment::all();
        return view('post.post',['hasil'=>$hasil,'komen'=>$komen,'id'=>$id]);
    }
    public function insertData(Request $req, $id){
        $faker = Faker::create();
        $hasil = Article::find($id);
        $user = new komment();
        $user->name = $req->nama;
        $user->komment = $req->komentar;
        $user->id_article = $req->id;
        $user->save();
        return redirect()->action('ArticleController@article',['id'=>$id]);
    }
}
