@extends('workspace.layouts.master')

@section('pageContent')
    <section class="box-content box-login box-style-login" id="roomCrud">
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


            @if(session('spaceAdded'))
                <div class="alert alert-success">
                    <strong>{{session('spaceAdded')}}</strong> Successfully.
                </div>

            @else()
                <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
                <script>
                    $(function () {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#goto").offset().top - 180
                        }, 1000);
                    });
                </script>
            @endif

            {{--<div class="row heading subheading">--}}
            {{--<div class="col-lg-12 wow fadeInLeft titleText" data-wow-delay="400ms">--}}
            {{--<h4>Welcome To Our Creative WorkSpace</h4>--}}
            {{--<br><br>--}}
            {{--</div>--}}
            {{--</div>--}}



            {{--GO TO SECTION -- NO NEED TO SCROLL --}}


            <div class="row heading subheading">
                <div class="col-lg-12 wow fadeInLeft titleText" data-wow-delay="400ms">
                    <h4 style="font-size: 45px">Add A New Room</h4>
                    <hr>
                    <br>
                </div>
            </div>


            {{--   INSERT  a room--}}
            <form action="{{route('insertRoom')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <table class="table table-striped table-bordered">
                    <thead
                        style="font-size: 13.5px;text-align: center; font-weight: bolder;background-color:burlywood;">
                    <th>Space Name</th>
                    <th>Room Name</th>
                    <th>Availabe Chairs</th>
                    <th>Chair price/hour</th>
                    <th>Room Image</th>
                    </thead>
                    <tbody>
                    <tr>
                        <input type="hidden" class="form-control" name="room_id" hidden>

                        @if(Auth::user()->user_type==1)
                            <td><input type="text" class="form-control" name="space_name" required></td>

                        @elseif(Auth::user()->user_type==2)
                            <td>
                                <select name="space_name" required>
                                    @foreach($spacesOfThisOwner as $spaceOfThisOwner )
                                        <option>{{$spaceOfThisOwner->space_name}}</option>
                                    @endforeach
                                </select>
                            </td>

                        @endif

                        <td><input type="text" class="form-control" name="room_name" required></td>

                        <td><input type="number" class="form-control" name="available_chairs"
                                   min="1" max="100"
                                   oninput="this.value=Math.abs(this.value);" required></td>

                        <td><input type="number" class="form-control" name="chair_price_per_hour"
                                   placeholder="Price In EGP"
                                   min="1"
                                   oninput="this.value=Math.abs(this.value);" required></td>

                        <td><input type="file" class="form-control" name="room_image_path"></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <button class="btn btn-success"
                                    style="width:100%; background-color: orangered;height: 35px;font-size: 16px;border: none ">
                                Add room
                            </button>
                    </tr>
                    </td>
                    </tbody>

                </table>

            </form>
            <br><br>


            {{--<div ><br><br><br><br><br><br><br></div>--}}

            @if(Auth::user()->user_type==1)
                {{ $rooms->links() }}
            @endif

            {{--DISABLED IT BECAUSE THE RETURNED IS AN ARRAY NOT A COLLECTION??? --}}

            {{-- show  rooms in table--}}
            <table class="table table-striped table-bordered  insertedRoom" id="goto">

                <thead style="font-size: 13.5px;text-align: center; font-weight: bolder;background-color:burlywood;">
                <th>Space Name</th>
                <th>Room Name</th>
                <th>Availabe Chair</th>
                <th>Chair price/hour</th>
                <th>Room Image</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                @foreach($rooms as $room)
                    <tbody>
                    <tr>
                        <td>{{$room->space->space_name}}</td>
                        <td>{{$room->room_name}}</td>
                        <td>{{$room->available_chairs}}</td>
                        <td>{{$room->chair_price_per_hour}}</td>
                        {{--<td>{{$room->room_image_path}}</td>--}}
                        <td><img src="images/{{$room->room_image_path}}" style="max-width: 100px; max-height: 100px;"></td>
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

                                    <h5>Are you sure you want to <span style="color: #d53209">delete</span> this room:
                                        <span style="color: darkslategray">{{$room->room_name}}</span> ?</h5>
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
                        </div>
                    </div>

                    </tbody>
                @endforeach
            </table>


        </div>

    </section>



@endsection
