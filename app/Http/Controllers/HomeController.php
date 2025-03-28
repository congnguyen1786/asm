<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $query = $request->input('q');
            $news = News::where('title', 'like', "%$query%")
                        ->orWhere('description', 'like', "%$query%")
                        ->get();
            return view('home', compact('news', 'query'));
        }

        $featuredNews = News::orderBy('views', 'desc')->limit(3)->get();
        $latestNews = News::orderBy('created_at', 'desc')->limit(3)->get();

        return view('home', compact('featuredNews', 'latestNews'));
    }
}