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
                Featured Tours <br/>
                {{--<small>See us again next time</small>--}}
            </p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row text-white" id="tours">
        @foreach($tours as $tour)
        <div class="col-md-3 col-6 row tourbox align-items-center" style="background-image:url('tours/{{ $tour->image }}')">
                <div style="position: absolute;left: 0;top: 0;height: 100%;width: 100%" class="bg-trans-gray">

                        </div>
                <div class="col">
                    <p class="lead text-center"><h4>{{ $tour->name }}</h4></p>
                    <p>{{ $tour->subname }}</p>
                    <a class="btn btn-sm btn-success text-white text-center" href="{{ URL::route('pub_tour_view', array('id' => $tour->id )) }}"><h6>View Adventure</h6></a>
                </div>
        </div>

        @endforeach


    </div>

</div>
@stop