@extends('workspace.layouts.master')

@section('pageContent')
    <section class="box-content box-1 box-style-1">
        <div class="container">


            <!-- Ajax code -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


            <script type="application/javascript">
                $(document).ready(function () {
                    $('#txtSearch').on('keyup', function () {
                        var text = $('#txtSearch').val();

                        $.ajax({

                            type: "GET",
                            url: '/searchTest',
                            data: {text: $('#txtSearch').val()},
                            success: function (data) {
                                console.log(data);
                            }
                        });

                    });

                });
            </script>

            <div style="margin-top:70px;"></div>

{{--            @include('partials._side')--}}

            <div class="container">
                <form method="get" action="">

                    <div class="input-group stylish-input-group">
                        <input type="text" id="txtSearch" name="txtSearch" class="form-control" placeholder="Search...">
                        <span class="input-group-addon">
                            <button type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>

                </form>

                <div id="result"></div>

            </div>


        </div>
    </section>
@endsection
