@extends('main')

@section('content')


    <div class="container-fluid">
        <div class="row align-items-center" style="min-height: 100px;">

            <div class="col">
                <h3 class="lead text-center">
                    <strong>MISSION</strong>
                    {{--<small>See us again next time</small>--}}
                </h3>
                <p class="lead text-center">
                    We travel not to escape lif but for life not to escape us!
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center" style="min-height: 100px;">

            <div class="col">
                <h3 class="lead text-center">
                    <strong>VISION</strong>
                    {{--<small>See us again next time</small>--}}
                </h3>
                <p class="lead text-center">
                    We travel not to escape lif but for life not to escape us!
                </p>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
@stop

@section('js')

@stop

@section('css')
    <style>
        #map {
            height: 640px;
            width: 100%;
        }
    </style>
@stop