<!DOCTYPE html>
<html>
 <head>
  <title>@yield('title')</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="./js.js"></script>
  <link rel="stylesheet" href="http://adampapp.ddns.net/projektmunka/css/style.css" type="text/css">
 </head>
 <body ng-app="ProjectsCards">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="https://res.cloudinary.com/im2015/image/upload/w_1000//blog/running_cover_1.jpg" class="d-block w-100" style="height:180px; object-fit:cover;object-position:10% -250px" alt="...">
    </div>
    <div class="carousel-item">
    <img src="https://i.kym-cdn.com/entries/icons/original/000/028/021/work.jpg" class="d-block w-100" style="height:180px; object-fit:cover;object-position:10% -250px" alt="...">
    </div>
    <div class="carousel-item">
    <img src="https://d368g9lw5ileu7.cloudfront.net/races/races-72xxx/72460/raceBanner-U2jga3Z7-bCzFue.png" class="d-block w-100" style="height:180px; object-fit:cover;object-position:10% -250px" alt="...">
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
@if(isset(Auth::user()->email)) 

       
<div class="topnav " style="font-size:13px;">
  <a href="{{ route('successlogin') }}">Kezdőoldal</a>
  <a href="{{ route('drawfigure') }}">Futófigura rajzolása</a>
  <a href="{{ route('uploadtrack') }}">Track fájl feltöltése</a>
 <a href="{{ route('showdifference') }}">Figurák hasonlítása</a>
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

<a href="{{ route('successlogin', ['user' => ['id' => Auth::user()->id]]) }}"><button type="submit" style="display:table;margin:0 auto;4:14 2020. 01. 30." class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Vissza</button></a>
@else
    <script>window.location = "/projektmunka";</script>
@endif
 </body>
</html>