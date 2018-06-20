@extends('core::admin.master')

@section('title', 'Roles')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i> Roles

    <a href="{{ route('user.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('permission.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
    <div class="table-responsive table-sm">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>

                    <a class="btn btn-sm btn-info" href="{{ route('role.edit', ['id' => $role->id ])}}">Edit</a>

                    {!! Form::open(['method' => 'DELETE',  'style'=> 'display: inline', 'route' => ['role.destroy', $role->id] ]) !!}
                    {!! Form::button('<i class="fas fa-times-circle"></i>', ['class' => 'btn btn-sm btn-danger', 'title'=> 'Delete Role', 'type' => 'submit']) !!}
                    {!! Form::close() !!}



                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('role.create')}}" class="btn btn-success">Add Role</a>

</div>

@endsection
