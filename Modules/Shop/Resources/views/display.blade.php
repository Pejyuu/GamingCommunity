@extends('core::frontend.master')

@section('title', $product->name )

@section('content')

<div class="col-md-12 col-lg-9 content">


    <h1>{{ $product->name }}</h1><h3 style="top: 10px; right: 15px; position: absolute;"><a href="{{ route('storefront')}}">Tilbake</a></h3>
    <hr>

        <div class="row">
              <div class="col-md-8 col-sm-12 text-justify">

              <img src="{{ url( $product->pic1 )}}" style="width:100%">

                <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block" src="http://via.placeholder.com/540x300" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block" src="http://via.placeholder.com/540x300" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block" src="http://via.placeholder.com/540x300" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                -->

                <hr>
                {!! $product->description !!}

              <hr>

              @can('product.post')
              <a class="btn btn-sm btn-info float-right" href="{{ route('product.edit', ['id' => $product->id] )}}">Edit</a>
              @endcan<br>

            </p>
            </div>
      <div class="col-md-4 col-sm-12">
        <div class="card" style="background-color: #f8f5f0;">
        <div class="card-header"><h3>Produktvalg</h3></div>
        <div class="card-body text-left">

          @if($product->colors)
          <h4>Farger</h4>
          {{ $product->colors }}
          <hr>
          @endif

          @if($product->sizes)
          <h4>Størrelser</h4>
          {{ $product->sizes  }}
          <hr>
          @endif

          <h3>Pris : <span style="color: #f2822e">{{$product->price}}</span></h3>





        <!-- <button class="btn btn-info form-control disabled">Log In to Order</button>
        <a href="{{ route('login')}}">Log In</a>-->

        For å bestille stæsj, ta kontakt med <a href="mailto:oplmerch@gmail.com">Roger Bekk</a>

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
