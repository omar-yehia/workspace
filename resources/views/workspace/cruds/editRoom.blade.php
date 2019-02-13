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



            <form action="{{route('updateRoom')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <th>Space Name</th>
                    <th>Room Name</th>
                    <th>Availabe Chair</th>
                    <th>Chair price/hour </th>
                    <th>Room Image</th>
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
                            <button class="btn btn-success" style="width:100%;">Update Room
                            </button>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </section>
@endsection
