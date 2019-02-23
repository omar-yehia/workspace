@extends('workspace.layouts.master')
@section('pageContent')
    <section class="box-content box-login box-style-login  editReservation">
        <div class="container">

            <div class="row heading subheading">
                <div class="col-lg-12 wow fadeInLeft titleText" data-wow-delay="400ms">
                    <h4>Edit Your Reservation</h4>
                    <br><br>
                </div>
            </div>
            <form action="{{route('updateReservation')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <thead style="font-size: 13.5px;text-align: center; font-weight: bolder;background-color:burlywood;">
                    <th>Reservation Space</th>
                    <th>Reservation Room</th>
                    <th>Reservation Client</th>
                    <th>Reservation Date</th>
                    <th>Reservation From</th>
                    <th>Reservation To</th>
                    <th>Number Of Chairs Reserved</th>
                    </thead>
                    <tbody>
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
                                    <option {{ $hour == $reservation->reservation_from_hour? ' selected' : '' }} >{{$hour}}</option>
                            @endforeach
                        </select>
                        </td>

                        {{--<td><input type="text" class="form-control" name="reservation_to_hour"--}}
                                   {{--value="{{$reservation->reservation_to_hour}}" required></td>--}}

                        <td><select class="form-control" name="reservation_to_hour"
                                    value="{{old('reservation_to_hour')}}" required>
                                @foreach(range(1, 24) as $hour)
                                    <option {{ $hour == $reservation->reservation_to_hour? ' selected' : '' }} >{{$hour}}</option>
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
                            <button class="btn btn-success" style="width:100%; background-color: orangered;height: 35px;font-size: 16px;border: none ">Update Reservation
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </section>
@endsection
