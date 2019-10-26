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
     
      <div class="w3-animate-opacity" style=" text-align:left; float:left;display: table; z-index: 1; margin: 0px auto; width: 100%;">
      <div class="card" style=" float:center;">
     <div  style=" text-align: center; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 5px;">
       <h3>Válassza ki a lezárni/feloldani kívánt időszakot!</h3>
   
    <table> 
        <tr>
        <td style="text-align:center; width:50px">
    <form method="post" action="/projektmunka/lezar" style="font-size:20px">
    <p style="font-size:25px">Lezárás</p>
    {{ csrf_field() }}
    <select name="ev" id="ev" >
        <option value="2019">2019</option>
        <option value="2018"> 2018</option>
        <option value="2020">2020</option>
    </select>
    <select name="honap" id="honap">
        <option value="01"> Január</option>
        <option value="02"> Február</option>
        <option value="03"> Március</option>
        <option value="04"> Április</option>
        <option value="05"> Május</option>
        <option value="06"> Június</option>
        <option value="07"> Július</option>
        <option value="08"> Augusztus</option>
        <option value="09"> Szeptember</option>
        <option value="10"> Október</option>
        <option value="11"> November</option>
        <option value="12"> December</option>
    </select><br>

    <p style="height:20px"></p>
    <button type="submit" style="background-color:#ff6666; width:50%; font-size:15px; ">Lezár</button>
    </form>
    </td>
    <td style="text-align:center; width:50px">
    <form method="post" action="/projektmunka/felold" style="font-size:20px">
        <p style="font-size:25px">Feloldás</p>
        {{ csrf_field() }}
        <select name="ev" id="ev">
            <option value="2019">2019</option>
            <option value="2018"> 2018</option>
            <option value="2020">2020</option>
        </select>
        <select name="honap" id="honap">
            <option value="01"> Január</option>
            <option value="02"> Február</option>
            <option value="03"> Március</option>
            <option value="04"> Április</option>
            <option value="05"> Május</option>
            <option value="06"> Június</option>
            <option value="07"> Július</option>
            <option value="08"> Augusztus</option>
            <option value="09"> Szeptember</option>
            <option value="10"> Október</option>
            <option value="11"> November</option>
            <option value="12"> December</option>
        </select><br>
    <p style="height:20px"></p>
        <button type="submit" style="background-color:#66ff66; width:50%; font-size:15px;">Felold</button>
    </form> 
    </td>
        </tr>
    </table>
    </div>
    </div>
   </div>
  @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong style="font-size: 25px">{{ $message }}</strong>
   </div>
   @endif
<p></p>
<a href="http://adampapp.ddns.net/projektmunka/successlogin"><button type="submit" style="display:table;margin:0 auto">Vissza</button></a>
</div>
  </body>
</html>