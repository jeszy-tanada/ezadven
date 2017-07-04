@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('cp/sidebar')
        </div>
        <div class="col-md-10">
            <p class="lead"><a class="text-brown" href="{{ URL::route('add_tour') }}">Add Tour <i class="fa fa-plus"></i></a></p>
            <div class="row">
                @foreach($tours as $tour)
                <div class="col-md-3 col-xs-12" style="padding: 0">
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
                          <a href="{{ URL::route('tour_view', array('id' => $tour->id)) }}" class="bg-vanilla btn btn-secondary"><i class="fa fa-eye"></i>View</a>

                          <a href="{{ URL::route('edit_tour', array('id' => $tour->id)) }}" class="bg-pink btn btn-secondary"><i class="fa fa-edit"></i> Edit</a>
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