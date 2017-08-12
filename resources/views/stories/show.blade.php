@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>{{$projects[$stories->project]}}</strong> by <strong>{{$users->find($stories->owner)->name}}</strong>,
                        {{ $stories->date }}: {{ $stories->hours }} hour(s).
                    </div>
                    <div class="panel-body">
                        <img src="{{ $users->find($stories->owner)->gravatar }}" /> 
                        <p> {!! nl2br($stories->description) !!} </p>

                        @if($stories->owner == Auth::user()->id)
                            <a href="{{ url('/stories/' . $stories->id . '/edit') }}" title="Edit Entry"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                            {!! Form::open(['method'=>'DELETE', 'url' => ['stories', $stories->id], 'style' => 'display:inline']) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Delete Entry', 'onclick'=>'return confirm("Confirm delete?")'))!!}
                            {!! Form::close() !!}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
