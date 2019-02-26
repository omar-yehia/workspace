@extends('workspace.layouts.master')

@section('pageContent')
    <section class="box-content box-login box-style-login">
        <div class="container">


            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach

            @endif


                <head>
                    <title>Pusher Test</title>
                    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
                    <script>

                        // Enable pusher logging - don't include this in production
                        Pusher.logToConsole = true;

                        var pusher = new Pusher('3cd7de2511ba82fa2f98', {
                            cluster: 'eu',
                            forceTLS: true
                        });

                        var channel = pusher.subscribe('my-channel');
                        channel.bind('my-event', function(data) {
                            alert(JSON.stringify(data));
                        });
                    </script>
                </head>
                <body>
                <h1>Pusher Test</h1>
                <p>
                    Try publishing an event to channel <code>my-channel</code>
                    with event name <code>my-event</code>.
                </p>
                </body>


        </div>
    </section>
@endsection
