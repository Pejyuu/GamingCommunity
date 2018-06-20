@extends('core::admin.master')

@section('title', 'Edit Post' )

@section('content')

{{ Form::model($post, array('route' => array('post.update', $post->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

<h1><i class='fa fa-key'></i> Edit Post</h1>
<hr>
<div class="row">
<div class="col-md-10 col-lg-6">


    <div class="form-group">
      <h5>{{ Form::label('name', 'Title') }}</h5>
        {{ Form::text('title', null, ['class' => 'form-control' ]) }}
    </div>



    <div class='form-group'>
          <h5>{{ Form::label('name', 'Content') }}</h5>
            {{ Form::textarea('content', null, ['id' => 'editor' ]) }}
    </div>


  </div>
  <div class="col-md-10 col-lg-4">

    <div class="form-group">
      <h5>{{ Form::label('name', 'Category') }}</h5>
               {{ Form::select('category_id', $categories, $post->category->id, ['class' => 'custom-select form-control' ]) }}
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

      <img id="holder" style="margin-top:15px; width: 100%;">

      @if($post->filepath)
      <img id="preview" src="{{ url( $post->filepath )}}" style="margin-top:15px; width: 100%;">
      @endif
    </div>



    {{ Form::hidden('author', Auth::user()->id ) }}
    {{ Form::submit('Edit Post', array('class' => 'btn btn-success form-control')) }}
  </div>

</div>
  {{ Form::close() }}
@stop
