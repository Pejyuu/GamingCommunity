@extends('core::admin.master')

@section('title', 'Create Page' )

@section('content')



    <h1><i class='fa fa-key'></i> Add Page</h1>
    <hr>

<div class="col-md-10 col-lg-6">
    {{ Form::open(array('route' => 'page.store', 'method'=> 'put')) }}

    <div class="form-group">
      <h5><b>  {{ Form::label('name', 'Title') }}</b></h5>
        {{ Form::text('title') }}
    </div>
    <div class="form-group">
      <h5><b>  {{ Form::label('name', 'Slug') }}</b></h5>
        {{ Form::text('slug') }}
    </div>

    <div class='form-group'>
          <h5><b>{{ Form::label('name', 'Content') }}</b></h5>
            {{ Form::textarea('content', null, ['id' => 'editor' ]) }}


    </div>
    {{ Form::hidden('author', Auth::user()->id ) }}
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
@stop
