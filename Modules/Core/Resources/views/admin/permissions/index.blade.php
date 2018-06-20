@extends('core::admin.master')

@section('title', 'Permissions')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i>Available Permissions

    <a href="{{ route('user.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('role.index') }}" class="btn btn-default pull-right">Roles</a></h1>
    <hr>
    <div class="table-responsive table-sm">
        <table class="table table-bordered table-striped">

            <thead class="thead-dark">
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>
                      <a class="btn btn-sm btn-info" href="{{ route('permission.edit', ['id' => $permission->id] )}}">Edit</a>

                    {!! Form::open(['method' => 'DELETE',  'style'=> 'display: inline', 'route' => ['permission.destroy', $permission->id] ]) !!}
                    {!! Form::button('<i class="fas fa-times-circle"></i>', ['class' => 'btn btn-sm btn-danger', 'title'=> 'Delete Permission', 'type' => 'submit']) !!}
                    {!! Form::close() !!}


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('permission.create')}}" class="btn btn-success">Add Permission</a>

</div>

@endsection
