@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/home" class="fa fa-home"></a> : {{ $pageTitle }}</div>
                <div class="panel-body"> {!! $panel !!} </div>
                <div class="panel-footer">

                    <h4>Dates</h4>
                    <ul>
                    @foreach($allDates as $p)
                        <li><a href="/home/{{ $p->name}}/">{{ $p->name}}</a></li>
                    @endforeach
                    </ul>
                    
                    <h4>Projects</h4>
                    <ul>
                    @foreach($allProjects as $p)
                        <li><a href="/home/{{ $p->name}}/">{{ $p->name}}</a></li>
                    @endforeach
                    </ul>

                    <h4>Users</h4>
                    <ul>
                    @foreach($allUsers as $p)
                        <li><a href="/home/{{ $p->name}}/">{{ $p->name}}</a></li>
                    @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
