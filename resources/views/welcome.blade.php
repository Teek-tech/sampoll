<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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

</head>
<body>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="tech-index.html"><img src="sampoll/images/version/tech-logo.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="tech-index.html">Home</a>
                            </li>
                            
                           
                            <li class="nav-item">
                                <a class="nav-link" href="tech-contact.html">Contact Us</a>
                            </li>
                        </ul>
                
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

 
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->
                           
                            <div class="blog-list clearfix">
                            @foreach($post as $posts)
                    <div class="blog-box row">
                        <div class="col-md-4">
                            <div class="post-media">
                                <a href="{{route('article', $posts->id)}}">
                                    <img src="{{asset((isset($posts) && $posts->image!='')?'resource_img/'.$posts->image:'resource_img/noimage.jpg')}}" alt="" class="img-fluid">
                                    <div class="hovereffect"></div>
                                </a>
                            </div><!-- end media -->
                        </div><!-- end col -->
        
            <div class="blog-meta big-meta col-md-8">
           
                <h4><a href="{{route('article', $posts->id)}}">{{ucfirst($posts->title)}}</a></h4>
                <p>{{ucfirst(str_limit($posts->body, 150, '...'))}}.</p>
                <small class="firstsmall"><a class="bg-orange" href="#">{{ucfirst($posts->category)}}</a></small>
                <small> {{date('d', strtotime($posts->created_at))}} {{date('M', strtotime($posts->created_at))}}, {{date('Y', strtotime($posts->created_at))}}</a></small>
                <small>{{$posts->user->name}}</small>
                <small><i class="fa fa-eye"></i> {{$posts->seen_by}}</small>
               
            </div><!-- end meta -->
           
        </div><!-- end blog-box -->
       
                                <hr class="invis">

                                @endforeach
                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                           

                            

                            

                            
                            <div class="widget">
                                <h2 class="widget-title">Follow Us</h2>

                                <div class="row text-center">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button facebook-button">
                                            <i class="fa fa-facebook"></i>
                                            <p>27k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button twitter-button">
                                            <i class="fa fa-twitter"></i>
                                            <p>98k</p>
                                        </a>
                                    </div>

                                    

                                    
                                </div>
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
                                <a href="index.html"><img src="sampoll/images/version/tech-footer-logo.png" alt="" class="img-fluid"></a>
                                <p>Tech Blog is a technology blog, we sharing marketing, news and gadget articles.</p>
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    
                                </div>

                                <hr class="invis">

                                
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    

                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Copyrights</h2>
                            <div class="link-widget">
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    
                                    
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

</body>
</html>
