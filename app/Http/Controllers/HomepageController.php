<?php

namespace App\Http\Controllers;

use App\Models\Admin\Information\Information;
use App\Models\Admin\Article\Article;
use App\Models\Wahana;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $informations = Information::all();
        $wahanas = Wahana::all();
        $articles = Article::where('status', 1)->latest()->take(3)->get();
        return view('pages.homepage.index', compact('articles', 'informations', 'wahanas'));
    }

    public function roadmap()
    {
        return view('pages.roadmap.index');
    }
}
