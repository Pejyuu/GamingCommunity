@extends('core::frontend.master')

@section('title', $post->title )

@section('content')

<div class="col-md-12 col-lg-9 content">

<!-- the actual blog post: title/author/date/content -->
                <h1>{{ $post->title }}</h1>
                <p class="lead"><small></small>
                </p>
                <hr>
                <img src="{{ url( $post->filepath )}}" style="width:100%">
                <hr>
                {!! $post->content !!}
                <hr>
                <p class="text-secondary"><small>In {{$post->category->name}} <i class="fa fa-user"></i> by <a href="">{{ $post->author->name}}</a> | <i class="fa fa-calendar"></i> Posted on {{ $post->updated_at}}</small></p>
				        <p class="text-secondary">
                  <small><i class="fa fa-tags"></i> Tags:
                  <a href=""><span class="badge badge-info">Bootstrap</span></a></small>
                </p>




</div>

@stop
