<?php
namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Website\Article;

class NewsController extends Controller
{

    public function render ()
    {
        return view('pages.user.articles.news');
    }

    public function show(Article $articles) {
        $view = view('pages.user.articles.news');
        $view->article = $articles;
        $view->newsArticles = Article::orderBy('id','DESC')->get();

        return $view;
    }

}
