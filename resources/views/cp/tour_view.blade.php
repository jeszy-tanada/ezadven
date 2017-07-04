@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            @include('cp/sidebar')
        </div>
        <div class="col-md-9">

            <div class="row justify-content-center" style="margin-top: 15px;">

                <div class="">
                    <div class="text-center">
                    @if($tour->image)
                    <img class="card-img-top text-center" src="{{asset('tours/'.$tour->image)}}" alt="{{ $tour->name }}" style="max-height: 270px;">

                    @endif
                    </div>
                    <div class="tourname">
                        <div class="" style="position:absolute;left: 0;top: 0;height: 100%"></div>
                        <h4 class="text-center">
                        @if($tour->is_featured)
                        <i class="text-brown fa fa-star"></i>
                        @endif
                        {{ $tour->name }}
                        </h4>
                        <h4 class="lead text-center">{{ $tour->subname }}</h4>
                        <div class="row justify-content-center">
                             <a class="btn text-center btn-success col-md-1 col-xs-12 pull-right" href="{{ URL::route('edit_tour', array('id' => $tour->id)) }}" class="btn btn-success">
                                Edit Tour
                             </a>
                         </div>
                        <div>
                            {!! $tour->description !!} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci beatae consequatur dolore ducimus eius ex excepturi hic laborum quod velit. Ad blanditiis delectus ducimus esse ex praesentium quis, sapiente soluta.
                        </div>
                    </div>


                </div>

            </div>
            <div class="row" style="margin-bottom: 27px;">

            </div>

        </div>
    </div>
</div>
@stop

@section('modal')

@stop

@section('css')

@stop
@section('js')

@stop