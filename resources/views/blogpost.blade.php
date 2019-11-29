<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 @include('layouts.header')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
@include('layouts.topnav')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
@include('layouts.sidenav')
<!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">
     

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Blog Posts</h3>
         
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
            @if(session()->has('success'))
                    <div class="alert alert-solid alert-success col-md-10" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Success!</strong> {{ session()->get('success') }}
                      </div>
                @endif
              <thead>
                <tr>
				<th>S/N</th>
                  <th>Author </th>
                  <th>Title</th>
                  <th>Seen By</th>
                  <th>Create Poll</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php $sn = 1;?>
			  @foreach($post as $posts)
                <tr>
                <td>{{ $sn++}}</td>
                <td>{{$posts->user->name}}</td>
                <td>{{$posts->title}}</td>
                <td>{{$posts->seen_by}}</td>
                <td><button data-id="{{$posts->id}}" title="Add this item" class="open-AddBookDialog btn btn-success" href="#addBookDialog">Add Poll</button>
                
                </td>
                <td>
                <form ></form>  
                <button class="btn btn-danger">delete</button></td>
				</tr>
				@endforeach
              </tbody>
            </table>
			<p><a href="#">View all</a></p>
          </div>
          <!-- /.table-responsive -->
          <!-- /.row -->
          <!-- Main row -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">SamPoll</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
@include('layouts.footer')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script>
$(document).on("click", ".open-AddBookDialog", function (e) {

e.preventDefault();

var _self = $(this);

var myBookId = _self.data('id');
$("#postId").val(myBookId);

$(_self.attr('href')).modal('show');
});
</script>
</body>
</html>

<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create New Poll</h4>
      </div>
      <form action="{{route('create.poll')}}" method="post">
      @csrf 
      @method('POST')
      <div class="modal-body">
        <input type="hidden" name="postId" id="postId" value="" />
        <label for="">Enter Poll Title</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create Poll</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->