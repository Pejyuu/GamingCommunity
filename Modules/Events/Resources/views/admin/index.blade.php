@extends('core::admin.master')

@section('title', 'Event Index' )

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="far fa-file-alt"></i> events</h1>
    <hr>
    <a href="{{ route('event.create')}}" class="btn btn-success">Create New Event</a>
    <hr>
    <div class="table-responsive table-sm">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start / End</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($events as $event)
                <tr>

                    <td>{{ $event->title }}</td>
                    <td>{{ str_limit(strip_tags($event->lead), '50') }}</td>
                    <td style="font-size: 0.8em">{{ $event->start }} <span class="text-muted">/ {{ $event->end }}</span></td>
                    <td>
                    <a class="btn btn-sm btn-info" href="{{ url('event/'. $event->slug ) }}">View</a>
                    <a class="btn btn-sm btn-info" href="{{ route('event.edit', ['id' => $event->id ] )}}">Edit</a>

                    {!! Form::open(['method' => 'DELETE',  'style'=> 'display: inline', 'route' => ['event.destroy', $event->id] ]) !!}
                    {!! Form::button('<i class="fas fa-times-circle"></i>', ['class' => 'btn btn-sm btn-danger', 'title'=> 'Delete event', 'type' => 'submit']) !!}
                    {!! Form::close() !!}


                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@stop
