<?php

namespace App\Http\Controllers;

use App\Models\Admin\Information\Information;
use App\Models\Admin\Article\Article;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $informations = Information::all();
        $articles = Article::where('status', 1)->latest()->take(3)->get();
        return view('pages.homepage.index', compact('articles', 'informations'));
    }

    public function roadmap()
    {
        return view('pages.roadmap.index');
    }
}
