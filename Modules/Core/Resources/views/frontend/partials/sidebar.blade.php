@php

$sbevents = Modules\Events\Entities\Event::take('5')->whereDate('end', '>=', \Carbon\Carbon::now())->get();

@endphp


<div class="col-md-12 col-lg-3 content">
<h3 style="margin-top: 12px; margin-bottom: 26px">Kommende Events</h3>
  @foreach( $sbevents as $sbevent )
   @if($loop->iteration == 1 )
  <div class="row">
  <div class="col-2 text-right">
    <h4><span class="badge badge-info">{{ \Carbon\Carbon::parse($sbevent->start)->format('d') }}</span></h4>
    <h6 class="text-uppercase">{{ \Carbon\Carbon::parse($sbevent->start)->format('M') }}</h6>
  </div>
  <div class="col-10">
    <a href="{{ route('event.display', [ 'slug' => $sbevent->slug ]) }}"><h5 class="text-uppercase" style="color: black"><strong>{{ $sbevent->title }}</strong></h5></a>
      <ul class="list-inline">
        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ \Carbon\Carbon::parse($sbevent->start)->format('H.i') }} - {{ \Carbon\Carbon::parse($sbevent->end)->format('H.i') }}</li>
      </ul>
  </div>
</div>

  @else


  <div class="row">
  <div class="col-2 text-right">
    <h4 class="text-muted"><span class="badge badge-secondary">{{ \Carbon\Carbon::parse($sbevent->start)->format('d') }}</span></h4>
    <h6 class="text-uppercase text-muted">{{ \Carbon\Carbon::parse($sbevent->start)->format('M') }}</h6>
  </div>
  <div class="col-10">
    <a href="{{ route('event.display', [ 'slug' => $sbevent->slug ]) }}"><h6 class="text-uppercase text-muted"><strong>{{ $sbevent->title }}</strong></h6></a>
      <ul class="list-inline">
        <li class="list-inline-item"><small><i class="fa fa-clock-o" aria-hidden="true"></i>{{ \Carbon\Carbon::parse($sbevent->start)->format('H.i') }} - {{ \Carbon\Carbon::parse($sbevent->end)->format('H.i') }}</li></small>
  </div>
  </div>
  @endif
  @endforeach

  <a class="twitter-timeline" data-height="400" href="https://twitter.com/opplanere?ref_src=twsrc%5Etfw">Tweets by opplanere</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

  <iframe src="https://discordapp.com/widget?id=83630081964011520&theme=dark" width="100%" height="350" allowtransparency="true" frameborder="0"></iframe>



</div>
