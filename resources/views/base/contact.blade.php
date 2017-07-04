@extends('main')

@section('content')




<div class="container-fluid">
    <div class="row align-items-center" style="min-height: 100px;">

        <div class="col">
            <h3 class="lead text-center">
                <strong> VISIT US! </strong>
                {{--<small>See us again next time</small>--}}
            </h3>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-6">

            <img style="width: 100%" src="https://maps.googleapis.com/maps/api/staticmap?autoscale=2&size=600x300&maptype=roadmap&key=AIzaSyAuxcXrzNjaV7dKGCcuFkRRSas6cNl81ME&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:%7Cinkpression+advertising" alt="Google Map of inkpression advertising">
        </div>
        <div class="col-md-6 align-items-center">
            <p class="lead text-center"><strong>ezadventurer.traveltours@gmail.com</strong></p>
            <p class="lead text-center"><strong>(0916)-540-1237</strong></p>
            <p class="lead text-center"><strong>(0927)-758-3014</strong></p>
            <p class="lead text-center"><strong>932-1884</strong></p>
            <p class="lead text-center"><strong>2F Unit Paranaque City</strong></p>
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