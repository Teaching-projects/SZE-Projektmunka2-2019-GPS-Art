<!DOCTYPE html>
<html>
 <head>
  <title>@yield('title')</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://adampapp.ddns.net/projektmunka/css/style.css" type="text/css">
 </head>
 <body>

@if(isset(Auth::user()->email)) 
<div class="wrapper"> 
   
  <div class="central w3-animate-opacity"></div>
  <p class="right w3-animate-opacity">{{ Auth::user()->name}}</p>
</div>
       
<div class="topnav " style="font-size:13px;">
  <a href="{{ route('successlogin') }}">Kezdőoldal</a>
  <a href="{{ route('drawfigure') }}">Futófigura rajzolása</a>
  <a href="{{ route('uploadtrack') }}">Track fájl feltöltése</a>
  <a href="{{ route('synctrack') }}">Track fájl szinkronizálása (Strava)</a>
@if(isset(Auth::user()->email) && Auth::user()->superuser)
  <a href="{{ route('drawinglist') }}">Leadott futófigurák kezelése</a>
  <a href="{{ route('competitionlist') }}">Kiírt versenyek kezelése</a>
@endif
@if(isset(Auth::user()->email))
   <a href="{{ route('my') }}">Adataim</a>
   <a href="{{ route('tracklist', ['user' => ['id' => Auth::user()->id]]) }}">Trackjeim</a>
@endif
@if(isset(Auth::user()->email) && Auth::user()->superuser)
  <a href="{{ route('userlist', ['user' => ['id' => Auth::user()->id]]) }}">Felhasználók kezelése</a>
@endif
  <a href="{{ url('/logout') }}" style="float:right;"> Kijelentkezés </a>
</div>

 <div class="w3-animate-opacity" style=" text-align:center; float:center; display:table; z-index:1; margin: 0px auto; width: @yield('size'); box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 5px;">

    <div class="card" style=" float:center; margin: 10px;">
        
          @yield('content')

    </div>

@if ($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
@foreach($errors->all() as $error)
      <li>{{ $error }}</li>
@endforeach
    </ul>
  </div>
@endif

  </div>

<a href="{{ route('successlogin', ['user' => ['id' => Auth::user()->id]]) }}"><button type="submit" style="display:table;margin:0 auto">Vissza</button></a>
@else
    <script>window.location = "/projektmunka";</script>
@endif
 </body>
</html>