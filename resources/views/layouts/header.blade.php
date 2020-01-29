<!DOCTYPE html>
<html>
 <head>
  <title>@yield('title')</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="./js.js"></script>
  <link rel="stylesheet" href="http://adampapp.ddns.net/projektmunka/css/style.css" type="text/css">
 </head>
 <body  ng-app="ProjectsCards">

@if(isset(Auth::user()->email))

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="https://res.cloudinary.com/im2015/image/upload/w_1000//blog/running_cover_1.jpg" class="d-block w-100" style="height:180px; object-fit:cover;object-position:10% -250px" alt="...">
    </div>
    <div class="carousel-item">
    <img src="https://res.cloudinary.com/im2015/image/upload/w_1000//blog/running_cover_1.jpg" class="d-block w-100" style="height:180px; object-fit:cover;object-position:10% -250px" alt="...">
    </div>
    <div class="carousel-item">
    <img src="https://res.cloudinary.com/im2015/image/upload/w_1000//blog/running_cover_1.jpg" class="d-block w-100" style="height:180px; object-fit:cover;object-position:10% -250px" alt="...">
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
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title"><a href="{{ route('successlogin') }}" style="color:white; padding-left:10px;" >Kezdőoldal</a></span>
      <div class="mdl-layout-spacer"></div>
      <nav class="mdl-navigation" >
      <a style="color:white; padding-left:10px;" href="{{ route('drawfigure') }}">Futófigura rajzolása</a>
      <a style="color:white; padding-left:10px;" href="{{ route('uploadtrack') }}">Track fájl feltöltése</a>
      <a style="color:white; padding-left:10px;" href="{{ route('showdifference') }}">Figurák hasonlítása</a>
      <a style="color:white; padding-left:10px;" href="{{ route('synctrack') }}">Track fájl szinkronizálása (Strava)</a>
      
@if(isset(Auth::user()->email))
   <a style="color:white; padding-left:10px;" href="{{ route('my') }}">Adataim</a>
   <a style="color:white; padding-left:10px;" href="{{ route('tracklist', ['user' => ['id' => Auth::user()->id]]) }}">Trackjeim</a>
@endif
@if(isset(Auth::user()->email) && Auth::user()->superuser)
  <a style="color:white; padding-left:10px;" href="{{ route('userlist', ['user' => ['id' => Auth::user()->id]]) }}">Felhasználók kezelése</a>
@endif
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Title</span>
    <nav class="mdl-navigation">
    @if(isset(Auth::user()->email) && Auth::user()->superuser)
      <a class="mdl-navigation__link" href="{{ route('drawinglist') }}">Leadott futófigurák kezelése</a>
      <a class="mdl-navigation__link" href="{{ route('competitionlist') }}">Kiírt versenyek kezelése</a>
      @endif
    </nav>
  </div>
</div>

  <a href="{{ url('/logout') }}" style="float:right;"> Kijelentkezés </a>
</div>

 <div class="w3-animate-opacity" style=" text-align:center; float:center; display:table; z-index:1; margin: 0px auto; width: @yield('size');">

    <div style=" float:center; margin: 10px;">
        
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

<!-- <a href="{{ route('successlogin', ['user' => ['id' => Auth::user()->id]]) }}"><button type="submit" class="btn btn-secondary" style="display:table;margin:0 auto">Vissza</button></a> -->
@else
    <script>window.location = "/projektmunka";</script>
@endif
 </body>
</html>