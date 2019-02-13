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


            <form action="{{route('updateSpace')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <th>Space Name</th>
                    <th>Space Owner Name</th>
                    <th>Space City</th>
                    <th>Space Address</th>
                    <th>Number Of Rooms</th>
                    <th>Image Path</th>
                    <tr>
                        <input type="hidden" class="form-control" name="space_id"
                               value="{{$space->space_id}}" hidden>

                        <td><input type="text" class="form-control" name="space_name"
                                   value="{{$space->space_name}}" required>
                        </td>

                        <input type="hidden" class="form-control" name="space_owner_name"
                                   value="{{$space->user->name}}" hidden>

                        <td>{{$space->user->name}}</td>

                        <td><select class="form-control" style="width: 100px;" name="space_city"
                                    value="{{$space->space_city}}" required>

                                @foreach($governoratesList as $governorate)
                                    <option>{{$governorate}}</option>
                                @endforeach

                            </select></td>
                        <td><input type="text" class="form-control" name="space_address"
                                   value="{{$space->space_address}}"
                                   required></td>

                        <td><input type="number" min="1" class="form-control"
                                   name="space_number_of_rooms"
                                   min="1" max="100"
                                   oninput="
                                   this.value=Math.abs(this.value);
                                   if(this.value>100){this.value =100};"

                                   value="{{$space->space_number_of_rooms}}" required></td>

                        <td><input type="text" class="form-control" name="space_image_path"
                                   value="{{$space->space_image_path}}"
                                   required></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <button class="btn btn-success" style="width:100%;">Update Space
                            </button>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </section>
@endsection
