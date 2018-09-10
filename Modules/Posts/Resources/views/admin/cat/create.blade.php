@extends('core::admin.master')

@section('title', 'Create Category' )

@section('content')

{{ Form::open(array('route' => 'category.store', 'method'=> 'put')) }}

<h1><i class='fa fa-key'></i> Create Category</h1>
<hr>
<div class="row">
<div class="col-md-10 col-lg-6">


    <div class="form-group">
      <h5>{{ Form::label('name', 'Category Name') }}</h5>
        {{ Form::text('name', null, ['class' => 'form-control' ]) }}
    </div>


    <div class='form-group'>
          <h5>{{ Form::label('desc', 'Description') }}</h5>
            {{ Form::textarea('desc', null, ['class' => 'form-control', 'style' => 'height: 150px' ]) }}
    </div>

    {{ Form::submit('Save Category', array('class' => 'btn btn-success form-control')) }}



  </div>


  </div>

  {{ Form::close() }}

@stop
