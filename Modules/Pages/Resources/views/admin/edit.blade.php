@extends('core::admin.master')

@section('title', 'Edit Page' )

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Edit Page</h1>
    <hr>

    {{ Form::model($page, array('route' => array('page.update', $page->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

    <div class="form-group">
      <h5><b>  {{ Form::label('name', 'Title') }}</b></h5>
        {{ Form::text('title', null, ['class' => 'form-control' ]) }}
    </div>
    <div class="form-group">
      <h5><b>  {{ Form::label('name', 'Slug') }}</b></h5>
        {{ Form::text('slug', null, ['class' => 'form-control' ]) }}
    </div>

    <div class='form-group'>
          <h5><b>{{ Form::label('name', 'Content') }}</b></h5>
            {{ Form::textarea('content', null, ['id' => 'editor' ]) }}


    </div>

    {{ Form::submit('Edit Page', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
@stop
