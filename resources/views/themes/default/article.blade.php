@extends('themes.default.layouts')

@section('content')
    <section class="banner">
        <div class="collection-head">
            <div class="container">
                <div class="collection-title">
                    <h1 class="collection-header">{{ $article->title }}</h1>
                    <div class="collection-info">
                        <span class="meta-info">
                            <span class="octicon octicon-calendar"></span> {{ $article->created_at->format('Y-m-d') }}
                        </span>
                    </div>
                    <div class="collection-info">
                        <span class="meta-info">
                            {{ strCut(conversionMarkdown($article->content),40) }}
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.banner -->
    <section class="container content">
        <div class="columns">
            <div class="column three-fourths">
                <article class="article-content markdown-body">
                    {!! conversionMarkdown($article->content) !!}
                </article>
                <div class="share">
                    <div class="share-bar"></div>
                </div>
            </div>
        </div>
    </section>
    
@endsection