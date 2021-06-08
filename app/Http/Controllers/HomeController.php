<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryAnalytic;
use App\Keyword;
use App\KeywordAnalytic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $top_categories = CategoryAnalytic::orderBy('total_volume', 'desc')->limit(5)->get();
        $categories_analytic = CategoryAnalytic::all();
        $top_keywords = KeywordAnalytic::all();
        return view('home')->with(compact('categories', 'categories_analytic','top_categories','top_keywords'));
    }

    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');

    }
}
