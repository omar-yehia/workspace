@extends('workspace.layouts.master')

@section('pageContent')

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach

    @endif

    <section class="box-content box-login box-style-login">
        <div class="container">

            {{$spacesInGovernorate}}
        </div>
    </section>
@endsection
