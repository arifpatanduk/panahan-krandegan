<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = User::find(Auth::user());
    }

    public function index()
    {
        return view('pages.admin.index', [
            'user' => $this->user
        ]);
    }

    public function article()
    {
        return view('admin.article.index', [
            'user' => $this->user
        ]);
    }

    public function categories()
    {
        return view('admin.article.categories', [
            'user' => $this->user
        ]);
    }
}
