@extends('core::admin.master')


@section('title', 'Users')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> User Administration <a href="{{ route('role.index') }}" class="btn btn-default pull-right">Roles</a>
    <a href="{{ route('permission.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
    <div class="table-responsive userlist">
    <span class="float-left">{!! $users->links() !!}</span>  <span class="float-right"><h5><span class="text-info">{{ count( App\User::all() )  }} </span> Total Members</h5></span>
        <table class="table table-sm table-bordered table-striped table-hover">

            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                      @can('manage.users')
                      <div class="btn-group">
                          <a class="btn btn-sm btn-dark disabled" href="{{ route('user.view', $user->id) }}">View</a>
                          <a class="btn btn-sm btn-info" href="{{ route('user.edit', $user->id) }}">Edit</a>
                      </div>

                          {!! Form::open(['method' => 'DELETE', 'style'=> 'display: inline', 'route' => ['user.destroy', $user->id] ]) !!}
                          {!! Form::button('<i class="fas fa-times-circle"></i>', ['class' => 'btn btn-sm btn-danger', 'title'=> 'Delete User', 'type' => 'submit']) !!}
                          {!! Form::close() !!}
                      @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>

</div>


@stop
