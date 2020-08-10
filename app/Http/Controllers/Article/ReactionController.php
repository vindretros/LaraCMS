<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReactionStoreRequest;
use App\Models\Website\Article;
use App\Models\Website\ArticleReactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{

    public function store(ReactionStoreRequest $request, Article $article)
    {
        $reaction = $article->reactions()->create([
            'text' => $request->get('text'),
        ]);
        $reaction->user()->associate(Auth::user())->save();

        return redirect()->route('article.show',$article);
    }


    public function destroy(ArticleReactions $reaction)
    {
        if(Auth::user()->rank > 3) {
            $reaction->delete();
        }

        return redirect()->back();
    }
}
