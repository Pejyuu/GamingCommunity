@extends('core::frontend.master')

@section('title', $event->title)

@section('content')

<div class="col-md-12 col-lg-9 content">

<!-- the actual blog event: title/author/date/content -->
                <h1>{{ $event->title }}</h1>
                <hr>

                <img src="{{ url( $event->filepath )}}" style="width:100%">
                <hr>
                @if($event->lead != false )
                <p class="lead text-center">
                {{ $event->lead }}
                </p>

                @endif

                <hr>
                <p class="text-secondary"><i class="fa fa-calendar text-info"></i><strong> {{ \Carbon\Carbon::parse($event->start)->format('d M H.i') }} - {{ \Carbon\Carbon::parse($event->end)->format('d M H.i') }}
                | {{ $event->location }}
                </strong>
                <hr>

                <div class="row">
                  <div class="col-md-8 col-sm-12 text-justify">

                    {!! $event->description !!}

                <hr>
                  @can('delete.post')
                  <a class="btn btn-sm btn-info float-right" href="{{ route('event.edit', ['id' => $event->id] )}}">Edit</a>
                  @endcan<br>

                </p>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="card" style="background-color: #f8f5f0;">
                <div class="card-header"><h3>Attending : <span style="color: #f2822e">{{$event->attending->count()}}</span></h3></div>
                <div class="card-body text-justify">
                  @php
                  $rsvpd = 0;
                  @endphp

                  @foreach( $event->attending as $attending)
                    @if(!$attending->avatar)
                    <figure class="figure text-center d-none d-md-inline">
                    <img src="http://via.placeholder.com/50x50" style="width: 50px; margin-bottom: 10px;" title="{{ $attending->name}}">
                    </figure>

                    <figure class="figure d-md-none text-center">
                    <img src="http://via.placeholder.com/50x50" style="width: 150px; margin-bottom: 10px;" title="{{ $attending->name}}">
                    <figcaption class="figure-caption">{{ $attending->name }}</figcaption>
                    </figure>

                    @else
                    <figure class="figure text-center d-none d-md-inline">
                    <img src="{{ $attending->avatar }}" style="width: 50px; margin-bottom: 10px" title="{{ $attending->name }}">
                    </figure>

                    <figure class="figure d-md-none text-center">
                    <img src="{{ $attending->avatar }}" style="width: 150px; margin-bottom: 10px" title="{{ $attending->name }}">
                    <figcaption class="figure-caption">{{ $attending->name }}</figcaption>
                    </figure>
                    @endif

                    @php

                    if($attending->pivot->user_id == Auth::id())
                    { $rsvpd = 1; }

                    @endphp

                  @endforeach

                @auth

                @if($rsvpd == 0)
                {!! Form::open(['method' => 'PUT',  'style'=> 'display: inline', 'route' => 'rsvp']) !!}
                {{ Form::hidden('user_id', Auth::id() ) }}
                {{ Form::hidden('event_id', $event->id ) }}
                {!! Form::button('<i class="far fa-smile"></i> RSVP', ['class' => 'form-control btn btn-info', 'title'=> 'Cancel RSVP', 'type' => 'submit']) !!}
                {!! Form::close() !!}

                @else
                {!! Form::open(['method' => 'DELETE',  'style'=> 'display: inline', 'route' => 'rsvp.cancel']) !!}
                {{ Form::hidden('user_id', Auth::id() ) }}
                {{ Form::hidden('event_id', $event->id ) }}
                {!! Form::button('<i class="fas fa-times-circle"></i> Cancel RSVP', ['class' => 'form-control btn btn-warning', 'title'=> 'Cancel RSVP', 'type' => 'submit']) !!}
                {!! Form::close() !!}
                @endif




                @else
                <button class="btn btn-info form-control disabled">Log In to RSVP</button>
                <a href="{{ route('login')}}">Log In</a>
                @endauth
                </div>
              </div>
              </div>
            </div>


</div>


@stop


@section('css_head')

@endsection


@section('js_head')
<!-- js.head -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- /js.head-->
@endsection

@section('js_footer')



<!-- Bootstrap core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script>
  Holder.addTheme('thumb', {
    bg: '#55595c',
    fg: '#eceeef',
    text: 'Thumbnail'
  });
</script>
<!-- / Bootstrap core Javascript -->

@endsection
