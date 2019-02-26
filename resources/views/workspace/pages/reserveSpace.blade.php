@extends('workspace.layouts.master')
<br><br><br>
@section('pageContent')



    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach

    @endif


    <section class="box-content box-login box-style-login" id="reserveSpace">
        <div class="container">
            <div class="row heading subheading">
                <div class="col-lg-12 wow fadeInLeft titleText" data-wow-delay="400ms">
                    <h4>Availavle Rooms</h4>
                    <hr>
                    <br>
                </div>
            </div>

            @if(session('message'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{session('message')}}.
                </div>
            @endif

            <div class="d-flex">
                @foreach($rooms as $room)
                    <div class="col-sm-6 col-md-3 col-lg-3">

                        <div class="post">
                            <div class="item-container wow fadeInUp" data-wow-delay="200ms">
                                <img src="images/{{$room->room_image_path}}"/>
                            </div>
                            <p class="headerRoom">{{$room->room_name}}</p>
                            <p>Chair Price/Hour: {{$room->chair_price_per_hour}} EGP</p>
                        </div>


                        <form method="post" action="{{route('insertReservation')}}">
                            @csrf
                            <input type="hidden" name="space_id" value="{{$room->space_id}}">
                            <input type="hidden" name="room_id" value="{{$room->room_id}}">

                            @if(Auth::user())
                                <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                            @endif

                            <div class="form-group">
                                <label for="number_of_chairs_reserved">number of chairs reserved</label>
                                <input id="number_of_chairs_reserved" class="form-control rounded " type="number"
                                       name="number_of_chairs_reserved"
                                       min="0"
                                       max="{{$room->available_chairs}}" placeholder="number of chairs"

                                       oninput="
                                   this.value=Math.abs(this.value);"

                                       value="{{old('number_of_chairs_reserved')}}"
                                       required>
                            </div>


                            <div class="form-group">
                                <label for="reservation_date">reservation date</label>
                                <input id="reservation_date" type="date" class="form-control" name="reservation_date"
                                       value="{{old('reservation_date')}}"
                                       required>
                            </div>

                            {{--<input type="number" class="form-control" name="reservation_from_hour"--}}
                            {{--placeholder="from hour"--}}
                            {{--min="1" max="24" onblur="if(this.value>24){this.value=24}"--}}
                            {{--value="{{old('reservation_from_hour')}}" required>--}}

                            <div class="form-group">
                                <label for="reservation_from_hour">reservation from hour</label>
                                <select id="reservation_from_hour" class="form-control" name="reservation_from_hour"
                                        value="{{old('reservation_from_hour')}}"
                                        required>
                                    @foreach(range(1, 24) as $hour)
                                        <option>{{$hour}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--oninput="this.value = (Math.abs(this.value))%24 "--}}

                            {{--<input type="number" class="form-control" name="reservation_to_hour"--}}
                            {{--min="1" max="24" onblur="if(this.value>24){this.value=24}"--}}
                            {{--placeholder="to hour" value="{{old('reservation_to_hour')}}" required>--}}

                            <div class="form-group">
                                <label for="reservation_to_hour">reservation to hour</label>
                                <select id="reservation_to_hour" class="form-control" name="reservation_to_hour"
                                        value="{{old('reservation_to_hour')}}" required>

                                    @foreach(range(1, 24) as $hour)
                                        <option>{{$hour}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @guest()
                                <a class="btn btn-success"
                                   style="width:100%; background-color: orangered;height: 35px;font-size: 16px;border: none "
                                   href="{{route('login')}}">Reserve</a>

                            @else
                                <button class="btn btn-success"
                                        style="width:100%; background-color: orangered;height: 35px;font-size: 16px;border: none "
                                        type="submit">Reserve
                                </button>
                            @endguest

                        </form>


                    </div>
                @endforeach
            </div>
            {{--<form></form>--}}
        </div>
    </section>
@endsection
