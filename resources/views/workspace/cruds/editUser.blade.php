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



            <form action="{{route('updateUser')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <th>User Name</th>
                    <th>User Password</th>
                    <th>User Email</th>
                    <th>User Mobile</th>
                    <th>User Type</th>
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
                            <button class="btn btn-success" style="width:100%;">Update User
                            </button>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </section>
@endsection
