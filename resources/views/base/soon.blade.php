@extends('main')
@section('css')
<style>
.parallax {

    /* Set a specific height */
    height: 720px;

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
</style>
@stop
@section('content')

<div class="container-fluid">
    <div class="parallax row align-items-center opening" style="background-image: url('img/bg7.jpg')">
        <div style="position: absolute;left: 0;top: 0;height: 100%;width: 100%" class="bg-trans-gray">

        </div>
        <div class="col">
            <p class="display-4 text-center text-white w-100">
                We travel not to escape life, but for life not to escape us.
            </p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row align-items-center" style="min-height: 300px;">

        <div class="col">
            <p class="display-4 text-center w-100">
                Pack your bags, get ready to go
            </p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="parallax row align-items-center opening" style="background-image: url('img/bg5.jpeg')">
        <div style="position: absolute;left: 0;top: 0;height: 100%;width: 100%" class="bg-trans-gray">

        </div>
        <div class="col">
            <p class="display-4 text-center text-white w-100">
                A new Adventure is waiting
            </p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row align-items-center" style="min-height: 300px;">

        <div class="col">
            <p class="display-4 text-center w-100">
                Coming Soon <br/>
                {{--<small>See us again next time</small>--}}
            </p>
        </div>
    </div>
</div>
{{--<div class="container-fluid">--}}
    {{--<div class="row text-white" id="tours">--}}

        {{--<div class="col-md-3 col-6 row tourbox align-items-center">--}}
                {{--<div class="col">--}}
                    {{--<p class="display-4 text-center">Philippines</p>--}}
                    {{--<a class="btn btn-lg btn-outline-secondary text-white text-center" href=""><h3>View Tours</h3></a>--}}
                {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3 col-6 row tourbox align-items-center">--}}
            {{--<div class="col">--}}
                {{--<p class="display-4 text-center">Korea</p>--}}
                {{--<a class="btn btn-lg btn-outline-secondary text-white text-center" href=""><h3>View Tours</h3></a>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3 col-6 row tourbox align-items-center">--}}
            {{--<div class="col">--}}
                {{--<p class="display-4 text-center">Australia</p>--}}
                {{--<a class="btn btn-lg btn-outline-secondary text-white text-center" href=""><h3>View Tours</h3></a>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3 col-6 row tourbox align-items-center">--}}
            {{--<div class="col">--}}
                {{--<p class="display-4 text-center">Singapore</p>--}}
                {{--<a class="btn btn-lg btn-outline-secondary text-white text-center" href=""><h3>View Tours</h3></a>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<!--NEXT LINE-->--}}



        {{--<div class="col-md-3 col-6 row tourbox align-items-center">--}}
            {{--<div class="col">--}}
                {{--<p class="display-4 text-center">Taiwan</p>--}}
                {{--<a class="btn btn-lg btn-outline-secondary text-white text-center" href=""><h3>View Tours</h3></a>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3 col-6 row tourbox align-items-center">--}}
            {{--<div class="col">--}}
                {{--<p class="display-4 text-center">Thailand</p>--}}
                {{--<a class="btn btn-lg btn-outline-secondary text-white text-center" href=""><h3>View Tours</h3></a>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3 col-6 row tourbox align-items-center">--}}
            {{--<div class="col">--}}
                {{--<p class="display-4 text-center">Europe</p>--}}
                {{--<a class="btn btn-lg btn-outline-secondary text-white text-center" href=""><h3>View Tours</h3></a>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3 col-6 row tourbox align-items-center">--}}
            {{--<div class="col">--}}
                {{--<p class="display-4 text-center">Malaysia</p>--}}
                {{--<a class="btn btn-lg btn-outline-secondary text-white text-center" href=""><h3>View Tours</h3></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--</div>--}}
@stop