<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Slider;
use Illuminate\Http\Request;

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
        $news = News::where('status', '1')->orderBy('created_at', 'desc')->take(5)->get();
        $sliders = Slider::where('status', '0')->get();
        $trendingNews = News::where('trending', '1')->where('status', '1')->orderBy('created_at', 'desc')->take(5)->get();
        $topNews = News::where('top', '1')->where('status', '0')->orderBy('created_at', 'desc')->first();

        return view('home', compact('news', 'sliders', 'trendingNews', 'topNews'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        return view('show', compact('newsItem'));
    }

}
