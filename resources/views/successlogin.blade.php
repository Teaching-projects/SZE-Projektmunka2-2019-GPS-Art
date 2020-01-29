@extends('layouts.header')

@section('title', 'Főoldal')

@section('size', '100%')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="js.js"></script>

<p>Kiemelt szponzorunk a: </p>
<div>
  <img height="100px" src="http://adampapp.ddns.net/projektmunka/css/placeholder.svg" alt="" style="max-height:100%; max-width:100%;"/>
</div>

<div class="card w3-animate-opacity" style="background-color:rgba(100,100,100,0.1);"> 
<h2  style="text-align: center">Üdvözöljük, {{ Auth::user()->name}}!</h2>
  <p style="height: 50px"></p>
  <h3>Általános információ</h3>
  <p> A felületen feltöltheti és szinkronizálhatja saját futási track-jeit, létrehozhat útvonal figurákat, 
  és lehetősége van módosítani saját fiókját, és adatait is.
  <br>Az alábbi kártyák leírással segítik az oldal használatát.</p>
</div>


<div class="card-deck w3-animate-bottom">

    <div ng-controller="AppController">
          <div class="card-deck">
            <div ng-repeat="card in cards" class="card" >        
               <div class="card-body"><h5 class="card-title">@{{card.Name}}</h5>
                      <p class="card-text">@{{card.Description}}</p>
                    </div>
                      </div>
    
    </div>
    </div>

@if(isset(Auth::user()->email) && Auth::user()->superuser)

<div ng-controller="AdminController">
          <div class="card-deck">
            <div ng-repeat="card in oldcards" class="card" >        
               <div class="card-body"><h5 class="card-title">@{{card.Name}}</h5>
                      <p class="card-text">@{{card.Description}}</p>
                    </div>
                      </div>
    
    </div>
    </div>
    </div>
      @endif
@endsection