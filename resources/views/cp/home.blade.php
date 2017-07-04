@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('cp/sidebar')
        </div>
        <div class="col-md-10">
            <h1 class="lead">Welcome to EZ Admin</h1>
            <div class="row">
                <div class="col">

                    <ul class="lead">
                        <li>1. Images Recommended size is 1280 x 720 or 1920 x 1080  (Width x Height)</li>
                        <li>2. Remember to double check all inputs before saving.</li>
                        <li>3. EZ</li>
                        </ul>

                </div>
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