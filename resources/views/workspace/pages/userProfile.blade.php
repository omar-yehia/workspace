@extends('workspace.layouts.master')

@section('pageContent')
    <section class="box-content box-login box-style-login">
        <div class="container">


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


            <div class="row heading subheading">
                <div class="col-lg-12 wow fadeInLeft titleText" data-wow-delay="400ms">

                    @if(Auth::user()->user_type==3)
                        <h4 style="font-size: 45px">My Reservations</h4>

                    @elseif(Auth::user()->user_type==2)
                        <h4 style="font-size: 45px">My Clients Reservations</h4>

                    @endif
                    <hr>
                    <br>
                </div>
            </div>


            {{--@foreach($userReservations as $userReservation)--}}
            {{--{{$userReservation}}--}}
            {{--@endforeach--}}

            @if(isset($userReservations) && !$userReservations->isEmpty())
                <table class="table table-striped table-bordered table-hover">
                    <thead
                        style="font-size: 13.5px;text-align: center; font-weight: bolder;background-color:burlywood;">
                    <th>Reservation Space</th>
                    <th>Space Image</th>
                    <th>Reservation Room</th>
                    <th>Room Image</th>
                    <th>Reservation Client</th>
                    <th>Client Image</th>
                    <th>Reservation Date</th>
                    <th>Reservation From</th>
                    <th>Reservation To</th>
                    <th>Number Of Chairs Reserved</th>
                    @if(Auth::user()->user_type==3)
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif
                    </thead>

                    @foreach($userReservations as $userReservation)
                        <tbody>
                        <tr>
                            <td hidden>{{$userReservation->reservation_id}}</td>
                            <td>{{$userReservation->space->space_name}}</td>
                            <td><img src="images/{{$userReservation->space->space_image_path}}" style="max-width: 100px; max-height: 100px;"></td>
                            <td>{{$userReservation->room->room_name}}</td>
                            <td><img src="images/{{$userReservation->room->room_image_path}}" style="max-width: 100px; max-height: 100px;"></td>
                            @if(Auth::user()->user_type==3)
                                <td>{{Auth::user()->name}}</td>
                                <td><img src="images/{{Auth::user()->user_image_path}}" style="max-width: 100px; max-height: 100px;"></td>

                            @elseif(Auth::user()->user_type==2)
                                <td>{{\App\User::find($userReservation->user_id)->name}}</td>
                                <td><img src="images/{{$userReservation->user->user_image_path}}" style="max-width: 100px; max-height: 100px;"></td>

                            @endif

                            <td>{{$userReservation->reservation_date}}</td>
                            <td>{{$userReservation->reservation_from_hour}}</td>
                            <td>{{$userReservation->reservation_to_hour}}</td>
                            <td>{{$userReservation->number_of_chairs_reserved}}</td>


                            @if(Auth::user()->user_type==3)

                                <td>
                                    <button class="btn btn-info"
                                            data-toggle="modal" data-target="#editModal"
                                            onclick="window.location='{{URL::route('editReservation',$userReservation->reservation_id)}}'"
                                    >Edit
                                    </button>
                                </td>


                                {{--@endif--}}


                                <td><a class="btn btn-danger"
                                       data-toggle="modal"
                                       data-target="#dangerDeleteModal{{$userReservation->reservation_id}}"
                                    >Delete</a></td>
                        </tr>

                        </tbody>



                        <!-- Modal for DELETE-->
                        <div class="modal fade" id="dangerDeleteModal{{$userReservation->reservation_id}}" tabindex="-1"
                             role="dialog"
                             aria-labelledby="myModalLabel{{$userReservation->reservation_id}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>

                                        <h4 class="modal-title"
                                            id="myModalLabel{{$userReservation->reservation_id}}"><span
                                                style="color: #d53209">Danger!</span></h4>
                                    </div>
                                    <div class="modal-body">

                                        <h4>Are you sure you want to <span style="color: #d53209">delete</span> this
                                            reservation ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel
                                        </button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger"
                                                onclick="window.location='{{URL::route('deleteReservation',$userReservation->reservation_id)}}'"
                                        > Yes, Delete it!
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        @endif

                    @endforeach
                </table>




            @elseif(Auth::user()->user_type==3)
                <div class="alert alert-info"><h1 style="color: #ca8820;">You Haven't made any reservations yet,<br>
                        make your <a href="{{route('home','#select')}}">first one now</a> :) </h1></div>


            @elseif(Auth::user()->user_type==2)
                <div class="alert alert-info"><h1 style="color: #ca6900;">Your first client hasn't made any reservations
                        yet :)
                        {{--<i class="fa fa-smile-o" style="color: #ee6500;"></i>--}}
                    </h1></div>

            @endif


        </div>
    </section>
@endsection
