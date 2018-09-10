@extends('core::admin.master')

@section('title', 'Category Index' )

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="far fa-file-alt"></i> Categories</h1>
    <hr>
    <a href="{{ route('category.create')}}" class="btn btn-success">Create New category</a>
    <hr>
    <div class="table-responsive table-sm">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr>

                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                    <a class="btn btn-sm btn-info" href="{{ route('category.edit', ['id' => $category->id] )}}">Edit</a>

                    {!! Form::open(['method' => 'DELETE',  'style'=> 'display: inline', 'route' => ['category.destroy', $category->id] ]) !!}
                    {!! Form::button('<i class="fas fa-times-circle"></i>', ['class' => 'btn btn-sm btn-danger', 'title'=> 'Delete category', 'type' => 'submit']) !!}
                    {!! Form::close() !!}


                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@stop
