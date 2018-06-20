@extends('core::frontend.master')

@section('title', 'Post Index' )

@section('content')

<div class="col-md-12 col-lg-9 content">


    <h1>Nyeste Blurbs</h1>
    <hr>
      <div class="row">

          @foreach( $posts as $post )
            @if ( $loop->first )
            <div class="col-sm-12" style="">

                <div class="card border-light">

                  <a href="{{ url('blurb/'. $post->slug )}}" class="first" style="background: url( {{ url(''.$post->filepath) }} ) no-repeat center center;background-size: cover">
                  </a>
                  @if( $post->category->id == 1)
                  <div class="card-body text-white bg-info">
                  @else
                  <div class="card-body">
                  @endif

                  <h2 class="card-title">{{ $post->title }}</h2>
                  <p class="card-text">{!! str_limit( strip_tags( $post->content, 20 ) )!!}</p>
                </div>
            </div>
          </div>

            @else

            <div class="col-sm-6" style="margin: 25px 0 0 0; padding-top:20px; border-top: 1px solid #ccc">
              <div class="card border-light">

                <a href="{{ url('blurb/'. $post->slug )}}" class="cards" style="background: url( {{ url(''.$post->filepath) }} ) no-repeat center center;background-size: cover">
                </a>

                <div class="card-body" style="padding: 0; ">
                  @if( $post->category->id == 1)
                    <h4 class="important card-title">{{ $post->title }}</h4>
                  @else
                    <h4 class="card-title">{{ $post->title }}</h4>
                  @endif
                  <small>
                  <a href="#">{{ $post->category->name}}</a> :: {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }} <br> {!! strip_tags (str_limit(  $post->content , 200,' .. Les mer'  ))!!}<br>


                  </small>

              </div>
            </div>
            </div>
            @endif

          @endforeach

      </div>
      </div>

@stop
