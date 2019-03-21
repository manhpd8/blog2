<title>add new post</title>
<link rel="stylesheet" type="text/css" href="/blog2/public/css/bootstrap.min.css">
<h1>ADD NEW POST</h1>
<form method="post" enctype="multipart/form-data">{{ csrf_field() }}
	<div class="form-group">
	    <label for="exampleFormControlInput1">Name Post</label>
	    <input type="text" class="form-control" name="name" placeholder="name post">
	</div>
  	<div class="form-group">
    	<label for="exampleFormControlSelect1">Category</label>
    	<select class="form-control" name="cat_id" id="cat_id">
	      	@foreach($categorys as $category)
			<option value="{{$category->cat_id}}">
			{{$category->cat_name}}
			@if($category->cat_parentId > 0)
				parentId: {{$category->cat_parentId}}
			@endif
			</option>
			@endforeach
    	</select>
  	</div>
  	<div class="form-group">
	    <label for="exampleFormControlInput1">Author</label>
	    <input type="text" class="form-control" name="author" placeholder="author">
	 </div>
 	<div class="form-group">
    	<label for="exampleFormControlTextarea1">Content</label>
    	<textarea class="form-control" name="content" rows="3"></textarea>
  	</div>
  	<input type="file" name="img">
  	<button type="submit" class="btn btn-primary" name="add news">Post</button>
</form>

<style type="text/css">
.news_title{
	width: 100px;
	display: inline-block;

}
body{
	width: 70%;
	margin-left: 15%
}
</style>
@if(Session::has('success'))

<p class="alert alert-danger">{{Session::get('success')}}</p>

@endif