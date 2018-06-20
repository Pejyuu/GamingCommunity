@extends('core::frontend.master')

@section('title', $page->title )

@section('content')

<div class="col-md-12 col-lg-9">

{!! $page->title !!} <br />
{!! $page->content !!}
  </div>
@stop
