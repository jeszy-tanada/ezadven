@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('cp/sidebar')
        </div>
        <div class="col-md-10 ">
            <div class="row justify-content-center">
                <form class="jumbotron bg-vanilla text-center col-md-4 col-xs-12" action="{{ URL::route('add_country') }}" method="post" style="margin-top: 17px;">
                    {{ csrf_field() }}
                    <h3 class="lead text-center">Add new Country</h3>
                    @include('cp/form_errors')
                    {{--<label for="username">Username</label>--}}
                    <div class="form-group">
                        <input type="text" placeholder="Name of Country" name="name" class="form-control"/>
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