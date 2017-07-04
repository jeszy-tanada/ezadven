@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            @include('cp/sidebar')
        </div>
        <div class="col-md-9 ">
            <div class="row justify-content-center">
                <form class="jumbotron bg-vanilla col-md-8 col-xs-12" action="{{ URL::route('add_tour') }}" method="post" style="margin-top: 17px;" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="lead text-center">Add new Tour</h3>
                    @include('cp/form_errors')
                    {{--<label for="username">Username</label>--}}
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="name">*Name of Tour</label>
                            <input value="{{ old('name') }}" type="text" placeholder="i.e. 3D2N Winter Korea" name="name" class="form-control"/>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="are_id">*Location of this tour</label>
                            <select class="custom-select form-control" name="area_id" value="{{ old('area_id') }}">
                                <option selected>Select Area</option>
                                @foreach($areas as $key => $area)
                                <option value="{{ $area->id }}" {{ (old("area_id") == $area->id ? "selected":"") }}>{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="subname">*Enter any subtitle related to tour</label>
                            <input type="text" placeholder="Subdetail of Tour" name="subname" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="image">Image(Minimum:1280 x 720)</label>
                            <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">


                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-xs-12">
                            <label for="description">
                            Details of tour
                            </label>
                            <textarea name="description" id="description" class="form-control"  rows="10" placeholder="Description of tour">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-xs-12 col-md-4">
                            <button type="submit" class="btn btn-secondary btn-block bg-light-brown text-vanilla">Save</button>
                        </div>
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
  {!! HTML::script('js/ckeditor/ckeditor.js') !!}
  <script>
      CKEDITOR.replace( 'description' );
  </script>
@stop