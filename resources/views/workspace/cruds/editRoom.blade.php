@extends('workspace.layouts.master')
@section('pageContent')
    <section class="box-content box-login box-style-login  editReservation">
        <div class="container">




            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach

            @endif


            <div class="row heading subheading">
                <div class="col-lg-12 wow fadeInLeft titleText" data-wow-delay="400ms">
                    <h4>Edit Room</h4>
                    <br><br>
                </div>
            </div>




            <form action="{{route('updateRoom')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <thead style="font-size: 13.5px;text-align: center; font-weight: bolder;background-color:burlywood;">
                    <th>Space Name</th>
                    <th>Room Name</th>
                    <th>Availabe Chair</th>
                    <th>Chair price/hour </th>
                    <th>Room Image</th>
                    </thead>
                    <tbody>
                    <tr>
                        <input type="hidden" class="form-control" name="room_id"
                               value="{{$room->room_id}}" hidden>


                        <td><input type="text" class="form-control" name="space_name"
                                   value="{{$room->space->space_name}}" required></td>

                        <td><input type="text" class="form-control" name="room_name"
                                   value="{{$room->room_name}}" required></td>

                        <td><input type="number" class="form-control" name="available_chairs"
                                   min="1" max="100"
                                   oninput="this.value=Math.abs(this.value);"
                                   value="{{$room->available_chairs}}" required></td>

                        <td><input type="number" class="form-control" name="chair_price_per_hour"
                                   min="1"
                                   oninput="this.value=Math.abs(this.value);"
                                   value="{{$room->chair_price_per_hour}}" required></td>

                        <td><input type="file" class="form-control" name="room_image_path"
                                   value="{{$room->room_image_path}}" ></td>

                    </tr>
                    <tr>
                        <td colspan="6">
                            <button class="btn btn-success"  style="width:100%; background-color: orangered;height: 35px;font-size: 16px;border: none ">Update Room
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </section>
@endsection
