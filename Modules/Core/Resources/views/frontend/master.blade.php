<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>@yield('title') | {{ Config::get('app.name')}}</title>

    <!-- Bootstrap core CSS + FontAwesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="{{asset('css/opl.css')}}" rel="stylesheet">
  </head>

  <body>

    <div class="container wrapper">
      <div class="row">
        <header class="header">

          @include('core::frontend.partials.toplinks')


          <div class=""><img class="mascot" src="{{asset('img/mascot.png')}}" width="100%" /></div>

          @include('core::frontend.partials.mainmenu')
        </header>
      </div>

      <div class="row">

      @yield('content')




      <div class="col-md-12 col-lg-3">
        <div class="row">
        <div class="col-2 text-right">
          <h4><span class="badge badge-info">01</span></h4>
        	<h6>JUL</h6>
        </div>
        <div class="col-10">
        	<h5 class="text-uppercase"><strong>Ice Cream Social</strong></h5>
        		<ul class="list-inline">
        			<li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li>
        		</ul>
        </div>
      </div>

      <div class="row">
      <div class="col-2 text-right">
        <h4 class="text-muted"><span class="badge badge-secondary">26</span></h4>
        <h6 class="text-muted">AUG</h6>
      </div>
      <div class="col-10">
        <h6 class="text-uppercase text-muted"><strong>Overwatch Funsies</strong></h6>
          <ul class="list-inline">
            <li class="list-inline-item"><small><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li></small>
    </div>
  </div>


    <div class="row">
    <div class="col-2 text-right">
      <h4><span class="badge badge-secondary">26</span></h4>
      <h6>OCT</h6>
    </div>
    <div class="col-10">
      <h6 class="text-uppercase text-muted"><strong>Styremøte</strong></h6>
        <ul class="list-inline">
          <li class="list-inline-item"><small><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li></small>
        </div>
        </div>

      </div>
    </div>





    <footer class="site-footer">
    Copyright &copy; OppLANere 2018
    </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
