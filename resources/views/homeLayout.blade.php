<!DOCTYPE html>
<html>
<head>
	<title>Nhật minh logtics</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/blog2/public/css/stylesheet.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="js/jquery.dataTables.min.js" ></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="hcontent">
		<div id="header">
		<table width="100%">
			<tr width="50%">
				<td><div id="hlogo">
			<img src="/blog2/public/img/logo.png">

		</div></td>
				<td width="50%">
					<div id="hsearch">
						<input type="text" name="" placeholder="Từ khóa..." style="height: 22px">
						
						<button id="btn_search">Tìm Kiếm</button>
					</div>
				</td>
			</tr>
		</table>
		
		<br style="clear: both;">
		<div id="h_menu">
			<a href="/blog2/public/home"><li id="htchome" style="margin: 0">Trang chủ</li></a>
			@foreach($categories as $category)
	            <a href="/blog2/public/news/catid/{{$category->cat_id}}"><li class="hmcell">{{substr( $category->cat_name,  0, 12)  }}</li></a>
	        @endforeach
			<br style="clear: both;">
		</div>
		<div id="hbanner" >
		</div>
		</div>
	</div>
	<div id="bcontent">
	
	<div id="body2">
		<div id="bodyl">
			<div>
				<li class="bmcell_l">Post mới nhất</td></li>
				@foreach($newspost as $post)
		            <li class="bmcell_sub"><a href="/blog2/public/news/newsid/{{$post->news_id}}">{{substr( $post->news_name,  0, 34)}}</a></li>
		        @endforeach
				
			</div>
			<div>
				<li class="bmcell_l">Hỗ trợ trực tuyến</td></li>
				<div id="sup_ol">
					<p class="sup_p">Nhat Minh 01</p>
					<img src="/blog2/public/img/online.png">
					<p class="sup_p">Nhat Minh 02</p>
					<img src="/blog2/public/img/online.png">
					<p class="sup_p">Nhat Minh 03</p>
					<img src="/blog2/public/img/online.png">
				</div>
			</div>
			<div>
				<li class="bmcell_l">Post xem nhiều nhất</td></li>
				@foreach($viewpost as $views)
		            <li class="bmcell_sub"><a href="/blog2/public/news/newsid/{{$views->news_id}}">{{substr( $views->news_name,  0, 30)}}</a>
		            	<span style="color: #000">{{$views->news_seen}}</span>
		            </li>
		        @endforeach
				
			</div>
		</div>
		<div id="bodyr">
			@section('content')
	            
	        @show
			
			
		</div>

	<br style="clear: both;">
	<div id="footer">
		<a href=""><li class ="fcell">Trang chủ</li></a>
		<a href=""><li class="fcell">Giới thiệu</li></a>
		<a href=""><li class="fcell">Dịch vụ</li></a>
		<a href=""><li class="fcell">Thư ngỏ</li></a>
		<a href=""><li class="fcell">Kế hoạch</li></a>
		<a href=""><li class="fcell">Tuyển dụng</li></a>
		<a href=""><li class="fcell">Sitemap</li></a>
		<a href=""><li class="fcell">Liên hệ</li></a>
		<br style="clear: both;">
	</div>
	<div id="contact">
		<div class="float_left"><img src="/blog2/public/img/logo.png"></div>
		<div id="contact_r">
			<p id="contact_tit">Nhat minh logitcs</p>
			<p >Đại chỉ: phòng 109 khách sạn dầu khí 441 đường đà nẵng hải an hải phòng</p>
			<p >Tel: 8431-1231231 Fax:1234-4564564 Email:infor@nhatminh-hgg.com</p>
		</div>
	</div>
	</div>
	</div>
</body>
</html>