@extends('workspace.layouts.master')


{{--


--}}


@section('pageContent')
    <section class="box-content box-1 box-style-1" id="content">
        <div class="container">

            @if(session('deleted'))
                <div class="alert alert-danger">
                    <strong>{{session('deleted')}}</strong> Successfully.
                </div>
            @endif



            {{-- CATCHING ERRORS--}}
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach

            @endif


            {{--   INSERT  a room--}}
            <form action="{{route('insertRoom')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <table class="table table-striped table-bordered">
                    <th>Space Name</th>
                    <th>Room Name</th>
                    <th>Availabe Chairs</th>
                    <th>Chair price/hour</th>
                    <th>Room Image</th>
                    <tr>
                        <input type="hidden" class="form-control" name="room_id" required>

                        <td><input type="text" class="form-control" name="space_name" required></td>
                        <td><input type="text" class="form-control" name="room_name" required></td>

                        <td><input type="number" class="form-control" name="available_chairs"
                                   min="1" max="100"
                                   oninput="this.value=Math.abs(this.value);" required></td>

                        <td><input type="number" class="form-control" name="chair_price_per_hour"
                                   placeholder="Price In EGP"
                                   min="1"
                                   oninput="this.value=Math.abs(this.value);" required></td>

                        <td><input type="file" class="form-control" name="room_image_path" required></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <button class="btn btn-success" style="width:100%;">Add room</button>
                    </tr>
                    </td>

                </table>

            </form>


            {{-- show  rooms in table--}}
            <table class="table table-striped table-bordered">
                <th>Space Name</th>
                <th>Room Name</th>
                <th>Availabe Chair</th>
                <th>Chair price/hour</th>
                <th>Room Image</th>
                <th>Edit</th>
                <th>Delete</th>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{$room->space->space_name}}</td>
                        <td>{{$room->room_name}}</td>
                        <td>{{$room->available_chairs}}</td>
                        <td>{{$room->chair_price_per_hour}}</td>
                        <td>{{$room->room_image_path}}</td>

                        <td>
                            <button class="btn btn-info"
                                    data-toggle="modal" data-target="#editModal"
                                    onclick="window.location='{{URL::route('editRoom',$room->room_id)}}'"
                            >Edit
                            </button>
                        </td>

                        <td><a class="btn btn-danger"
                               data-toggle="modal" data-target="#dangerDeleteModal{{$room->room_id}}"
                            >Delete</a></td>
                    </tr>





                    <!-- Modal for DELETE-->
                    <div class="modal fade" id="dangerDeleteModal{{$room->room_id}}" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel{{$room->room_id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>

                                    <h4 class="modal-title" id="myModalLabel{{$room->room_id}}"><span
                                            style="color: #d53209">Danger!</span></h4>
                                </div>
                                <div class="modal-body">

                                    <h4>Are you sure you want to <span style="color: #d53209">delete</span> this room:
                                        <span style="color: #4a92d5">{{$room->room_name}}</span> ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger"
                                            onclick="window.location='{{URL::route('deleteRoom',$room->room_id)}}'"
                                    > Yes, Delete it!
                                    </button>
                                </div>
                            </div>
                            m
                        </div>
                    </div>


                @endforeach
            </table>


        </div>

    </section>



@endsection
