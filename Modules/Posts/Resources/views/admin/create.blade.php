@extends('core::admin.master')

@section('title', 'Create Post' )

@section('content')

{{ Form::open(array('route' => 'post.store', 'method'=> 'put')) }}

<h1><i class='fa fa-key'></i> Create Post</h1>
<hr>
<div class="row">
  <div class="col-9 alert alert-warning" role="alert">
  Alle felter er foreløbig påkrevd.
  </div>
<div class="col-md-10 col-lg-6">


    <div class="form-group">
      <h5>{{ Form::label('name', 'Title') }}</h5>
        {{ Form::text('title', null, ['class' => 'form-control' ]) }}
    </div>


    <div class='form-group'>
          <h5>{{ Form::label('lead', 'Lead ( Ingress )') }}</h5>
            {{ Form::textarea('lead', null, ['class' => 'form-control', 'style' => 'height:75px' ]) }}
    </div>

    <div class='form-group'>
          <h5>{{ Form::label('name', 'Content') }}</h5>
            {{ Form::textarea('content', null, ['id' => 'editor' ]) }}
    </div>


  </div>
  <div class="col-md-10 col-lg-4">

    <div class="form-group">
      <h5>{{ Form::label('name', 'Category') }}</h5>
               {{ Form::select('category_id', $categories, null, ['class' => 'custom-select form-control']) }}
    </div>

    <div class="form-group">
      <h5>{{ Form::label('name', 'Tags') }}</h5>
        {{ Form::text('tags', null, ['class' => 'form-control', 'data-role' => 'tagsinput']) }}
    </div>

    <div class="form-group">
    <h5> {{ Form::label('name', 'Featured Image') }}</h5>

      <div class="input-group">
        <div class="input-group-prepend">
          <button id="lfm" type="button" data-input="thumbnail" data-preview="holder" class="btn btn-info">
            <i class="far fa-image"></i> Choose
          </button>
        </div>
        {{   Form::text('filepath', null, ['class' => 'form-control', 'id' => 'thumbnail']) }}

    </div>

      <img id="holder" style="margin-top:15px;max-height:100px;">
    </div>



    {{ Form::hidden('author', Auth::user()->id ) }}
    {{ Form::submit('Publish Post', array('class' => 'btn btn-success form-control')) }}
  </div>

</div>
  {{ Form::close() }}

@stop
