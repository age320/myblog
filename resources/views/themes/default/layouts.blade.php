<!DOCTYPE html>
<html lang="zh-cmn-Hans" prefix="og: http://ogp.me/ns#" class="han-init">
<head>
    <title>交大黄渤AND叶子</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="交大黄渤AND叶子" />
    <meta name="description" content="交大黄渤AND叶子的空间">

    <link rel="stylesheet" href="{{ asset('themes/default/vendor/primer-css/css/primer.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/vendor/primer-markdown/dist/user-content.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/vendor/octicons/octicons/octicons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/css/components/collection.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/css/components/repo-card.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/css/sections/repo-list.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/css/sections/mini-repo-list.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/css/components/boxed-group.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/css/globals/common.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/vendor/share.js/dist/css/share.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/css/globals/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/css/pages/index.css') }}">

    <link rel="shortcut icon" href="{{ asset('themes/default/images/ico/32.png') }}" sizes="32x32" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('themes/default/images/ico/72.png') }}" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('themes/default/images/ico/120.png') }}" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('themes/default/images/ico/152.png') }}" type="image/png"/>
    <meta property="og:type" content="article">
    <meta property="og:locale" content="zh_CN" />

    <script src="{{ asset('themes/default/vendor/jquery/dist/jquery.min.js') }}"></script>
</head>
<body class="home">
<header class="site-header">
    <div class="container">
        <h1><a href="/">My Blog</a></h1>
        <nav class="site-header-nav" role="navigation">

            <a href="/" class=" site-header-nav-item" target="" title="Home">Home</a>


            @if(!empty($navList))
                @foreach($navList as $nav)
                    <a href="{{ route('cate_article',array('id'=>$nav->id)) }}" class="site-header-nav-item">{{ $nav->name }}</a>
                @endforeach

            @endif
            <form class="demo_search" action="{{url('search/keyword')}}" method="get">
                <i class="icon_search" id="open"></i>
                <input class="demo_sinput" type="text" name="keyword" id="search_input" placeholder="输入关键字 回车搜索" />
            </form>
        </nav>


    </div>
</header>

<!-- / header -->


@yield('content')


<footer class="container">
    <div class="site-footer" role="contentinfo">
        <div class="copyright left mobile-block">
            © 2016
            <span >陕ICP备16010522号</span>
            <a href="javascript:window.scrollTo(0,0)" class="right mobile-visible">TOP</a>
        </div>

        <ul class="site-footer-links right mobile-hidden">
            <li>
                <a href="javascript:window.scrollTo(0,0)" >TOP</a>
            </li>
        </ul>
        <a href="https://github.com/age320/myblog" target="_blank" aria-label="view source code">
            <span class="mega-octicon octicon-mark-github" title="GitHub"></span>
        </a>

    </div>
</footer>
<!-- / footer -->
<script src="{{ asset('themes/default/vendor/share.js/dist/js/share.min.js') }}"></script>
<script src="{{ asset('themes/default/vendor/share.js/dist/js/jquery.qrcode.min.js') }}"></script>
<script src="{{ asset('themes/default/js/geopattern.js') }}"></script>
<script src="{{ asset('themes/default/js/prism.js') }}"></script>
<link rel="stylesheet" href="{{ asset('themes/default/css/globals/prism.css') }}">

<script>
    jQuery(document).ready(function($) {
        // geopattern
        $('.geopattern').each(function(){
            $(this).geopattern($(this).data('pattern-id'));
        });

        $("#open").mouseover(function(){
            $("#search_input").fadeIn(1).animate({width:'300px',opacity:'10'});
            $("#search_input")[0].focus();
            $("#open").fadeOut(10);
        });

        $("#search_input").blur(function(){
            $("#search_input").animate({width:'toggle',opacity:'0.1'}).fadeOut(2);
            $("#open").delay(400).fadeIn(100);
        });
        $('.share-bar').share();
    });
</script>

</body>
</html>
