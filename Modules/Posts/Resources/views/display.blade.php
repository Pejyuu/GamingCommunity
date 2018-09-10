@extends('core::frontend.master')

@section('title', $post->title )

@section('content')

<div class="col-md-12 col-lg-9 content">

<!-- the actual blog post: title/author/date/content -->
                <h1>{{ $post->title }}</h1>
                <hr>

                <img src="{{ url( $post->filepath )}}" style="width:100%">

                <hr>

                @if($post->lead != false )
                <p class="lead text-center">
                {{ $post->lead }}
                </p>
                <hr>
                @endif
                {!! $post->content !!}
                <hr>
                <p class="text-secondary"><small><i class="far fa-folder"></i> <a href="#" class="taxonomy">{{$post->category->name}}</a> | <i class="fa fa-user"></i> <span class="author">{{ $post->author->name }}</span> | <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</small>
                  @can('post.edit')
                  <a class="btn btn-sm btn-info float-right" href="{{ route('post.edit', ['id' => $post->id] )}}">Edit</a>
                  @endcan<br>
                  <small><i class="fa fa-tags"></i>
                  <a href="#"><span class="badge badge-info">Bootstrap</span></a></small>

                </p>









@auth
<hr>
<h1 style="margin-top: 50px">Leave a comment!</h1>
{{ Form::open(array('route' => 'comment.store', 'method'=> 'put')) }}
  <div class="form-group">
      {{ Form::textarea('comment', null, ['id' => 'editor', 'class' => 'form-control', 'style' => 'width:100%; height: 100px;']) }}
  </div>

    {{ Form::hidden('user_id', Auth::user()->id ) }}
    {{ Form::hidden('post_id', $post->id ) }}
    {{ Form::submit('Publish Comment', array('class' => 'btn btn-info form-control')) }}

  {{ Form::close() }}

@endauth



@if( count($post->comments) != 0 )

<h1 style="margin-top: 50px">{{ count($post->comments) }} Comments</h1>

  @foreach ( $post->comments as $comment )
  <hr style="padding:0; margin: 0;">
  <div class="row comment">
  <div class="col-3 text-center"><img src="{{ $comment->author->avatar}}" style="width: 100px" class="rounded-circle"><br>

  </div>
  <div class="col-9">
  <strong class="text-muted"><span class="author">{{ $comment->author->name }}</span> : {{ \Carbon\Carbon::parse($comment->created_at)->format('d M Y') }}</strong><br>
  {{ strip_tags($comment->comment) }} </p>

  @can('comment.delete')
  <span style="bottom:0; right: 15px; position:absolute">
  {!! Form::open(['method' => 'DELETE',  'style'=> 'display: inline', 'route' => ['comment.destroy', $comment->id ] ]) !!}
  {!! Form::button('<i class="fas fa-times-circle"></i>', ['class' => 'btn btn-sm btn-danger', 'title'=> 'Delete Comment', 'type' => 'submit']) !!}
  {!! Form::close() !!}

  @endcan
</div>
</div>
  @endforeach

@endif


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
