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









            {{--   INSERT  a user--}}
            <form action="{{route('insertUser')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <table class="table table-striped table-bordered">
                    <th>User Name</th>
                    <th>User Password</th>
                    <th>User Email</th>
                    <th>User Mobile</th>
                    <th>User Type</th>
                    <tr>
                        <input type="hidden" class="form-control" name="user_id" hidden>

                        <td><input type="text" class="form-control" name="name" placeholder="ex: name99" required></td>
                        <td><input type="password" class="form-control" name="password" placeholder="minimum length = 6" required></td>
                        <td><input type="text" class="form-control" style="width: 100px;" name="email"
                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                   placeholder="ex: abc@example.com"
                                   required>

                        <td><input type="text" class="form-control" name="user_mobile"
                                   pattern="(01)[0-9]{9}" placeholder="ex: 01xxxxxxxxx"
                                   required></td>
                        {{--oninvalid="this.setCustomValidity('Please enter a correct mobile, 11 number ,starting with 01.')"--}}
                        <td><input type="number" min="1" class="form-control"
                                   min="1" max="3"
                                   oninput="
                                   this.value=Math.abs(this.value);
                                   if(this.value>3){this.value =3};"
                                   name="user_type" value="3" required>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <button class="btn btn-success" style="width:100%;">Add user</button>
                    </tr>
                    </td>

                </table>

            </form>


            {{-- show  users in table--}}
                {{ $users->links() }}
            <table class="table table-striped table-bordered">
                <th>User Name</th>
                {{--<th>User Password</th>--}}
                <th>User Email</th>
                <th>User Mobile</th>
                <th>User Type</th>
                <th>Edit</th>
                <th>Delete</th>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        {{--<td>{{$user->password}}</td>--}}
                        <td>{{$user->email}}</td>
                        <td>{{$user->user_mobile}}</td>
                        <td>{{$user->user_type}}</td>

                        <td>
                            <button class="btn btn-info"
                                    data-toggle="modal" data-target="#editModal"
                                    onclick="window.location='{{URL::route('editUser',$user->user_id)}}'"
                            >Edit
                            </button>
                        </td>

                        <td><a class="btn btn-danger"
                               data-toggle="modal" data-target="#dangerDeleteModal{{$user->user_id}}"
                            >Delete</a></td>
                    </tr>





                    <!-- Modal for DELETE-->
                    <div class="modal fade" id="dangerDeleteModal{{$user->user_id}}" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel{{$user->user_id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>

                                    <h4 class="modal-title" id="myModalLabel{{$user->user_id}}"><span
                                            style="color: #d53209">Danger!</span></h4>
                                </div>
                                <div class="modal-body">

                                    <h4>Are you sure you want to <span style="color: #d53209">delete</span> this user:
                                        <span style="color: #4a92d5">{{$user->user_name}}</span> ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger"
                                            onclick="window.location='{{URL::route('deleteUser',$user->user_id)}}'"
                                    > Yes, Delete it!
                                    </button>
                                </div>
                            </div>m
                        </div>
                    </div>





















                @endforeach
            </table>

            <!-- The Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                 aria-labelledby="myEditModalLabel" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                            <h4 class="modal-title" id="myEditModalLabel"><span
                                    style="color: #d53209">Edit user Info</span></h4>

                        </div>
                        <div class="modal-body">
                            <p>aloooooo</p>














                            {{--INSERT TABLE In Edit Modal--}}
                            {{--   INSERT  a user--}}
                            {{--<form action="{{route('updateuser')}}" method="post">--}}
                            <form>
                                @csrf
                                <table class="table table-striped table-bordered">
                                    <th>User Name</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>User Mobile</th>
                                    <th>User Type</th>
                                    <tr>
                                        <td><input type="text" class="form-control" name="name" required>
                                        </td>
                                        <td><input type="passwrod" class="form-control" name="password" required>
                                        </td>
                                        <td><input type="text" class="form-control" style="width: 100px;" name="email" required>

                                        <td><input type="text" class="form-control" name="user_mobile" required></td>

                                        <td><input type="number" min="1" class="form-control" value="3" name="user_type" required></td>
                                    </tr>

                                </table>
                            </form>
                        </div>
                        {{--end of edit modal body--}}


                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger"
                                    onclick="window.location='{{URL::route('updateUser',$user->user_id)}}'"
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
