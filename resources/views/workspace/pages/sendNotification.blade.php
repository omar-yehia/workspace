@extends('workspace.layouts.master')
<br><br><br>
@section('pageContent')



    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach

    @endif


    <section class="box-content box-login box-style-login" id="reserveSpace">
        <div class="container">

            @if(session('message'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{session('message')}}.
                </div>
            @endif


            <form method="post" action="{{route('testNotification')}}">
                @csrf
                <input type="text" name="testNotificationText">
                <input type="submit">
            </form>

        </div>


        </div>
    </section>
@endsection
