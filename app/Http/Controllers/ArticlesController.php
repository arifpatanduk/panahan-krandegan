<?php

namespace App\Http\Controllers;

use App\Models\Admin\Article\Article;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', '1')->orderBy('id', 'desc')->get();

        return view('pages.articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $news = Article::where('status', 1)->latest()->take(3)->get();

        return view('pages.articles.detail', compact('article', 'news'));
    }
}
