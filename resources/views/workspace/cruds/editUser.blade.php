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
                    <h4>Edit User</h4>
                    <br><br>
                </div>
            </div>



            <form action="{{route('updateUser')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <thead style="font-size: 13.5px;text-align: center; font-weight: bolder;background-color:burlywood;">
                    <th>User Name</th>
                    <th>User Password</th>
                    <th>User Email</th>
                    <th>User Mobile</th>
                    <th>User Type</th>
                    </thead>
                    <tbody>
                    <tr>
                        <input type="hidden" class="form-control" name="user_id"
                               value="{{$user->user_id}}" hidden>
                        <td><input type="text" class="form-control" name="name"
                                   value="{{$user->name}}" required></td>

                        <td><input type="password" class="form-control" name="password"
                                   value="{{$user->password}}" required></td>

                        <td><input type="text" class="form-control" style="width: 100px;" name="email"
                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                   placeholder="ex: abc@example.com"
                                   value="{{$user->email}}" required>

                        <td><input type="text" class="form-control" name="user_mobile"
                                   value="{{$user->user_mobile}}"
                                   pattern="(01)[0-9]{9}" placeholder="ex: 01xxxxxxxxx" required></td>

                        <td><input type="number" min="1" class="form-control" name="user_type"
                                   min="1" max="3"
                                   oninput="
                                   this.value=Math.abs(this.value);
                                   if(this.value>3){this.value =3};"
                                   value="{{$user->user_type}}" required>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <button class="btn btn-success"  style="width:100%; background-color: orangered;height: 35px;font-size: 16px;border: none ">Update User
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </section>
@endsection
