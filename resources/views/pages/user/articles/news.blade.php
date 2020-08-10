@extends('layouts.app')

@section('title', __('News'))

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success text-white">
                    {{ __('Last news') }}
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach($newsArticles as $newsArticle)
                            <a class="list-group-item list-group-item-action {{ ($article->id === $newsArticle->id) ? 'active' : '' }}"
                               href="{{ route('article.show', $newsArticle->id) }}">{{ $newsArticle->title }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-info text-white">
                    {{ $article->title }}
                </div>
                <div class="card-body">
                    {!! $article->content !!}
                </div>
                <div class="card-footer text-muted">
                    {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}
                </div>
            </div>


            @include('pages.user.articles._reactions',$article)
        </div>
    </div>

@endsection
