<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
  <div class="pull-left image">
          <img src="cotm_reg/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
    <div class="pull-left info">
      <p>{{ucfirst(auth()->user()->name)}}</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
    <br><br>
  </div>
  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="{{route('admin.post')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
    <li class="active"><a href="{{route('index.poll')}}"><i class="fa fa-home"></i> <span>Polls</span></a></li>
    <!-- <li><a href="registered_contestants.html"><i class="fa fa-link"></i> <span>Another Link</span></a></li> -->
   
  </ul>
  <!-- /.sidebar-menu -->
</section>