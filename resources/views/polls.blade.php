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
          <h3 class="box-title">Blog Polls</h3>
         
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
                  <th>Post Title </th>
                  <th>Poll Description</th>
                  <th>Agree (%)</th>
                  <th>Disagree (%)</th>
                  <th>Indifferent (%)</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php $sn = 1;?>
			  @foreach($poll as $polls)
                <tr>
                <td>{{ $sn++}}</td>
                <td>{{$polls->post->title}}</td>
                <td>{{$polls->title}}</td>
                <td>{{$polls->agree}}</td>
                <td>{{$polls->disagree}}</td>
                <td>{{$polls->indifferent}}</td>
                @if($polls->status ==TRUE)
                <td><button class="btn btn-success">Active</button></td>
                <td>
                <form action="{{route('status.update', $polls->id)}}" method="post">
                @csrf 
                @method('POST')
                <input type="hidden" name="status" value="0">
                <button type="submit" class="btn btn-danger">Disapprove</button>
                </form>
                </td>
                @else
                <td><button class="btn btn-danger">Pending</button></td>
                
                <td>
                <form action="{{route('status.update', $polls->id)}}" method="post">
                @csrf 
                @method('POST')
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-success">Approve</button>
                </form>
                </td>
                @endif
				</tr>
				@endforeach
              </tbody>
            </table>
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

</body>
</html>
