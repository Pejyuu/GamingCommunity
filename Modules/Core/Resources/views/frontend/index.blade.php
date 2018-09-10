@extends('core::frontend.master')


@section('title', 'Frontpage')

@section('content')
<div class="col-md-12 col-lg-9">
  @guest
  <div class="jumbotron">
  <h1 class="display-4">Velkommen til oss!</h1>
  <p class="lead">Innlandets beste spillforening, <strong>OppLANere</strong>!</p>
  <hr class="my-4">
  <p class="text-justify">OppLANere er et åpent samlingssted for alle spillentusiaster i innlandet, hvor man kan diskutere spill og spillkultur, være med på (og arrangere) spillevents, og ikke minst holde seg oppdatert om lokale LAN.</p><p>
<small>Vi kan også leies inn for å bistå med spillrelaterte arrangementer. Ta kontakt med oss om dette høres interessant ut.</small></p>
</div>
  @endguest

  @auth
  <div class="jumbotron">
  <p class="lead">Innlandets beste spillsamfunn, <strong>OppLANere</strong>!</p>
  <hr class="my-4">
  <p class="text-justify">OppLANere er et åpent samlingssted for alle spillentusiaster i innlandet, hvor man kan diskutere spill og spillkultur, være med på (og arrangere) spillevents, og ikke minst holde seg oppdatert om lokale LAN.</p><p>
<small>Vi kan også leies inn for å bistå med spillrelaterte arrangementer. Ta kontakt med oss om dette høres interessant ut.</small></p>
</div>
@endauth

<h3 style="border-top: 1px dotted #c0c0c0; padding-top: 10px;">Community Blurbs</h3>
  <div class="row content">

    @foreach( $posts as $post )

        <div class="col-sm-6" style="margin: 0;">
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
            <!-- <a href="#">-->{{ $post->category->name }}<!--</a>--> :: {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }} <br> {!! $post->lead !!}<br>

          <!--   $post->author['name']  for author-->
            </small>

        </div>
      </div>
      </div>
    @endforeach


    <!--<div class="col-sm-12 col-md-4">
      <a href="#" class="thumb" style="background:url(https://4.bp.blogspot.com/-JHurmijwL28/Wb-GmA5mYCI/AAAAAAAAAvQ/vWDz0s1Q8v09HNfbXQgO1OrsKUMZeByEACEwYBhgL/s1600/10-750x350.jpg) no-repeat center top;background-size: cover">

      <span style="position: absolute; bottom: 5px; left: 5px; color: #fff;"><i class="far fa-calendar-alt"></i> i dag</span></a>
    </div>-->
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
