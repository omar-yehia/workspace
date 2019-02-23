@extends('workspace.layouts.master')


{{--


--}}


@section('pageContent')


    <section class="box-content  box-style-1" id="content">
        <div class="container">
            {{--<br><br><br><br><br><br>--}}
            {{--asasasas--}}


            <div class=" heading subheading">
                <div class="col-lg-12 wow fadeInLeft titleText" data-wow-delay="400ms">
                    <br><br>
                    <h4>All Reservations</h4>
                    <br><br>
                </div>
            </div>

            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach

            @endif


            @if(session('deleted'))
                <div class="alert alert-danger">
                    <strong>{{session('deleted')}}</strong> Successfully.
                </div>
            @endif
















{{--خلي بالك لسه ما اضفناش ال --}}


               {{--INSERT  a reservation--}}

            {{--<form action="{{route('insertReservation')}}" method="post" enctype="multipart/form-data"--}}
                  {{--autocomplete="off">--}}
                {{--@csrf--}}
                {{--<table class="table table-striped table-bordered">--}}
                    {{--<th>Reservation Space</th>--}}
                    {{--<th>Reservation Room</th>--}}
                    {{--<th>Reservation Client</th>--}}
                    {{--<th>Reservation Date</th>--}}
                    {{--<th>Reservation From</th>--}}
                    {{--<th>Reservation To</th>--}}
                    {{--<th>Number Of Chairs</th>--}}
                    {{--<tr>--}}
                        {{--<input type="hidden" class="form-control" name="reservation_id" hidden>--}}
                        {{--<input type="hidden" class="form-control" name="room_id" hidden>--}}
                        {{--<input type="hidden" class="form-control" name="user_id" hidden>--}}


                        {{--<td><input type="text" class="form-control" name="reservation_space_name" required></td>--}}
                        {{--<td><input type="text" class="form-control" name="reservation_room_name" required></td>--}}
                        {{--<td><input type="text" class="form-control" name="reservation_user_name" required></td>--}}

                        {{--<td><input type="date" class="form-control" name="reservation_date" required></td>--}}
                        {{--<td><input type="number" class="form-control" name="reservation_from_hour"--}}
                                   {{--onblur="this.value=Math.abs(this.value);" required></td>--}}
                        {{--<td><input type="number" class="form-control" name="reservation_to_hour"--}}
                                   {{--onblur="this.value=Math.abs(this.value);" required></td>--}}
                        {{--<td><input type="text" class="form-control" name="number_of_chairs_reserved"--}}
                                   {{--onblur="this.value=Math.abs(this.value);" required></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td colspan="6">--}}
                            {{--<button class="btn btn-success" style="width:100%;"--}}
                                    {{--onclick="--}}
                                    {{--this.preventDefault();--}}
                                    {{--if(this.has(reservation_from_hour)){alert('danger 0');}--}}
                                    {{--">Add reservation</button>--}}
                    {{--</tr>--}}
                    {{--</td>--}}

                {{--</table>--}}

            {{--</form>--}}

            {{--<script type="text/javascript" src="js/jquery-2.1.1.js"></script>--}}
            {{--<script>--}}
                {{--$(function () {--}}
                    {{--$([document.documentElement, document.body]).animate({--}}
                        {{--scrollTop: $("#goto").offset().top - 180--}}
                    {{--}, 1000);--}}
                {{--});--}}
            {{--</script>--}}

            {{-- show  reservations in table--}}
            <table class="table table-striped table-bordered" id="goto">
                <th>Reservation Space</th>
                <th>Reservation Room</th>
                <th>Reservation Client</th>
                <th>Reservation Date</th>
                <th>Reservation From</th>
                <th>Reservation To</th>
                <th>Number Of Chairs Reserved</th>
                <th>Edit</th>
                <th>Delete</th>
                @foreach($reservations as $reservation)
                    <tr>
                        <td >{{$reservation->space->space_name}}</td>
                        <td >{{$reservation->room->room_name}}</td>
                        <td >{{$reservation->user->name}}</td>
                        <td>{{$reservation->reservation_date}}</td>
                        <td>{{$reservation->reservation_from_hour}}</td>
                        <td>{{$reservation->reservation_to_hour}}</td>
                        <td>{{$reservation->number_of_chairs_reserved}}</td>

                        <td>
                            <button class="btn btn-info"
                                    data-toggle="modal" data-target="#editModal"
                                    onclick="window.location='{{URL::route('editReservation',$reservation->reservation_id)}}'"
                            >Edit
                            </button>
                        </td>

                        <td><a class="btn btn-danger"
                               data-toggle="modal" data-target="#dangerDeleteModal{{$reservation->reservation_id}}"
                            >Delete</a></td>
                    </tr>





                    <!-- Modal for DELETE-->
                    <div class="modal fade" id="dangerDeleteModal{{$reservation->reservation_id}}" tabindex="-1"
                         role="dialog"
                         aria-labelledby="myModalLabel{{$reservation->reservation_id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>

                                    <h4 class="modal-title" id="myModalLabel{{$reservation->reservation_id}}"><span
                                            style="color: #d53209">Danger!</span></h4>
                                </div>
                                <div class="modal-body">

                                    <h4>Are you sure you want to <span style="color: #d53209">delete</span> this
                                        reservation ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger"
                                            onclick="window.location='{{URL::route('deleteReservation',$reservation->reservation_id)}}'"
                                    > Yes, Delete it!
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>







                @endforeach
            </table>


            <!-- The Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                 aria-labelledby="myEditModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                            <h4 class="modal-title" id="myEditModalLabel"><span
                                    style="color: #d53209">Edit reservation Info</span></h4>

                        </div>
                        <div class="modal-body">
                            <p>aloooooo</p>


                            {{--INSERT TABLE In Edit Modal--}}
                            {{--   INSERT  a reservation--}}
                            {{--<form action="{{route('updatereservation')}}" method="post">--}}
                            <form>
                                @csrf
                                <table class="table table-striped table-bordered">
                                    <th>Reservation Name</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Reservation Mobile</th>
                                    <th>Reservation Type</th>
                                    <tr>
                                        <td><input type="text" class="form-control" name="name" required>
                                        </td>
                                        <td><input type="passwrod" class="form-control" name="password" required>
                                        </td>
                                        <td><input type="text" class="form-control" style="width: 100px;" name="email"
                                                   required>

                                        <td><input type="text" class="form-control" name="reservation_mobile" required>
                                        </td>

                                        <td><input type="number" min="1" class="form-control" value="3"
                                                   name="reservation_type" required></td>
                                    </tr>

                                </table>
                            </form>
                        </div>
                        {{--end of edit modal body--}}


                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger"
                                    onclick="window.location='{{URL::route('updateReservation',$reservation->reservation_id)}}'"
                            > Update !
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{--end of insert table in Modal--}}

        </div>

    </section>
@endsection
