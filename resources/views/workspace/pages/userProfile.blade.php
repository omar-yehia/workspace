@extends('workspace.layouts.master')

@section('pageContent')
    <section class="box-content box-1 box-style-1">
        <div class="container">

            @if(session('deleted'))
                <div class="alert alert-danger">
                    <strong>{{session('deleted')}}</strong> Successfully.
                </div>
            @endif
            
            <p>My Reservations</p>

            {{--@foreach($userReservations as $userReservation)--}}
                {{--{{$userReservation}}--}}
            {{--@endforeach--}}

            <table class="table table-striped table-bordered">
                <th>Reservation Space</th>
                <th>Reservation Room</th>
                <th>Reservation Client</th>
                <th>Reservation Date</th>
                <th>Reservation From</th>
                <th>Reservation To</th>
                <th>Number Of Chairs Reserved</th>
                <th>Edit</th>
                <th>Delete</th>
                @foreach($userReservations as $userReservation)
                    <tr>
                        <td hidden>{{$userReservation->reservation_id}}</td>
                        <td >{{$userReservation->space->space_name}}</td>
                        <td >{{$userReservation->room->room_name}}</td>
                        <td >{{Auth::user()->name}}</td>
                        <td>{{$userReservation->reservation_date}}</td>
                        <td>{{$userReservation->reservation_from_hour}}</td>
                        <td>{{$userReservation->reservation_to_hour}}</td>
                        <td>{{$userReservation->number_of_chairs_reserved}}</td>

                        <td>
                            <button class="btn btn-info"
                                    data-toggle="modal" data-target="#editModal"
                                    onclick="window.location='{{URL::route('editReservation',$userReservation->reservation_id)}}'"
                            >Edit
                            </button>
                        </td>

                        <td><a class="btn btn-danger"
                               data-toggle="modal" data-target="#dangerDeleteModal{{$userReservation->reservation_id}}"
                            >Delete</a></td>
                    </tr>





                    <!-- Modal for DELETE-->
                    <div class="modal fade" id="dangerDeleteModal{{$userReservation->reservation_id}}" tabindex="-1"
                         role="dialog"
                         aria-labelledby="myModalLabel{{$userReservation->reservation_id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>

                                    <h4 class="modal-title" id="myModalLabel{{$userReservation->reservation_id}}"><span
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
                                            onclick="window.location='{{URL::route('deleteReservation',$userReservation->reservation_id)}}'"
                                    > Yes, Delete it!
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach
            </table>


        </div>
    </section>
@endsection
