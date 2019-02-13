@extends('workspace.layouts.master')
@section('pageContent')
    <section class="box-content box-1 box-style-1">
        <div class="container">




            {{-- CATCHING ERRORS--}}
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach

            @endif


            <form action="{{route('updateReservation')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <th>Reservation Space</th>
                    <th>Reservation Room</th>
                    <th>Reservation Client</th>
                    <th>Reservation Date</th>
                    <th>Reservation From</th>
                    <th>Reservation To</th>
                    <th>Number Of Chairs Reserved</th>
                    <tr>
                        {{--<input type="hidden" class="form-control" name="reservation_id"--}}
                        {{--value="{{$reservation->reservation_id}}" hidden>--}}
                        {{--<input type="hidden" class="form-control" name="space_id"--}}
                        {{--value="{{$reservation->space_id}}" hidden>--}}
                        {{--<input type="hidden" class="form-control" name="room_id"--}}
                        {{--value="{{$reservation->room_id}}" hidden>--}}
                        {{--<input type="hidden" class="form-control" name="user_id"--}}
                        {{--value="{{$reservation->user_id}}" hidden>--}}

                        <input type="hidden" class="form-control" name="reservation_id"
                               value="{{$reservation->reservation_id}}" hidden>


                        <input type="hidden" class="form-control" name="space_id"
                               value="{{$reservation->space_id}}" hidden>

                        <input type="hidden" class="form-control" name="room_id"
                               value="{{$reservation->room_id}}" hidden>


                        <input type="hidden" class="form-control" name="user_id"
                               value="{{$reservation->user_id}}" hidden>


                        <td>{{$reservation->space->space_name}}</td>
                        <td>{{$reservation->room->room_name}}</td>


                        <td><p>{{$reservation->user->name}}</p></td>


                        <td><input type="date" class="form-control" name="reservation_date"
                                   value="{{$reservation->reservation_date}}" required></td>

                        {{--<td><input type="text" class="form-control" name="reservation_from_hour"--}}
                                   {{--value="{{$reservation->reservation_from_hour}}" required></td>--}}

                        <td><select class="form-control" name="reservation_from_hour"
                                value="{{old('reservation_from_hour')}}" required>
                            @foreach(range(1, 24) as $hour)
                                <option>{{$hour}}</option>
                            @endforeach
                        </select>
                        </td>

                        {{--<td><input type="text" class="form-control" name="reservation_to_hour"--}}
                                   {{--value="{{$reservation->reservation_to_hour}}" required></td>--}}

                        <td><select class="form-control" name="reservation_to_hour"
                                    value="{{old('reservation_to_hour')}}" required>
                                @foreach(range(1, 24) as $hour)
                                    <option>{{$hour}}</option>
                                @endforeach
                            </select>
                        </td>

                        <td><input type="number" class="form-control" name="number_of_chairs_reserved"
                                   min="1" max="{{$reservation->room->available_chairs}}"
                                   oninput="
                                   this.value=Math.abs(this.value);
                                   if(this.value>100){this.value =100};"

                                   value="{{$reservation->number_of_chairs_reserved}}" required></td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <button class="btn btn-success" style="width:100%;">Update Reservation
                            </button>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </section>
@endsection
