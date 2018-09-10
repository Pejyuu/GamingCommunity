@extends('core::admin.master')

@section('title', 'Post Index' )

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="far fa-file-alt"></i> Posts</h1>
    <hr>
    <a href="{{ route('post.create')}}" class="btn btn-success">Create New Post</a>
    <hr>
    <div class="table-responsive table-sm">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Updated / Created</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                <tr>

                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category['name']}}</td>
                    <td>{{ $post->author['name'] }}            </td>
                    <td style="font-size: 0.8em">{{ $post->updated_at }} <span class="text-muted">/ {{ $post->created_at }}</span></td>
                    <td>
                    <a class="btn btn-sm btn-info" href="{{ url('blurb/'. $post->slug )}}">View</a>
                    <a class="btn btn-sm btn-info" href="{{ route('post.edit', ['id' => $post->id] )}}">Edit</a>

                    {!! Form::open(['method' => 'DELETE',  'style'=> 'display: inline', 'route' => ['post.destroy', $post->id] ]) !!}
                    {!! Form::button('<i class="fas fa-times-circle"></i>', ['class' => 'btn btn-sm btn-danger', 'title'=> 'Delete post', 'type' => 'submit']) !!}
                    {!! Form::close() !!}


                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@stop
