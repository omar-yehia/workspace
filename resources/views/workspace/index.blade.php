@extends('workspace.layouts.master')

@section('pageContent')


    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach

    @endif

    <!-- Navigation -->
    <div class="box-shadow">
        <!-- Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/banner1.jpg" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12">
                            <h3>WELCOME TO OUR WORKSPACE WEBSITE</h3>
                            <br><br>
                            <a href="#select" class="btn btn-primary">MAKE A RESERVATION <i
                                    class="fas fa-hand-point-down "
                                    style="font-size: 20px "></i></a>
                        </div>
                    </div><!-- /header-text -->
                </div>
                <div class="item">
                    <img src="images/banner2.jpg" alt="Third slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12">
                            <h3>DO ALL YOUR WORK HERE!</h3>
                            <br><br>
                            <a href="#select" class="btn btn-primary">MAKE A RESERVATION <i
                                    class="fas fa-hand-point-down"
                                    style="font-size: 20px"></i></a>
                        </div>
                    </div><!-- /header-text -->
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div><!-- /carousel -->
    </div>


    <br><br><br>


    <div class="container">
        <div class="row heading subheading">
            <div class="col-lg-12 wow fadeInLeft titleText" data-wow-delay="400ms">
                <h4>Welcome To Our Creative WorkSpace </h4>
                <br><br>
                <a href="#select" class="btn btn-primary">LET'S GO! <i class="fas fa-hand-point-down"
                                                                       style="font-size: 20px"></i></a>

            </div>
        </div>
    </div>

    <br><br><br>
    <!-- /////////////////////selected City////////////////////Content -->




    {{--LIVE SEARCH--}}




    <!-- ////////////Content Box 01 -->


    <!-- ////////////Content Box 02 -->
    <section class="box-content box-0  backGroundImage" id="select" >
        <div class="container" >


            <div class="row heading cityheader " >
                <div class="col-lg-12" >
                    <h2 class="text-center" style="color: rgb(255,150,31);">SELECT GOVERNORATE</h2>
                    <hr>
                </div>
            </div>


            <div>
                {{--select governorate--}}
                <form action="{{route('governorateSpaces')}}" method="get">
                    @csrf

                    <select name="selectedGovernorate" onchange="this.form.submit()" style="color: #ff961f;">

                        <option>Choose Governorate</option>

                        @foreach($governoratesList as $governorate)
                            <option>{{$governorate}}</option>
                        @endforeach

                    </select>
                </form>
            </div>

            {{--<div class=" categories">--}}
            {{--<ul class="cat">--}}
            {{--<li>--}}
            {{--<ol class="type list-inline">--}}
            {{--place for filter buttons--}}

            {{--</ol>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--<div class="clearfix"></div>--}}
            {{--</div>--}}


        </div>
    </section>





    @if(isset($spacesInGovernorate))

        <section>
            <div class="container resultOfSelect" id="reserve">
                <div class="row">

                    <br><br><br>
                    {{--GO TO SECTION -- NO NEED TO SCROLL --}}

                    <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
                    <script>
                        $(function () {
                            $([document.documentElement, document.body]).animate({
                                scrollTop: $("#reserve").offset().top
                            }, 1000);
                        });
                    </script>


                    <div class="row headerSelect">
                        <h2>{{$governorateSelected}}</h2>
                    </div>
                    <br>
                    <div class="row">
                        @foreach($spacesInGovernorate as $spaceFromSelect)
                            <div class="col-sm-6 col-md-3 col-lg-3 "
                                 onclick="window.location='{{route('reserveSpace',$spaceFromSelect->space_id)}}'">

                                <div class="post">
                                    <div class="item-container wow fadeInUp imageSelect "
                                         data-wow-delay="200ms"
                                    >
                                        <img src="images/{{$spaceFromSelect->space_image_path}}"
                                        />
                                    </div>
                                    <span class="nameImageSelect">{{$spaceFromSelect->space_name}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

        </section>
    @endif

    <!-- ////////////Content Box 01 -->
    <section class="box-content box-1 box-style-1" id="about">
        <div class="container">
            <div class="row heading">
                <div class="col-lg-12">
                    <h2>WORKSPACE SERVICE</h2>
                    <hr class="line02">

                </div>
            </div>

            <div class="row  wow fadeInUp" data-wow-delay="400ms">
                <div class="col-sm-4">
                    <div class="box-item">
                        <div class="wrap-img">
                            <img src="images/users1.png"/>
                        </div>
                        <br><br><br>
                        <h6 class="services-heading">PRIVATE MEETING ROOM</h6>
                        <br>
                        <p>This space seats up to 6 people. A white board and fiber-optic internet connection is
                            in included with the space along
                            with reception services, access to our professional xerox machine, and complimentary
                            coffee, tea and water. </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box-item">
                        <div class="box-item">

                            <div class="wrap-img">

                                <img src="images/wifi.png"/>
                            </div>
                            <br><br><br>
                            <h6 class="services-heading">WIRELESS INTERNET</h6>
                            <br>
                            <p>Coworking Wi-Fi networks that are designed specifically for multi-tenanted
                                buildings allow operators to tailor the
                                connection to their members’ needs. Using a fully managed service provides the
                                option for members to roam securely across your site,
                                whether at their desk, in the common areas, or across various locations. </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box-item">
                        <div class="box-item">
                            <div class="wrap-img">
                                <img src="images/computer.png"/>
                            </div>
                            <br><br><br>
                            <h6 class="services-heading">FREE PUBLIC COMPUTER</h6>
                            <br>
                            <p>Each of our libraries have free computers for the public to use. With your
                                library card, you may use the
                                reservation system in each library to reserve a one-hour session. If you do not
                                have a library card, you can register for a Computer
                                Use Only card, or use one of our Express Computers. All of our libraries have
                                free Wi-Fi accessibility.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-----Contact Section--------------------------->


    <!-- ////////////Content Box -->
    <section class="box-content box-style-1">
        <div class="container">
            <div class="row heading">
                <div class="col-lg-12">
                    <h2>CONTACT</h2>
                    <hr class="line02">
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 box-item wow fadeInLeft " data-wow-delay="400ms">
                    <h2>Contact Info</h2>
                    <span>SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM DOLOREMQUE LAUDANTIUM, TOTAM REM APERIAM.</span><br>
                    <br>
                    <p>JL.Kemacetan timur no.23. block.Q3<br>
                        Jakarta-Indonesia</p>
                    <p>+6221 888 888 90 <br>
                        +6221 888 88891</p>
                    <p>info@yourdomain.com</p>
                </div>
                <div class="col-md-8 wow fadeInRight" data-wow-delay="400ms">
                    <h2>Contact Form</h2>
                    <form id="ff" name="form1" method="post" action="contact.php">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="name" id="name"
                                           placeholder="Enter name" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" name="email" id="email"
                                           placeholder="Enter email" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="subject" id="subject"
                                           placeholder="Subject" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="form-group">
										<textarea name="message" id="message" class="form-control" rows="4" cols="25"
                                                  required="required"
                                                  placeholder="Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-skin btn-lg page-scroll wow fadeInUp"
                                        name="submitcontact" id="submitcontact">Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- ////////////Content Box 04 -->


    </div>
@endsection





{{--LIVE SEARCH--}}

{{--<script type="text/javascript" src="js/jquery-2.1.1.js"></script>--}}

{{--<section class="box-content box-2" id="section">--}}
{{--<div class="container">--}}
{{--<div class="row heading">--}}
{{--<div class="col-lg-12">--}}

{{--<h3 align="center" style="color: #206bd5;font-style: italic">Get to your beloved--}}
{{--<i class="fa fa-heart" style="font-size: 24px;font-style: italic;color: #eb563f;"></i>--}}
{{--space now with us :) </h3><br/>--}}

