<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Seyahat Blog</title>
    <link href="{{asset("vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="{{asset("css/toastr.min.css")}}" rel="stylesheet">
    <link href="{{asset("css/bootstrap-switch.min.css")}}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="{{asset("vendor/summernote/summernote.css")}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <link href="{{asset("css/clean-blog.css")}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset("vendor/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link href="{{asset("css/custom.css")}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.csrfToken = "{{ csrf_token() }}"
    </script>
</head>
<body data-status="{{Session::get("status")}}">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid" id="topbar">
        <div>
            <div class="col-md-12">
                <ul>
                    <li><a href="/home"><i class="fa fa-home">Home</i></a></li>
                    @if(Auth::guest())
                        <li><a href="/login" class="uyelik-tus"  style="color: yellow; font-size: 15px"><i class="fa fa-sign-in"></i>Üye Girişi</a></li>
                        <li><a href="/register" class="uyelik-tus"  style="color: yellow; font-size: 15px"><i class="fa fa-users"></i>Üye Ol</a></li>

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                @if(Auth::user()->authorized("admin"))
                                    <li><a href="{{ url('/user') }}"><i class="fa fa-btn fa-users"></i>Kullanıcı Ayarları</a></li>
                                    <li><a href="{{ url('/post') }}"><i class="fa fa-btn fa-list-ol"></i>Postlar</a></li>
                                    <li><a href="{{ url('/talep') }}"><i class="fa fa-btn fa-envelope-o"></i>Yazarlık Talepleri</a></li>
                                    <li class="divider"></li>
                                @endif
                                @if(Auth::user()->authorized("author"))
                                    <li><a href="{{ url('/author_post') }}""><i class="fa fa-btn fa-list"></i>Postlarım</a></li>
                                    <li><a href="{{ url('/author_post/create') }}"><i class="fa fa-btn fa-plus"></i>Yeni Post Ekle</a></li>
                                @endif
                                @if(!Auth::user()->authorized("admin") && !Auth::user()->authorized("author"))
                                    <li><a href="{{ url('/yazarlik_talebi') }}"><i class="fa fa-btn fa-envelope"></i>Yazarlık Talebi</a></li>
                                @endif
                                <li><a href="{{route('log_out')}}"><i class="fa fa-btn fa-sign-out"></i>Çıkış</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

@yield('contents')
<hr>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset("vendor/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset("vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/toastr.min.js")}}"></script>
<!-- Theme JavaScript -->
<script src="{{asset("vendor/summernote/summernote.min.js")}}"></script>
<script src="{{asset("vendor/summernote/lang/summernote-tr-TR.js")}}"></script>
<script src="{{asset("js/bootstrap-switch.min.js")}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="{{asset("js/laravel-delete.js")}}"></script>
<script src="{{asset("js/clean-blog.js")}}"></script>
<script src="{{asset("js/custom.js")}}"></script>
</body>
</html>
