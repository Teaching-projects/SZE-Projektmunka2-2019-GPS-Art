<!DOCTYPE html>
<html>
 <head>
  <title>Szabadság elbírálás</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="http://adampapp.ddns.net/projektmunka/css/style.css" type="text/css">
 </head>
 <body>
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
  <div class="card w3-animate-opacity" style=" float:center;">
    <div  style=" text-align: center; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">   
        <table >
            <thead >
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Név</th>
                <th scope="col">Kérvényezett nap</th>
                <th scope="col">Engedélyez</th>
                <th scope="col">Elutasít</th>
                <th scope="col">Megjegyzés</th>
                <th></th>
              </tr>
            </thead>
            <tbody >
              @foreach ($szabadsagok as $s)
                <tr ><form method="POST" action="/projektmunka/biral">
                  <td style="font-size:15px">{{ csrf_field() }} {{ $s->id }} <input type="hidden" name="sz_id" value="{{ $s->sz_id }}" /></td>
                  <td style="font-size:15px">{{ $s->name }}</td>
                  <td style="font-size:15px">{{ $s->sznap }}</td>
                  <td style="vertical-align: center">
                  <input type="radio" style="width: 100%; height: 2em;" name="allapot" value="1" id="allapot">
                  </td>
                  <td>
                  <input type="radio" style="width: 100%; height: 2em;" name="allapot" value="2" id="allapot">
                  </td>
                  <td>
                  <input type="text" name="megjegyzes" value="" id="megjegyzes">
                  </td>
                  <td style="width:50px">
                  <button  style="width:100%; font-size:15px;" type="submit" >Lead</button>
                  </td>   
                </form></tr>
              @endforeach
            </tbody>
        </table>
        <p></p>
     </div>
   </div>

<div class="buttoncontainer ">
        <a href="http://adampapp.ddns.net/projektmunka/successlogin"><button class="buttonalign" >Vissza</button></a>
      </div>
  </body>
</html>