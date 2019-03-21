<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/admin/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/admin/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/admin/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <script src="js/jquery.dataTables.min.js" ></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body >
  <div class="panel panel-default">
  <!-- Default panel contents -->
  <h1>Edit Post</h1>
  <div class="panel-body">
    <table class="table">
      <thead class="thead-dark">
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">img</th>
        <th scope="col">author</th>
        <th scope="col">content</th>
        <th scope="col">category</th>
        <th scope="col">created</th>
        <th scope="col">action</th>
    </thead>
    @foreach($listNews as $item)
      <tr>
        <form method="post" >
        <td>{{$item->news_id}}</td>
        <td><textarea style="width: ; height: 60px" id="news_name">{{$item->news_name}}</textarea></td>
        <td><img src="/blog2/public/img/{{$item->news_img}}" width="60px" height="60px"></td>
        <td><textarea style="width: ; height: 60px" id="news_author">{{$item->news_author}}</textarea></td>
        <td><textarea style="width: 400px; height: 60px" id="news_content">{{$item->news_content}}</textarea></td>
        <td><select id="cat_id">
          @foreach($categories as $item2)
            @if($item2->cat_id == $item->cat_id)
              <option value="{{$item2->cat_id}}" selected="">{{$item2->cat_name}}</option>
            @else
              <option value="{{$item2->cat_id}}">{{$item2->cat_name}}</option>
            @endif
          @endforeach
        </select></td>
        <td><textarea style="width: ; height: 30px" id="created_at">{{$item->created_at}}</textarea></td>
        <td>
          <button type="submit" class="btn btn-primary">Update</button>
        </td>
        </form>
      </tr>
    @endforeach
  </table>
  </div>
</div>
<div>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
<div>
  <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">img</th>
              <th scope="col">author</th>
              <th scope="col">content</th>
              <th scope="col">category</th>
              <th scope="col">created</th>
              <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($listNews as $item)
            <tr>
              <td>{{$item->news_name}}</td>
              <td><input type="" name=""></td>
              <td><input type="" name=""></td>
              <td><select>
                <option value="Edinburgh">
                        Edinburgh
                    </option>
              </select></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Position</th>
                <th>Office</th>
            </tr>
        </tfoot>
    </table>
</div>
<div>
  <script type="text/javascript">
    $.fn.dataTable.ext.order['dom-text'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('input', td).val();
    } );
}
 
/* Create an array with the values of all the input boxes in a column, parsed as numbers */
$.fn.dataTable.ext.order['dom-text-numeric'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('input', td).val() * 1;
    } );
}
 
/* Create an array with the values of all the select options in a column */
$.fn.dataTable.ext.order['dom-select'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('select', td).val();
    } );
}
 
/* Create an array with the values of all the checkboxes in a column */
$.fn.dataTable.ext.order['dom-checkbox'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('input', td).prop('checked') ? '1' : '0';
    } );
}
 
/* Initialise the table with the required column ordering data types */
$(document).ready(function() {
    $('#example').DataTable( {
        "columns": [
            null,
            { "orderDataType": "dom-text-numeric" },
            { "orderDataType": "dom-text", type: 'string' },
            { "orderDataType": "dom-select" },
            null
        ]
    } );
} );
  </script>
</div>
</body>
</html>
