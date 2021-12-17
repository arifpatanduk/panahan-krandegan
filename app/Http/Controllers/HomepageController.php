<?php

namespace App\Http\Controllers;

use App\Models\Admin\Information\Information;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $informations = Information::all();
        return view('pages.homepage.index', compact('informations'));
    }
}
