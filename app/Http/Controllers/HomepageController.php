<?php

namespace App\Http\Controllers;

use App\Models\Admin\Article\Article;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 1)->latest()->take(3)->get();
        return view('pages.homepage.index', compact('articles'));
    }
}
