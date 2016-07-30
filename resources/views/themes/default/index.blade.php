@extends('themes.default.layouts')


@section('content')
<section class="banner">
    <div class="collection-head">
        <div class="container">
            <div class="collection-title">
                <h1 class="collection-header">交大黄渤</h1>
                <div class="collection-info">
                    <span class="meta-info">
                        叶子！
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /.banner -->
<section class="container content">
    <div class="columns">
        <div class="column two-thirds" >
            <ol class="repo-list">
                @if(!empty($articleList))
                    @foreach($articleList as $article)
                        <li class="repo-list-item">
                            <h3 class="repo-list-name">
                                <a href='{{ route('article.show',array('id'=>$article->id))}}'>{{ $article->title }}</a>
                            </h3>
                            <p class="repo-list-description">
                                {{ strCut(conversionMarkdown($article->content),80) }}
                            </p>
                            <p class="repo-list-meta">
                                <span class="octicon octicon-calendar"></span>{{ $article->created_at->format('Y-m-d') }}
                            </p>
                        </li>
                    @endforeach
                @endif
            </ol>
        </div>
    </div>
    {!! $articleList->render() !!}
</section>
<!-- /section.content -->

@endsection