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


            {{--   INSERT  a space--}}
            <form action="{{route('insertSpace')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <th>Space Name</th>
                    <th>Space Owner Name</th>
                    <th>Space City</th>
                    <th>Space Address</th>
                    <th>Number Of Rooms</th>
                    <th>Image Path</th>
                    <tr>
                        <input type="hidden" class="form-control" name="space_id" hidden>

                        <td><input type="text" class="form-control" name="space_name" required></td>
                        <input type="hidden" class="form-control" name="space_owner_name" value="{{Auth::user()->name}}" hidden>
                        <td>{{Auth::user()->name}}</td>

                        <td><select class="form-control" style="width: 100px;" name="space_city" required>
                                @foreach($governoratesList as $governorate)
                                    <option>{{$governorate}}</option>
                                @endforeach
                            </select></td>

                        <td><input type="text" class="form-control" name="space_address" required></td>

                        <td><input type="number" min="1" max="100"
                                   oninput="
                                   this.value=Math.abs(this.value);
                                   if(this.value>100){this.value =100};"

                                   class="form-control" name="space_number_of_rooms" required>
                        </td>
                        <td><input type="file" class="form-control-file form-control" name="space_image_path" required></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <button class="btn btn-success" style="width:100%;">Add Space</button>
                    </tr>
                    </td>

                </table>
                {{--<button class="btn btn-success" style="width:100%;">Add Space</button>--}}
            </form>




            {{-- show  spaces in table--}}
            <table class="table table-striped table-bordered">
                <th>Space Name</th>
                <th>Space Owner</th>
                <th>Space City</th>
                <th>Space Address</th>
                <th>Number Of Rooms</th>
                <th>Image Path</th>
                <th>Edit</th>
                <th>Delete</th>
                @foreach($spaces as $space)
                    <tr>
                        <td>{{$space->space_name}}</td>
                        <td>{{$space->user->name}}</td>
                        <td>{{$space->space_city}}</td>
                        <td>{{$space->space_address}}</td>
                        <td>{{$space->space_number_of_rooms}}</td>
                        <td>{{$space->space_image_path}}</td>

                        {{--<td><a class="btn btn-info" href="{{URL::route('editSpace',$space->space_id)}}">Edit</a></td>--}}
                        <td>
                            <button class="btn btn-info"
                                    data-toggle="modal" data-target="#editModal"
                                    onclick="window.location='{{URL::route('editSpace',$space->space_id)}}'"
                            >Edit
                            </button>
                        </td>

                        <td><a class="btn btn-danger"
                               data-toggle="modal" data-target="#dangerDeleteModal{{$space->space_id}}"
                            >Delete</a></td>
                    </tr>





                    <!-- Modal for DELETE-->
                    <div class="modal fade" id="dangerDeleteModal{{$space->space_id}}" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel{{$space->space_id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>

                                    <h4 class="modal-title" id="myModalLabel{{$space->space_id}}"><span
                                                style="color: #d53209">Danger!</span></h4>
                                </div>
                                <div class="modal-body">

                                    <h4>Are you sure you want to <span style="color: #d53209">delete</span> this space:
                                        <span style="color: #4a92d5">{{$space->space_name}}</span> ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger"
                                            onclick="window.location='{{URL::route('deleteSpace',$space->space_id)}}'"
                                    > Yes, Delete it!
                                    </button>
                                </div>
                            </div>m
                        </div>
                    </div>









                @endforeach
            </table>

            {{--<!-- The Edit Modal -->--}}
            {{--<div class="modal fade" id="editModal" tabindex="-1" role="dialog"--}}
                 {{--aria-labelledby="myEditModalLabel" >--}}
                {{--<div class="modal-dialog" role="document">--}}
                    {{--<div class="modal-content">--}}
                        {{--<div class="modal-header">--}}
                            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span--}}
                                        {{--aria-hidden="true">&times;</span></button>--}}

                            {{--<h4 class="modal-title" id="myEditModalLabel"><span--}}
                                        {{--style="color: #d53209">Edit Space Info</span></h4>--}}

                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                            {{--<p>aloooooo</p>--}}



                            {{--INSERT TABLE In Edit Modal--}}
                            {{--   INSERT  a space--}}
                            {{--<form action="{{route('updateSpace')}}" method="post">--}}
                            {{--<form>--}}
                                {{--@csrf--}}
                                {{--<table class="table table-striped table-bordered">--}}
                                    {{--<th>Space Name</th>--}}
                                    {{--<th>Space Owner</th>--}}
                                    {{--<th>Space City</th>--}}
                                    {{--<th>Space Address</th>--}}
                                    {{--<th>Number Of Rooms</th>--}}
                                    {{--<th>Image Path</th>--}}
                                    {{--<tr>--}}
                                        {{--<td><input type="text" class="form-control" name="space_name" required>--}}
                                        {{--</td>--}}
                                        {{--<td><input type="text" class="form-control" name="space_owner" required>--}}
                                        {{--</td>--}}
                                        {{--<td><select class="form-control" style="width: 100px;" name="space_city"--}}
                                                    {{--required>--}}

                                                {{--@foreach($governoratesList as $governorate)--}}
                                                    {{--<option>{{$governorate}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select></td>--}}
                                        {{--<td><input type="text" class="form-control" name="space_address"--}}
                                                   {{--required></td>--}}
                                        {{--<td><input type="number" min="1" class="form-control"--}}
                                                   {{--name="space_number_of_rooms" required></td>--}}
                                        {{--<td><input type="file" class="form-control-file form-control" name="space_image_path" required></td>--}}
                                    {{--</tr>--}}
                                  {{----}}

                                {{--</table>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--end of edit modal body--}}


                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>--}}
                            {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                            {{--<button type="button" class="btn btn-danger"--}}
                                    {{--onclick="window.location='{{URL::route('updateSpace',$space->space_id)}}'"--}}
                            {{--> Update !--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--end of insert table in Modal--}}






        </div>

    </section>



@endsection







{{--testing the edit modal again with table in foreach :( --}}
{{--<div class="modal fade " id="editModal{{$space->space_id}}" tabindex="-1" role="dialog"--}}
{{--aria-labelledby="myEditModalLabel{{$space->space_id}}">--}}
{{--<div class="modal-dialog" role="document">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-label="Close{{$space->space_id}}"><span--}}
{{--aria-hidden="true">&times;</span></button>--}}

{{--<h4 class="modal-title" id="myEditModalLabel{{$space->space_id}}"><span--}}
{{--style="color: #d53209">Edit Space Info</span></h4>--}}

{{--</div>--}}
{{--<div class="modal-body">--}}
{{--<p>aloooooo</p>--}}


{{--INSERT TABLE In Edit Modal--}}
{{--   INSERT  a space--}}
{{--<form action="{{route('updateSpace')}}" method="post">--}}
{{--<form>--}}
{{--@csrf--}}
{{--<table class="table table-striped table-bordered">--}}
{{--<th>Space Name</th>--}}
{{--<th>Space Owner</th>--}}
{{--<th>Space City</th>--}}
{{--<th>Space Address</th>--}}
{{--<th>Number Of Rooms</th>--}}
{{--<th>Image Path</th>--}}
{{--<tr>--}}
{{--<td><input type="text" class="form-control" name="space_name" required>--}}
{{--</td>--}}
{{--<td><input type="text" class="form-control" name="space_owner" required>--}}
{{--</td>--}}
{{--<td><select class="form-control" style="width: 100px;" name="space_city"--}}
{{--required>--}}

{{--@foreach($governoratesList as $governorate)--}}
{{--<option>{{$governorate}}</option>--}}
{{--@endforeach--}}
{{--</select></td>--}}
{{--<td><input type="text" class="form-control" name="space_address"--}}
{{--required></td>--}}
{{--<td><input type="number" min="1" class="form-control"--}}
{{--name="space_number_of_rooms" required></td>--}}
{{--<td><input type="text" class="form-control" name="space_image_path"--}}
{{--required></td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td colspan="6">--}}
{{--<button class="btn btn-success" style="width:100%;">Add Space--}}
{{--</button>--}}
{{--</tr>--}}
{{--</td>--}}

{{--</table>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--end of edit modal body--}}











{{--<div class="container">--}}
{{--<h2>Modal Example</h2>--}}
{{--<!-- Trigger the modal with a button -->--}}
{{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open--}}
{{--Modal--}}
{{--</button>--}}

{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="myModal" role="dialog">--}}
{{--<div class="modal-dialog">--}}

{{--<!-- Modal content-->--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--<h4 class="modal-title">Modal Header</h4>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--<table class='table table-bordered'>--}}
{{--<th>hello th</th>--}}
{{--<tr>--}}
{{--<td>hello td</td>--}}
{{--</tr>--}}
{{--</table>--}}
{{--<p>Some text in the modal.</p>--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
