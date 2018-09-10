@extends('core::frontend.master')

@section('title', 'Shop Index' )

@section('content')

<div class="col-md-12 col-lg-9 content">


    <h1>Merchandise</h1><!--<h3 style="top: 10px; right: 15px; position: absolute;"><a href="{{ route('blurbs')}}">Nyeste</a></h3>-->
    <hr>
    {!! $products->links() !!}
      <div class="row">

          @foreach( $products as $product )

            <div class="col-sm-6" style="margin: 0 0 0 0; padding-top:30px; ">
              <div class="card border-light">

                <a href="{{ url('product/'. $product->id )}}" class="cards" style="background: url( {{ url(''.$product->pic1) }} ) no-repeat center center;background-size: cover">
                </a>

                <div class="card-body" style="padding: 0; ">

                    <h4 class="card-title">{{ $product->name }}</h4>
                  <small>
                  <a href="{{ url('product/'. $product->id )}}">{{ $product->name }}</a><br>
                  </small>

              </div>
            </div>
            </div>

          @endforeach



      </div>
      {!! $products->links() !!}
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