{{--<div class="panel panel-info">--}}
{{--<div class="panel-heading">Search Spaces In Any Governorate</div>--}}
{{--<div class="panel-body">--}}
{{--<div class="form-group">--}}
{{--<input type="text" name="search" id="search" class="form-control"--}}
{{--placeholder="Search Spaces"/>--}}
{{--</div>--}}
{{--<div class="table-responsive">--}}
{{--<h3 align="center">Total Results : <span id="total_records"></span></h3>--}}
{{--<form action="{{route('governorateSpaces')}}" method="get">--}}
{{--@csrf--}}
{{--<table class="table table-striped table-bordered">--}}
{{--<thead>--}}
{{--<tr>--}}
{{--<th>Space Name</th>--}}
{{--<th>Space Governorate</th>--}}
{{--<th>Space Address</th>--}}
{{--<th>Space Rooms</th>--}}
{{--</tr>--}}
{{--</thead>--}}
{{--<tbody>--}}


{{--</tbody>--}}
{{--</table>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--<input type="hidden" name="_token" value="{{ Session::token() }}">--}}
{{--<script>--}}
{{--$(document).ready(function () {--}}


{{--function fetch_customer_data(query = '') {--}}
{{--// $.ajaxSetup({--}}
{{--//     headers: {--}}
{{--//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--//     }--}}
{{--// });--}}

{{--$.ajax({--}}
{{--// headers: {--}}
{{--//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--// },--}}
{{--url: "{{ route('live_search.action') }}",--}}
{{--method: 'GET',--}}
{{--data: {query: query},--}}
{{--dataType: 'json',--}}
{{--success: function (data) {--}}
{{--$('tbody').html(data.table_data);--}}
{{--$('#total_records').text(data.total_data);--}}
{{--}--}}
{{--})--}}
{{--}--}}

{{--$(document).on('keyup', '#search', function () {--}}
{{--var query = $(this).val();--}}
{{--fetch_customer_data(query);--}}
{{--});--}}

{{--fetch_customer_data();--}}
{{--});--}}
{{--</script>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}
