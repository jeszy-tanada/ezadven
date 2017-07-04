@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('cp/sidebar')
        </div>
        <div class="col-md-10 ">
            <div class="row justify-content-center">
                <form class="jumbotron bg-vanilla text-center col-md-4 col-xs-12" action="{{ URL::route('add_area') }}" method="post" style="margin-top: 17px;" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="lead text-center">Add new Area</h3>
                    @include('cp/form_errors')
                    <div class="form-group">
                        <input type="text" placeholder="Name of Area" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control" name="country_id">
                            <option selected>Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image(Minimum:1280 x 720)</label>
                        <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">


                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary bg-light-brown col-md-6 text-vanilla">Save</button>
                    </div>

                </form>
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