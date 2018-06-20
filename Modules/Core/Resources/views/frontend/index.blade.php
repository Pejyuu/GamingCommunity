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

<h3 style="border-top: 1px dotted #c0c0c0; margin-bottom: 25px;"></h3>
  <div class="row no-gutters featured">

    <div class="col-sm-12 col-md-6">
        <a href="#" class="thumb" style="background:url(https://4.bp.blogspot.com/-lQhm0ORB0aM/Wb-GmBsj3HI/AAAAAAAAAvM/eTAQGkbYRzApupnxm-Xf4S6bHg6lsK0bACLcBGAs/s1600/F1-formula-1-2015-game-750x350.jpg) no-repeat center top;background-size: cover">

        <span style="position: absolute; bottom: 5px; left: 5px; color: #fff;"><i class="far fa-calendar-alt"></i> i dag</span>


        </a>
    </div>

    <div class="col-sm-12 col-md-6">
        <a href="#" class="thumb" style="background:url(https://i2.wp.com/horrorworld.org/wp-content/uploads/2018/05/Fallout-76-1000-01.jpg?resize=1000%2C460) no-repeat center top;background-size: cover">
        <span style="position: absolute; bottom: 5px; left: 5px; color: #fff;"><i class="far fa-calendar-alt"></i> i dag</span>
        </a>
    </div>


    <!--<div class="col-sm-12 col-md-4">
      <a href="#" class="thumb" style="background:url(https://4.bp.blogspot.com/-JHurmijwL28/Wb-GmA5mYCI/AAAAAAAAAvQ/vWDz0s1Q8v09HNfbXQgO1OrsKUMZeByEACEwYBhgL/s1600/10-750x350.jpg) no-repeat center top;background-size: cover">

      <span style="position: absolute; bottom: 5px; left: 5px; color: #fff;"><i class="far fa-calendar-alt"></i> i dag</span></a>
    </div>-->
  </div>
  </div>

@stop
