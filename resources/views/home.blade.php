@extends('homeLayout')
@section('content')
    <div class="bmcell_r"><img src="/blog2/public/img/icon.png"><span>Post</span></div>
    @foreach($allnews as $news)
        <li class="bmcell_sub">
        	<a href="/blog2/public/news/newsid/{{$news->news_id}}">{{substr($news->news_name,0,51)}}</a>
        	<span style="color: #000">({{$news->created_at}}) -{{$news->news_author}}</span>
        </li>
    @endforeach
@stop