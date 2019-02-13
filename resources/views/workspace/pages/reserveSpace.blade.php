@extends('workspace.layouts.master')

@section('pageContent')
    <section class="box-content box-1 box-style-1">
        <div class="container">

            @if(session('message'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{session('message')}}.
                </div>
            @endif

            @foreach($rooms as $room)
                <div class="col-sm-6 col-md-3 col-lg-3">

                    <div class="post">
                        <div class="item-container wow fadeInUp" data-wow-delay="200ms">
                            <img src="images/{{$room->room_image_path}}"/>
                        </div>
                        <p>{{$room->room_name}}</p>
                        <p>Chair Price/Hour: {{$room->chair_price_per_hour}} EGP</p>
                    </div>


                    <form method="post" action="{{route('insertReservation')}}">
                        @csrf
                        <input type="hidden" name="space_id" value="{{$room->space_id}}">
                        <input type="hidden" name="room_id" value="{{$room->room_id}}">

                        @if(Auth::user())
                            <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                        @endif

                        <input class="form-control rounded " type="number" name="number_of_chairs_reserved"
                               min="0"
                               max="{{$room->available_chairs}}" placeholder="number of chairs"

                               oninput="
                                   this.value=Math.abs(this.value);"

                               value="{{old('number_of_chairs_reserved')}}"
                               required>

                        <input type="date" class="form-control" name="reservation_date"
                               value="{{old('reservation_date')}}"
                               required>

                        {{--<input type="number" class="form-control" name="reservation_from_hour"--}}
                        {{--placeholder="from hour"--}}
                        {{--min="1" max="24" onblur="if(this.value>24){this.value=24}"--}}
                        {{--value="{{old('reservation_from_hour')}}" required>--}}
                        <select class="form-control" name="reservation_to_hour"
                                value="{{old('reservation_to_hour')}}"
                                required>
                            @foreach(range(1, 24) as $hour)
                                <option>{{$hour}}</option>
                            @endforeach
                        </select>

                        {{--oninput="this.value = (Math.abs(this.value))%24 "--}}

                        {{--<input type="number" class="form-control" name="reservation_to_hour"--}}
                        {{--min="1" max="24" onblur="if(this.value>24){this.value=24}"--}}
                        {{--placeholder="to hour" value="{{old('reservation_to_hour')}}" required>--}}

                        <select class="form-control" name="reservation_to_hour"
                                value="{{old('reservation_to_hour')}}" required>
                            @foreach(range(1, 24) as $hour)
                                <option>{{$hour}}</option>
                            @endforeach
                        </select>


                        @guest()
                            <a class="btn btn-success" style="width:100% ;" href="{{route('login')}}">Reserve</a>

                        @else
                            <button class="btn btn-success" style="width:100% ;" type="submit">Reserve</button>
                        @endguest

                    </form>


                </div>
            @endforeach

            <form></form>
        </div>
    </section>
@endsection
