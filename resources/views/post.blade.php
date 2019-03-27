@extends('homeLayout')
@section('content')
    <div>
        <div class="bmcell_r"><img src="/blog2/public/img/icon.png">{{$news->news_name}}</div>
        <div class="bmcell_r_sub">
            <div id="bmcell_r_img1"></div>
            <div class="bmcell_r_con">
                <p class="bmcell_r_con_tit">author: {{substr( $news->news_author,  0, 41)}}</p>
                <p class="bmcell_r_con_p">{{$news->news_content}}</p>
            </div>
            
            
        </div>
    </div>
@stop
