@extends('core::admin.master')

@section('title', 'Page Index' )

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="far fa-file-alt"></i> Pages</h1>
    <hr>
    <a href="{{ route('page.create')}}" class="btn btn-success">Create New Page</a>
    <hr>
    <div class="table-responsive table-sm">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Author</th>
                    <th>Updated / Created</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pages as $page)
                <tr>

                    <td>{{ $page->title }}</td>
                    <td>/{{ $page->slug }}</td>
                    <td>Author              </td>
                    <td style="font-size: 0.8em">{{ $page->updated_at }} <span class="text-muted">/ {{ $page->created_at }}</span></td>
                    <td>
                    <a class="btn btn-sm btn-info" href="{{ url('/p/'. $page->slug )}}">View</a>
                    <a class="btn btn-sm btn-info" href="{{ route('page.edit', ['id' => $page->id] )}}">Edit</a>

                    {!! Form::open(['method' => 'DELETE',  'style'=> 'display: inline', 'route' => ['page.destroy', $page->id] ]) !!}
                    {!! Form::button('<i class="fas fa-times-circle"></i>', ['class' => 'btn btn-sm btn-danger', 'title'=> 'Delete Page', 'type' => 'submit']) !!}
                    {!! Form::close() !!}


                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@stop
