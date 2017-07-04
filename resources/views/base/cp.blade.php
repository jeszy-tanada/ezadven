@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-3 col-xs-12">
            <form class="jumbotron bg-vanilla text-center" action="{{ URL::route('login') }}" method="post" style="margin-top: 127px;">
                {{ csrf_field() }}
                <h3 class="lead text-center">Login to CP</h3>
                {{--<label for="username">Username</label>--}}
                <div class="form-group">
                    <input type="text" placeholder="Username" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary bg-light-brown col-md-6 text-vanilla" value="{{ csrf_token() }}">Login</button>
                </div>

            </form>
        </div>
    </div>

</div>
@stop