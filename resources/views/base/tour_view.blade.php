@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 hidden-sm-down">
            @include('base/sidebar')
        </div>
        <div class="col-md-10" style="margin-bottom: 15px;">
            <p class="lead">
                <a href="{{ URL::route('pub_tours') }}"> Tour > </a>
                {{ strtoupper($tour->name) }}
            </p>
            <div class="justify-content-center" style="margin-top: 15px;background-size: cover;background-image: url('{{ asset('tours/'.$tour->image) }}')">


                    <div class="tourname bg-trans-gray text-white" style="width: 100%;padding: 5px;">

                        <h4 class=" text-vanilla text-center">
                        @if($tour->is_featured)
                        <i class=" fa fa-star"></i>
                        @endif
                        {{ $tour->name }}
                        </h4>
                        <h4 class="lead text-center">{{ $tour->subname }}</h4>

                        <div class="" style="padding: 10px;">
                            {!! $tour->description !!}
                        </div>
                        <hr class="bg-vanilla">
                        <form action="{{ URL::route('inquire') }}" method="post">

                            {{ csrf_field() }}
                            <h6 class="text-center">Interested? Inquire now and Let us contact you instead!</h6>
                                <div class="row justify-content-center">
                                @if ($errors->has())

                                <div class="alert alert-danger col-md-4 col-xs-12" role="alert">
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                                </div>

                                @endif
                               @if ($message = Session::get('success'))
                               <div class="alert alert-success  col-md-4 col-xs-12">
                               	<button type="button" class="close" data-dismiss="alert">×</button>
                                       <p>{{ $message }}</p>
                               </div>
                               @endif
                               </div>
                            <div class="row justify-content-center">

                                <div class="form-group col-md-3 col-xs-12">
                                    <label for="name">*Name</label>
                                    <input value="{{ old('name') }}" id="name" type="text" placeholder="Juan Dela Cruz" name="name" class="form-control"/>
                                    <input type="hidden" name="tour_id" value="{{ $tour->id }}"/>
                                </div>

                                <div class="form-group col-md-3 col-xs-12">
                                    <label for="email">Email</label>
                                    <input value="{{ old('email') }}" type="email" id="email" placeholder="juandelacruz@eztours.com" name="email" class="form-control"/>
                                </div>

                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-md-3 col-xs-12">
                                    <label for="contact">Contact #</label>
                                    <input value="{{ old('contact') }}" type="text" name="contact" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3 col-xs-12">
                                    <label for="question">Got a question already? (optional)</label>
                                    <input value="{{ old('question') }}" type="text" name="question" class="form-control"/>
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin-bottom: 27px;">
                                <div class="col-md-4 col-xs-12 ">
                                     <button type="submit" class="btn text-center btn-success btn-block" href="{{ URL::route('edit_tour', array('id' => $tour->id)) }}" class="btn btn-success">
                                        Inquire About this tour!
                                     </button>
                                </div>
                            </div>
                        </form>
                    </div>


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