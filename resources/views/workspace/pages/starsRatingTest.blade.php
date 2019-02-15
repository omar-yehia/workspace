@extends('workspace.layouts.master')

@section('pageContent')
    <section class="box-content box-1 box-style-1">
        <div class="container">

            {{--STYLES FOR THE STAR RATING ELEMENTS--}}
            <style>
                @font-face {
                    font-family: 'Material Icons';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Material Icons'), local('MaterialIcons-Regular'), url(https://fonts.gstatic.com/s/materialicons/v7/2fcrYFNaTjcS6g4U3t-Y5UEw0lE80llgEseQY3FEmqw.woff2) format('woff2'), url(https://fonts.gstatic.com/s/materialicons/v7/2fcrYFNaTjcS6g4U3t-Y5RV6cRhDpPC5P4GCEJpqGoc.woff) format('woff');
                }
                .material-icons {
                    font-family: 'Material Icons';
                    font-weight: normal;
                    font-style: normal;
                    font-size: 30px;
                    line-height: 1;
                    letter-spacing: normal;
                    text-transform: none;
                    display: inline-block;
                    word-wrap: normal;
                    -moz-font-feature-settings: 'liga';
                    -moz-osx-font-smoothing: grayscale;
                }
                i {
                    cursor :  pointer;
                }
            </style>


            <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
            {{--<script src="js/jquery.star.rating.js"></script>--}}

            <h3 style="color: #00abff;font-style:italic;">Space Rating</h3>
            <div class="ratingClass"style="color: #ebac34;"></div>
            {{--<div class="ratingClass"style="color: #eb563f;"></div>--}}

            <script>
                $(document).ready(function(){
                    $('.ratingClass').addRating({'icon':'star','selectedRatings':'5','max':'6'});
                    $('#rating').val('5');
                })
            </script>


            {{--<button class="btn btn-info" onclick="--}}
                    {{--console.log($('#rating').val());">Show rating</button>--}}
        </div>
    </section>
@endsection
