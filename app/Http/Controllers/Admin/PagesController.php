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
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index()
    {
        $this->active = 'dashboard';
        return view('admin.index', [
            'user' => $this->user
        ]);
    }

    public function article()
    {
        $this->active = 'article';
        return view('admin.article.index', [
            'user' => $this->user
        ]);
    }

    public function information()
    {
        $this->active = 'information';
        return view('admin.information.index', [
            'user' => $this->user
        ]);
    }

    public function gallery()
    {
        $this->active = 'gallery';
        return view('admin.gallery.index', [
            'user' => $this->user
        ]);
    }

    public function ads()
    {
        $this->active = 'ads';
        return view('admin.ads.index', [
            'user' => $this->user
        ]);
    }
}
