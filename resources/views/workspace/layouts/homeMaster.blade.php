<html>
<head>
    <!-- META DATA -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Free Bootstrap Themes by 365Bootstrap dot com - Free Responsive Html5 Templates">
    <meta name="author" content="http://www.365bootstrap.com">

    <title>Workspace.com</title>

{{--from the auth login head--}}
{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Owl Carousel Assets -->
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <!-- <link href="owl-carousel/owl.theme.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<header>

    <!-- /////////////////////////////////////////Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1 class="navbar-brand page-scroll">
                    <a href="{{route('home')}}">WorkSpace</a>
                </h1>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ route('home') }}">Home</a>
                    </li>


                    {{--<li>--}}
                    {{--<a class="page-scroll" href="{{ route('about') }}">About</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a class="page-scroll" href="{{ route('gallery') }}">Gallery</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a class="page-scroll" href="{{ route('service') }}">Service</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a class="page-scroll" href="{{ route('contact') }}">Contact</a>--}}
                    {{--</li>--}}

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="login">{{ __('Login') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else


                        {{--FOR ADMIN--}}
                        @if(Auth::user()->user_type==1)
                            <li>
                                <a class="page-scroll" href="{{ route('spaceCrud') }}">Space Crud</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="{{ route('reservationCrud') }}">Reservation Crud</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="{{ route('userCrud') }}">User Crud</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="{{ route('roomCrud') }}">Room Crud</a>
                            </li>

                            {{--FOR Owner--}}
                        @elseif(Auth::user()->user_type==2)
                            <li>
                                <a class="page-scroll" href="{{ route('spaceCrud') }}">Add Spaces</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="{{ route('roomCrud') }}">Add Rooms</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="{{ route('userProfile') }}">Reservations Of Clients</a>
                            </li>

                            {{--FOR User And Owner--}}
                        @else
                            <li>
                                <a class="page-scroll" href="{{ route('userProfile') }}">My Reservations</a>
                            </li>


                        @endif








                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;border: none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    </div>
</header>


{{--    CONTENT HERE    --}}

@yield('pageContent')



<!-- FOOTER -->
<footer>
    <div class="top-footer">
        <div id="owl-brand" class="owl-carousel">
            <div class="item " >
                <a href="single.html"><img class="p-3" src="images/images1.jfif"/></a>
            </div>
            <div class="item ">
                <a href="single.html"><img  class="p-3" src="images/images2.jfif"/></a>
            </div>
            <div class="item ">
                <a href="single.html"><img  class="p-3" src="images/images.png"/></a>
            </div>
            <div class="item ">
                <a href="single.html"><img  class="p-3" src="images/images1.jfif"/></a>
            </div>
            <div class="item ">
                <a href="single.html"><img class="p-3" src="images/images2.jfif"/></a>
            </div>
            <div class="item ">
                <a href="single.html"><img class="p-3" src="images/images.png"/></a>
            </div>

            <div class="item ">
                <a href="single.html"><img class="p-3"  src="images/images1.jfif" /></a>
            </div>
        </div>
    </div>
    <div class="wrap-footer">
        <div class="container">
            <div class="row">
                <div class="col-footer col-md-4">
                    <h2 class="footer-title">About Us</h2>
                    <div class="textwidget">We are Organization that help to reservse the free work space<br>
                        for study or meeting with team by Enter in our website and reserved<br>
                        owner Place.</div>
                </div>
                <div class="col-footer col-md-4 widget_recent_entries">

                </div>
                <div class="col-footer col-md-4">
                    <h2 class="footer-title">NEWS LETTER</h2>
                    If you want to receive our latest news send directly to your email, please leave your email address bellow. Subscription is free and you can cancel anytime.
                    <form action="#" method="post">
                        <input type="text" name="your-name" value="" size="40" placeholder="Your Email" />
                        <input type="submit" value="SUBSCRIBE" class="btn btn-3" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>© Your Company. All Rights Reserved.</p>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/365bootstrap"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- jQuery -->
<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/agency.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>

<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/main.js"></script>


<!-- carousel -->
<script src="owl-carousel/owl.carousel.js"></script>
<script>
    $(document).ready(function () {
        $("#owl-brand").owlCarousel({
            autoPlay: 5000,
            items: 6,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [979, 2],
            navigation: true,
            navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
            pagination: false
        });
    });
</script>



</body>
</html>




