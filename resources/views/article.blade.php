<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site Metas -->
    <title>Tech Blog - Stylish Magazine Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
   <!-- Site Icons -->
   <link rel="shortcut icon" href="sampoll/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="sampoll/images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="{{asset('sampoll/css/bootstrap.css')}}" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="{{asset('sampoll/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{asset('sampoll/css/responsive.css')}}" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="{{asset('sampoll/css/colors.css')}}" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="{{asset('sampoll/css/version/tech.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.button1 {background-color: #4CAF50; color:#ffffff;} /* Green */
.button2 {background-color: #f44336;  color:#ffffff;} /* Blue */
.button3 {background-color: #008CBA;  color:#ffffff;} /* Red */ 

:focus{
  outline:none;
}
.radio{
  -webkit-appearance:button;
  -moz-appearance:button;
  appearance:button;
  border:4px solid #ccc;
  border-top-color:#bbb;
  border-left-color:#bbb;
  background:#fff;
  width:50px;
  height:50px;
  border-radius:50%;
}
.radio:checked{
  border:20px solid #4099ff;
}

</style>
</head>
<body>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="images/version/tech-logo.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="tech-index.html">Home</a>
                            </li>
                            
                        </ul>
                       
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                            
                                <h3>{{$showArticle->title}}</h3>

                                <div class="blog-meta big-meta">
                                    <small> {{date('d', strtotime($showArticle->created_at))}} {{date('M', strtotime($showArticle->created_at))}}, {{date('Y', strtotime($showArticle->created_at))}}</small>
                                    <small>{{$showArticle->user->name}}</small>
                                    <small><i class="fa fa-eye"></i> {{$showArticle->seen_by}}</small>
                                </div><!-- end meta -->

                               
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="{{asset((isset($showArticle) && $showArticle->image!='')?'resource_img/'.$showArticle->image:'resource_img/noimage.jpg')}}" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">
      
                                    <p>{{$showArticle->body}}</p>
                                
        <button type="button"  class="button1">Agree <span class="badge">{{$getAgreeCount}}%</span></button>
        <button class="button2">Disagree <span class="badge">{{$getDisagreeCount}}%</span></button>
        <button class="button3">Indifferent <span class="badge">{{$getIndifferentCount}}%</span></button><br><br><hr>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Opinion Poll</button>             -->
                                </div><!-- end pp -->
                              
                            </div><!-- end content -->
                            <form action="{{route('poll.vote')}}" method="POST">
                                @csrf 
                                @method('POST')
                                @if(session()->has('success'))
                    <div class="alert alert-solid alert-success col-md-10" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Success!</strong> {{ session()->get('success') }}
                      </div>
                @endif
                @if($showArticle->poll->status == TRUE)
                                <h2>{{$showArticle->poll->title}}</h2>
                <div class="modal-body">
                    <input type="hidden" value="{{$showArticle->poll->id}}" name="poll_id">
                    <span><label for="">Agree</label><input type="radio" class="radio" value="agree" name="vote" id='agree' ></span> 
                    <span><label for="">Disagree</label><input type="radio" class="radio" value="disagree" name="vote" id='disagree'></span>
                    <span><label for="">Indifferent</label><input type="radio" class="radio" value="indifferent" name="vote" id='indifferent'></span>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Vote</button>
                </div>
                </form>
                @endif
                            <hr class="invis1">

                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                    <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->

                                <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Jessica</a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->
                            <div class="custombox clearfix">
                                <h4 class="small-title">3 Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author_01.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                                                    <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media last-child">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                                    <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper">
                                            <input type="text" class="form-control" placeholder="Your name">
                                            <input type="text" class="form-control" placeholder="Email address">
                                            <input type="text" class="form-control" placeholder="Website">
                                            <textarea class="form-control" placeholder="Your comment"></textarea>
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->


                                

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                           

                            <div class="widget">
                                <h2 class="widget-title">Popular Posts</h2>
                                @foreach($getPosts as $post)
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="{{route('article', $post->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{asset((isset($post) && $post->image!='')?'resource_img/'.$post->image:'resource_img/noimage.jpg')}}" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$post->title}}</h5>
                                                <small> {{date('d', strtotime($post->created_at))}} {{date('M', strtotime($post->created_at))}}, {{date('Y', strtotime($post->created_at))}}</small>
                                            </div>
                                        </a>
                                        
                                    </div>
                                </div><!-- end blog-list -->
                                @endforeach
                            </div><!-- end widget -->

                          
                
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="widget">
                            <div class="footer-text text-left">
                                <a href="index.html"><img src="images/version/tech-footer-logo.png" alt="" class="img-fluid"></a>
                                <p>Tech Blog is a technology blog, we sharing marketing, news and gadget articles.</p>
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>

                                <hr class="invis">

                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Categories</h2>
                            <div class="link-widget">
                                <ul>
                                    <li><a href="#">Marketing <span>(21)</span></a></li>
                                    <li><a href="#">SEO Service <span>(15)</span></a></li>
                                    <li><a href="#">Digital Agency <span>(31)</span></a></li>
                                    <li><a href="#">Make Money <span>(22)</span></a></li>
                                    <li><a href="#">Blogging <span>(66)</span></a></li>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright">&copy; Tech Blog. Design: <a href="http://html.design">HTML Design</a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="{{asset('sampoll/js/jquery.min.js')}}"></script>
    <script src="{{asset('sampoll/js/tether.min.js')}}"></script>
    <script src="{{asset('sampoll/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('sampoll/js/custom.js')}}"></script>
<script>
</script>
</body>
</html>


		
<script>
      
      $(document).ready(function(){
        // $('#error').hide();
        // $("#btn-loader1").hide();
        $('#saveVote').click(function(e){
           e.preventDefault();
        //    $("#click1").hide();
        //       $("#btn-loader1").show();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
           $.ajax({
              url: "{{ route('poll.vote') }}",
              method: 'post',
              data: {
                agree: $('#agree').val(),
                disagree: $('#disagree').val(),
                indifferent: $('#indifferent').val()
                 
              },
              success: function(result){
                console.log("success");
                console.log(result.success);
                //  $('.alertme').show();
                 //$('.alertme').html(result.success);
                //  $('#formID').hide();
                //  $('#stars').hide();
              },
              error: function(result){
                console.log(result.error);
                //$('#error').show();
                //$("#btn-loader1").hide();
              }});
           });
        });


        
      </script>