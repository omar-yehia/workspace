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

            {{$spacesInGovernorate}}
        </div>
    </section>
@endsection
