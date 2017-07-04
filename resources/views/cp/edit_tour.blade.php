@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            @include('cp/sidebar')
        </div>
        <div class="col-md-9 ">
            <div class="row justify-content-center">
                <form class="jumbotron bg-vanilla col-md-9 col-xs-12" action="{{ URL::route('edit_tour', array('id' => $tour->id)) }}" method="post" style="margin-top: 17px;" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="lead text-center">Edit Tour</h3>
                    @include('cp/form_errors')
                    {{--<label for="username">Username</label>--}}
                    <div class="row">
                        @if($tour->image)
                        <div class="col-md-12 text-center">
                            <img src="{{ asset('tours/'.$tour->image) }}" class="img-thumbnail" style="max-height: 90px;" alt=""/>
                        </div>
                        @endif
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="name">*Name of Tour</label>
                            <input value="{{ old('name', $tour->name) }}" type="text" placeholder="i.e. 3D2N Winter Korea" name="name" class="form-control"/>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="area_id">*Location of this tour</label>
                            <select class="custom-select form-control" name="area_id">
                                <option selected>Select Area</option>
                                @foreach($areas as $key => $area)
                                <option value="{{ $area->id }}" {{ (old("area_id", $tour->area_id) == $area->id ? "selected":"") }}>{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="subanem">*Enter any subtitle related to tour</label>
                            <input type="text" placeholder="Subdetail of Tour" name="subname" value="{{ old('subname', $tour->subname) }}" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="image">Image(Minimum:1280 x 720)</label>
                            <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
                            <small>Only select image file if you want to replace existing image</small>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="1" name="is_featured" @if($tour->is_featured) checked @endif>
                                Feature this tour?


                              </label>
                            </div>
                             <em><small>Featured tours will be on the home page</small></em>
                            <br/>
                             <em><small>Recommended count of featured tours is multiples of 4</small></em>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-xs-12">
                            <label for="description">
                            Details of tour
                            </label>
                            <textarea name="description" id="description" class="form-control"  rows="10" placeholder="Description of tour">{{ old('description', $tour->description) }}</textarea>
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