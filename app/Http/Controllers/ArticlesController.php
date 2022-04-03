<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function showArticle($id){
        $article = Article::findOrFail($id);
        return view('show', compact('article'));
    }

    public function deleteArticles(){
        $articles = Article::get();
        foreach ($articles as $article){
            $article->delete();
        }
        return redirect()->route('welcome')->with('info', 'Straipsniai buvo ištrinti!');
    }
}
