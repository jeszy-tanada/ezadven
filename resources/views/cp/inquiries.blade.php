@extends('main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('cp/sidebar')
        </div>
        <div class="col-md-10">
            {{--<a class="btn btn-outline btn-success col-md-1 col-xs-12 pull-right" href="{{ URL::route('add_inq') }}">--}}
                {{--Add inq--}}
            {{--</a>--}}
            <p class="lead">Inquiries</p>
            <table class="table table-bordered">
                <head>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Tour</th>
                    <th>Inquiry</th>
                    <th>Status</th>
                </head>
                <tbody>
                    @foreach($inquiries as $inq)
                    <tr></tr>
                    <td>{{ $inq->name }}</td>
                    <td>{{ $inq->email }}</td>
                    <td>{{ $inq->contact }}</td>
                    <td>{{ $inq->tour->name }}</td>
                    <td>{{ $inq->question }}</td>
                    <td></td>
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