@extends('core::admin.master')

@section('title', 'Edit Product' )

@section('content')

{{ Form::model($product, array('route' => array('product.update', $product->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

<h1><i class='fa fa-key'></i> Edit Product</h1>
<hr>
<div class="row">
<div class="col-md-10 col-lg-6">


    <div class="form-group">
      <h5>{{ Form::label('name', 'Name') }}</h5>
        {{ Form::text('name', null, ['class' => 'form-control' ]) }}
    </div>

    <div class='form-group'>
          <h5>{{ Form::label('name', 'Description') }}</h5>
            {{ Form::textarea('description', null, ['id' => 'editor' ]) }}
    </div>


  </div>
  <div class="col-md-10 col-lg-4">
    <div class="form-group">
      <h5>{{ Form::label('name', 'Pris') }}</h5>
      {{ Form::text('price', null, ['class' => 'form-control' ]) }}
    </div>

    <div class="form-group">
      <h5>{{ Form::label('name', 'Farger') }}</h5>
      {{ Form::text('colors', null, ['class' => 'form-control' ]) }}
    </div>

    <div class="form-group">
      <h5>{{ Form::label('name', 'Størrelser') }}</h5>
      {{ Form::text('sizes', null, ['class' => 'form-control' ]) }}
    </div>

    <div class="form-group">
    <h5> {{ Form::label('filepath', 'Produktbilder') }}</h5>

      <div class="input-group">
        <div class="input-group-prepend">
          <button id="lfm" type="button" data-input="thumbnail" data-preview="holder" class="btn btn-info">
            <i class="far fa-image"></i> Choose
          </button>
        </div>
        {{   Form::text('filepath', null, ['class' => 'form-control', 'id' => 'thumbnail']) }}

    </div>

      <img id="holder" style="margin-top:15px; width: 100%;">

       @if($product->pic1)
      <img id="preview" src="{{ url( $product->pic1 )}}" style="margin-top:15px; width: 100%;">
      @endif
      
    </div>

    {{ Form::submit('Edit Product', array('class' => 'btn btn-success form-control')) }}
  </div>

</div>
  {{ Form::close() }}

@stop



