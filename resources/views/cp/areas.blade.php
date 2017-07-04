@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('cp/sidebar')
        </div>
        <div class="col-md-10">
            <p class="lead"><a class="text-brown" href="{{ URL::route('add_area') }}">Add Area <i class="fa fa-plus"></i></a></p>

            <table class="table table-bordered">
                <head>
                    <th>Name</th>
                    <th>Action</th>
                </head>
                <tbody>
                    @foreach($countries as $country)
                    <tr></tr>
                    <td>{{ $country->name }}</td>
                    <td></td>
                    @endforeach
                </tbody>
            </table>
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