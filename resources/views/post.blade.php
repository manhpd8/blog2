@extends('homeLayout')
@section('content')
    <div>
        <div class="bmcell_r"><img src="/blog2/public/img/icon.png">{{$news->news_name}}
            <button type="button" onclick="addCart('news{{$news->news_id}}','{{$news->news_id}}','1')" style="float: right" class="btn btn-info" id="addnews{{$news->news_id}}">add to cart</button></div>
        <div class="bmcell_r_sub">
            <div id="bmcell_r_img1"></div>
            <div class="bmcell_r_con">
                <p class="bmcell_r_con_tit">author: {{substr( $news->news_author,  0, 41)}}</p>
                <p class="bmcell_r_con_p">{{$news->news_content}}</p>
            </div>
        </div>
    </div>
    <br style="clear: both;">
    <div id="rate" >
        <button class="btn btn-default" onclick="onclickRate(this)" value="1">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">{{$rates[0]->num}}</button>
        <button class="btn btn-default" onclick="onclickRate(this)" value="2">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">{{$rates[1]->num}}</button>
        <button class="btn btn-default" onclick="onclickRate(this)" value="3">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">{{$rates[2]->num}}</button>
        <button class="btn btn-default" onclick="onclickRate(this)" value="4">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">{{$rates[3]->num}}</button>
        <button class="btn btn-default" onclick="onclickRate(this)" value="5">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">
            <img src="/blog2/public/img/icon-rate.png" class="img-rate">{{$rates[4]->num}}</button>
        <button class="btn btn-default">{{$ratesAvg[0]->avg}}</button>
    </div>
    <div class="comment">
        <form action="/blog2/public/comment" method="post">
            {{ csrf_field() }}
            <input type="" name="rate"  id="rateStar" value="0" hidden="true">
            <textarea style="width: 90%; height: 100px" name="comment_content"></textarea>
            <input type="" name="news_id" value="{{$news->news_id}}" hidden="true"/>
            <button type="submit" class="btn btn-primary" style="">Comment</button>
        </form>
    </div>
    <div>
        @foreach($comments as $comment)
            <li class="comment2">{{$comment->comment_content}}</li>
        @endforeach
    </div>
<style type="text/css">
.comment{
    /*background-color: blue;*/
    height: 150px;
}
.comment2{
    height: 26px;
    margin-top: 3px;
    background-color:#B9AFAF;
    width: 90%;
    margin-left: 5%;
}
.img-rate{
    height: 10px;
}
</style>
@stop

