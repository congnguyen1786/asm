<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Comment;

class NewsController extends Controller
{
    public function detail($id)
    {
        $news = News::findOrFail($id);
        $comments = Comment::with('user')->where('news_id', $id)->get();
        return view('news.detail', compact('news', 'comments'));
    }

    public function newsCate($category)
    {
        $categoryData = Category::where('slug', $category)->firstOrFail();
        $news = News::where('category_id', $categoryData->id)->get();
        return view('news.category', compact('category', 'news'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $news = News::where('title', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->get();
        return view('home', compact('news', 'query'));
    }
}