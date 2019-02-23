@extends('workspace.layouts.master')
@section('pageContent')
    <section class="box-content  box-login box-style-login  editReservation">
        <div class="container">


            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach

            @endif



            <div class="row heading subheading">
                <div class="col-lg-12 wow fadeInLeft titleText" data-wow-delay="400ms">
                    <h4>Edit WorkSpace</h4>
                    <br><br>
                </div>
            </div>




            <form action="{{route('updateSpace')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <thead style="font-size: 13.5px;text-align: center; font-weight: bolder;background-color:burlywood;">
                    <th>Space Name</th>
                    <th>Space Owner Name</th>
                    <th>Space City</th>
                    <th>Space Address</th>
                    <th>Number Of Rooms</th>
                    <th>Image Path</th>
                    </thead>
                    <tbody>
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
                                    <option {{ $governorate == $space->space_city? ' selected' : '' }}>{{$governorate}}</option>
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

                        <td><input type="file" class="form-control" name="space_image_path"
                                   value="{{$space->space_image_path}}"
                                   required></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <button class="btn btn-success"  style="width:100%; background-color: orangered;height: 35px;font-size: 16px;border: none ">Update Space
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </section>
@endsection
