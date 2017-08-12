@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Entries</div>
                    <div class="panel-body">
                        <a href="{{ url('/stories/create') }}" class="btn btn-success btn-sm" title="Add New Post">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/stories', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{$request->keyword or ''}}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>User</th><th>Project</th><th>Date</th><th>Hours</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stories as $item)
                                    <tr>
                                        <td><img src="{{ $users->find($item->owner)->gravatar }}" /> <strong>{{ $users->find($item->owner)->name }}</strong></td> <td>{{ $projects[$item->project] }}</td><td>{{ $item->date}}</td><td>{{ $item->hours}}</td>
                                        <td>
                                            <a href="{{ url('/stories/' . $item->id) }}" title="View Post"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                            @if($item->owner == Auth::user()->id)
                                                <a href="{{ url('/stories/' . $item->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                {!! Form::open(['method'=>'DELETE', 'url' => ['/stories', $item->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Delete Post', 'onclick'=>'return confirm("Confirm delete?")')) !!}
                                                {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $stories->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
