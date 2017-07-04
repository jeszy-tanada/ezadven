@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('base/sidebar')
        </div>
        <div class="col-md-10">
            {{--<ol class="breadcrumb">--}}
              {{--<li class="breadcrumb-item"><a href="#">Tours</a></li>--}}
              {{--<li class="breadcrumb-item"><a href="#">Korea</a></li>--}}
              {{--<li class="breadcrumb-item active">Data</li>--}}
            {{--</ol>--}}
            <p class="lead">Tours</p>
            <div class="row">
                @foreach($tours as $tour)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="padding: 0px">
                    <div class="card">
                      @if($tour->image)
                      <div class="card-mg" style="height: 180px;background-size: cover;background-image: url('{{ asset('tours/'.$tour->image) }}')"></div>
                      @else
                      <div class="card-mg" style="height: 180px;background-size: cover;background-image: url('{{ asset('img/placehold.png') }}')"></div>
                      @endif
                      <div class="card-block">
                        <h4 class="lead">
                        @if($tour->is_featured)
                        <i class="text-brown fa fa-star"></i>
                        @endif
                        {{ $tour->name }}
                        </h4>
                        <p class="card-text">{{ $tour->subname }}.</p>
                        <div class="row justify-content-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ URL::route('pub_tour_view', array('id' => $tour->id)) }}" class="bg-vanilla btn btn-secondary">View</a>

                        </div>

                        </div>
                      </div>
                    </div>
                </div>
                 @endforeach
            </div>

        </div>
    </div>
</div>
@stop

@section('modal')

@stop

@section(('css'))

@stop
@section('js')

@stop