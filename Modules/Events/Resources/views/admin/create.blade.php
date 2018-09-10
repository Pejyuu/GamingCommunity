@extends('core::admin.master')

@section('title', 'Create Event' )

@section('content')

{{ Form::open(array('route' => 'event.store', 'method'=> 'put')) }}

<h1><i class='fa fa-key'></i> Create Post</h1>
<hr>
<div class="row">
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
          <h5>{{ Form::label('description', 'Event Description') }}</h5>
            {{ Form::textarea('description', null, ['id' => 'editor' ]) }}
    </div>


  </div>
  <div class="col-md-10 col-lg-4">

    <div class="form-group">
    <h5> {{ Form::label('start', 'Date / Time') }}</h5>
    <div class="row">
    <div class="col">{{   Form::text('start', null, ['class' => 'form-control', 'id' => 'starttime', 'placeholder' => 'Start Time']) }}</div>
    <div class="col">{{   Form::text('end', null, ['class' => 'form-control', 'id' => 'endtime', 'placeholder' => 'End Time']) }}</div>
    </div>
    </div>

    <div class="form-group">
    <h5> {{ Form::label('location', 'Sted / Adresse') }}</h5>
    {{   Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Sted / Adresse']) }}



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
    {{ Form::submit('Publish Event', array('class' => 'btn btn-success form-control')) }}
  </div>

</div>
  {{ Form::close() }}

@stop


@section('css_head')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/datetimepicker/jquery.datetimepicker.css')}}" >
@endsection


@section('js_head')
@endsection

@section('js_footer')
<script src="{{ asset('vendor/datetimepicker/jquery.datetimepicker.full.js')}}"></script>
<script>
jQuery('#starttime').datetimepicker();
jQuery('#endtime').datetimepicker();
</script>
@endsection
