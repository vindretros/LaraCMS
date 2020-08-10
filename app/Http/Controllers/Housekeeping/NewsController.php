<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Http\Requests\newsStoreRequest;
use App\Models\Website\Article;
use App\Notifications\GlobalNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{

    public function index()
    {
        $view = view('pages.housekeeping.news.index');
        $view->news = Article::all();

        return $view;
    }

    public function create()
    {
        $view = view('pages.housekeeping.news.create');
        $images = File::files(public_path() . '/images/news');
        $imageList = [];
        foreach ($images as $image) {
            $imageList[$image->getFilename()] = $image->getFilename();
        }
        $view->images = $imageList;


        return $view;
    }


    public function store(newsStoreRequest $request)
    {
        $article = Article::create($request->all());
        $article->user()->associate(Auth::user()->id)->save();
        Auth::user()->notify(new GlobalNotification(__('News article saved'), 'success'));

        return redirect()->route('housekeeping.news.edit', $article);
    }

    public function edit(Article $news)
    {
        $view = view('pages.housekeeping.news.edit');
        $images = File::files(public_path() . '/images/news');
        $imageList = [];
        foreach ($images as $image) {
            $imageList[$image->getFilename()] = $image->getFilename();
        }
        $view->images = $imageList;
        $view->news = $news;


        return $view;

    }

    public function update(newsStoreRequest $request, Article $news)
    {
        $article = $news->update($request->all());
        Auth::user()->notify(new GlobalNotification(__('News article updated'), 'success'));

        return redirect()->route('housekeeping.news.edit', $article);
    }

    public function destroy(Article $news)
    {
        $news->delete();

        return redirect()->route('housekeeping.news.index');
    }


    public function indexAjax(Datatables $datatables)
    {
        $builder = Article::query()->select('id', 'title', 'description', 'content', 'created_at');

        return $datatables->eloquent($builder)
            ->addColumn('action', function ($news) {
                return '<a href="' . route('housekeeping.news.edit', [$news->id]) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>' . __('Edit') .'</a>';
            })->rawColumns(['action'])->make(true);
    }
}
