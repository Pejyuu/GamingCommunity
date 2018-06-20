<nav class="col toplinks">
  <a href="{{ route('index')}}">Home</a> |
  <a href="{{ url('/p/about')}}">About</a> |
  <a href="{{ url('/p/contact')}}">Contact</a> |
  <a href="{{ url('/p/privacy')}}">Privacy Policy</a>
  <span style="float: right;">
    @Auth
    Vælkømmin te gards, <a href="#">{{ Auth::user()->name }}</a> | @can('access.dashboard')<a href="{{ route('dashboard') }}">Dashboard</a> |@endcan <a href="{{ route('logout')}}">Log Out</a></span>
    @else
    <a href="{{ route('login')}}">Log In</a></span>
    @endauth
  </span>

</nav>
