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

    @yield('css_head')
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">

    <link href="{{asset('css/opl.css')}}" rel="stylesheet">

    @yield('js_head')
  </head>

  <body>


    @include('cookieConsent::index')


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


      @include('core::frontend.partials.sidebar')


    </div>





    <footer class="site-footer">
    Copyright &copy; OppLANere 2018
    </footer>

    </div><!-- /.container -->


  @yield('js_footer')


</body>
</html>
