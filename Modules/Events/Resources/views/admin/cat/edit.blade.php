@extends('core::admin.master')

@section('title', 'Edit Category' )

@section('content')


{{ Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

<h1><i class='fa fa-key'></i> Edit category</h1>
<hr>
<div class="row">
<div class="col-md-10 col-lg-6">


    <div class="form-group">
      <h5>{{ Form::label('name', 'Category Name') }}</h5>
        {{ Form::text('name', null, ['class' => 'form-control' ]) }}
    </div>


    <div class='form-group'>
          <h5>{{ Form::label('desc', 'Description') }}</h5>
            {{ Form::textarea('description', null, ['class' => 'form-control', 'style' => 'height: 150px' ]) }}
    </div>

    {{ Form::submit('Save Category', array('class' => 'btn btn-success form-control')) }}



  </div>


  </div>

  {{ Form::close() }}

@stop
