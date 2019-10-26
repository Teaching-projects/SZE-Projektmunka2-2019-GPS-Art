<!DOCTYPE html>
<html lang="hu">
<head>
    <link rel="stylesheet" href="http://adampapp.ddns.net/projektmunka/szabi/css/calendar.css">
    <link rel="stylesheet" href="http://adampapp.ddns.net/projektmunka/css/style.css" type="text/css">
    <link rel="shortcut icon" href="">
    <title>
        Naptár
    </title>
    <meta charset="UTF-8">
</head>
<div class="wrapper"> 
    <div class="central w3-animate-opacity"></div>
    <p class="right w3-animate-opacity">{{ Auth::user()->name}}</p>
</div>
     
     
<div class="topnav " style="font-size:13px;">
  <a href="http://adampapp.ddns.net/projektmunka/successlogin">Kezdőoldal</a>
  <a href="http://adampapp.ddns.net/projektmunka/szabadsag/kivesz">Szabadságok leadása</a>
    @if(isset(Auth::user()->email) && Auth::user()->biralhat)
  <a href="http://adampapp.ddns.net/projektmunka/szabadsag/biral">Leadott szabadságok kezelése</a>
  <a href="http://adampapp.ddns.net/projektmunka/lezaras">Leadási időszak kezelése</a>
  @endif
  @if(isset(Auth::user()->email))
   <a href="http://adampapp.ddns.net/projektmunka/my">Saját adatok kezelése</a>
   @endif
  @if(isset(Auth::user()->email) && Auth::user()->adatot_modosithat)
  <a href="http://adampapp.ddns.net/projektmunka/userlist">Felhasználók kezelése</a>
  @endif
  <a href="{{ url('/logout') }}" style="float:right;"> Kijelentkezés </a>
</div>
   <div class="w3-animate-opacity" style=" text-align:center; float:left;display: table; z-index: 1; margin: 0px auto; width: 100%; height: 70%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 5px;">
    <div class="card" style=" float:center;">
        <div id="root">
            <script type="text/javascript" src="http://adampapp.ddns.net/projektmunka/szabi/calendar.bundle.js"></script>
        </div>
    </div>
    </div>
</body>
</html>