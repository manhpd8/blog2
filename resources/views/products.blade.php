@extends('homeLayout')
@section('content')       
    <div class="bmcell_r"><img src="/blog2/public/img/icon.png"><span>Post</span></div>
    @foreach($allnews as $news)
        <li class="bmcell_sub">
            <a href="/blog2/public/news/newsid/{{$news->news_id}}">{{substr($news->news_name,0,51)}}</a>
            <span style="color: #000">({{$news->created_at}}) -{{$news->news_author}}</span>
            <button type="button" onclick="setCookie('news{{$news->news_id}}','{{$news->news_id}}','1')">add to cart</button>
        </li>
    @endforeach
    <button type="button" onclick="setCookie('news{{$news->news_id}}','{{$news->news_id}}','1')">set cookie</button>
    <button type="button" onclick="getOnclick()">getCookie</button>
    <h1 id="cookie_con" onclick="this.innerHTML = 'Ooops!'">f</h1>
@endsection
<script type="text/javascript">
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length,c.length);
            }
        }
        return "";
    }
    function getOnclick(){
        var element = document.getElementById('cookie_con').innerHTML = getCookie('testcookie');

    }
</script>