<!DOCTYPE html>
<html>
 <head>
  <title>Bejelentkezés</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="http://adampapp.ddns.net/projektmunka/css/style.css" type="text/css">
 </head>
 <body>
  <br />
   <div class="topnav">
  <a ></a>
</div>
<div class="header">
  <h1 style="font-family:helvetica;">Figure Running</h1>
  <p style="font-family:helvetica;">Jelentkezzen be az futások kezeléséhez!</p>
  
</div>
<div style=" text-align:center; float:center;display: table; z-index: 1; margin: 0px auto; width: 35%;">
   
   
  @if(isset(Auth::user()->email))
    <script>window.location="http://adampapp.ddns.net/projektmunka/successlogin";</script>
   @endif 

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
<div style=" text-align: center; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 5px;">    
  <div class="card" style=" float:center;">
   <h3 align="center">Bejelentkezés</h3><br />
    <form method="post" action="{{ url('/checklogin') }}">
     {{ csrf_field() }} 
     <div >
      <label>Email cím:</label>
      <br>
      <input placeholder="Írja be e-mail címét" type="email" name="email"  />
     </div>
     <div >
      <label>Jelszó:</label>
      <br>
      <input type="password" name="password" placeholder="Írja be jelszavát" />
     </div>

     <div class="buttoncontainer">
             <input type="submit" name="login"  class="button" value="Bejelentkezés" />
          </div>  
    </form>
  </div>
</div>
  </div>
 </body>
</html>