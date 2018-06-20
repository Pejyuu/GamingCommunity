<nav class="col navbar navbar-expand-lg navbar-light main-navbar">
    <a class="navbar-brand" href="#"><img height="30px" src="{{ asset('img/brand.png')}}" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('index') }}">Hjem <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('blurbs')}}" title="Nyhetsposter">Blurbs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Merch</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">|</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Oppslagstavle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Magasin</a>
        </li>
      </ul>
    </div>
  </nav>
