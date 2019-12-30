@extends('layouts.header')

@section('title', 'Figura rajzolása')

@section('size', '100%')

@section('content')

<script type="text/javascript">
    // Variables for referencing the canvas and 2dcanvas context
    var canvas,ctx;

    // Variables to keep track of the mouse position and left-button status 
    var mouseX,mouseY,mouseDown=0;

    // Draws a dot at a specific position on the supplied canvas name
    // Parameters are: A canvas context, the x position, the y position, the size of the dot
    function drawDot(ctx,x,y,size) {
        // Let's use black by setting RGB values to 0, and 255 alpha (completely opaque)
        r=0; g=0; b=0; a=255;

        // Select a fill style
        ctx.fillStyle = "rgba("+r+","+g+","+b+","+(a/255)+")";

        // Draw a filled circle
        ctx.beginPath();
        ctx.arc(x, y, size, 0, Math.PI*2, true); 
        ctx.closePath();
        ctx.fill();
    } 

    // Clear the canvas context using the canvas width and height
    function clearCanvas(canvas,ctx) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

    // Keep track of the mouse button being pressed and draw a dot at current location
    function sketchpad_mouseDown() {
        mouseDown=1;
        drawDot(ctx,mouseX,mouseY,8);
    }

    // Keep track of the mouse button being released
    function sketchpad_mouseUp() {
        mouseDown=0;
    }

    // Keep track of the mouse position and draw a dot if mouse button is currently pressed
    function sketchpad_mouseMove(e) { 
        // Update the mouse co-ordinates when moved
        getMousePos(e);

        // Draw a dot if the mouse button is currently being pressed
        if (mouseDown==1) {
            drawDot(ctx,mouseX,mouseY,8);
        }
    }

    // Get the current mouse position relative to the top-left of the canvas
    function getMousePos(e) {
        if (!e)
            var e = event;

        if (e.offsetX) {
            mouseX = e.offsetX;
            mouseY = e.offsetY;
        }
        else if (e.layerX) {
            mouseX = e.layerX;
            mouseY = e.layerY;
        }
     }


    // Set-up the canvas and add our event handlers after the page has loaded
    function init() {
        // Get the specific canvas element from the HTML document
        canvas = document.getElementById('sketchpad');

        // If the browser supports the canvas tag, get the 2d drawing context for this canvas
        if (canvas.getContext)
            ctx = canvas.getContext('2d');

        // Check that we have a valid context to draw on/with before adding event handlers
        if (ctx) {
            canvas.addEventListener('mousedown', sketchpad_mouseDown, false);
            canvas.addEventListener('mousemove', sketchpad_mouseMove, false);
            window.addEventListener('mouseup', sketchpad_mouseUp, false);
        }
    }
</script>
<script>
$(document).ready(function(){

var element = $("#html-content-holder"); // global variable
var getCanvas; // global variable

$("#btn-Preview-Image").on('click', function () {
html2canvas(element, {
allowTaint : true,
onrendered: function (canvas) {
$("#previewImage").append(canvas);
getCanvas = canvas;
}
});
});

$("#btn-Convert-Html2Image").on('click', function () {
var imgageData = getCanvas.toDataURL();
// Now browser starts downloading it instead of just showing it
var newData = imgageData.replace("image/png", "imviage/octet-stream");
$("#btn-Convert-Html2Image").attr("download", "VaishIvfBiodata.png").attr("href", newData);
});

});
function download_image(){
  var canvas = document.getElementById("sketchpad");
  image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
  var link = document.createElement('a');
  link.download = "my-image.png";
  link.href = image;
  link.click();
}
    function prepareImg() {
     var canvas = document.getElementById('sketchpad');
     document.getElementById('canvasimg').value = canvas.toDataURL();
  }
</script>
<style>
#sketchpadapp {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.leftside {
    float:left;
    width:450px;
    height:380px;
	color:white;
    background-color:#002473;
    padding:10px;
    border-radius:4px;
}
.rightside {
    float:left;
    margin-left:10px;
}
#sketchpad {
    float:left;
    border:2px solid #888;
    border-radius:4px;
    position:relative; /* Necessary for correct mouse co-ords in Firefox */
}
</style>
 <link rel="stylesheet" href="./css/style.css">

<body onload="init()">
<main class="mdl-layout__content" style="padding-top:40px">
    <div class="page-content"><!-- Your content goes here -->

    
<div class="jumbotron" style="padding-top:10px;">
  <h1 class="display-4">Rajz készítése, vagy feltöltése</h1>
  <p class="lead">Készíts saját rajzot, vagy válaszd ki azt a rajzot, amelyiket fel szeretnéd tölteni!</p>
  <hr class="my-4">
    <div id="sketchpadapp" >
    <div class="card-deck">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Meglévő rajz feltöltése</h5>
      <div class="card-text"><form method="post" action="/projektmunka/drawfigure" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="text" class="form-control mdl-textfield__input" id="name" name="name" required="required" >
                    <label class="mdl-textfield__label" for="name">Rajz neve</label>
                </div>
			</div>
            <div class="file-upload form-group">
                <label for="upload" class="file-upload__label">Rajz kiválasztása</label>
                <input id="upload" class="file-upload__input form-control" id="rajz" name="rajz" accept=".png" required="required" type='file'>
            </div>
			<div class="form-group">
			  <button style="cursor:pointer" type="submit" class="btn btn-success">Feltölt</button>
			</div>
		</form>	</div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Rajz készítése</h5>
      <div class="card-text"><form method="post" action="/projektmunka/savetoserver" enctype="multipart/form-data" onsubmit="prepareImg()">
        {{ csrf_field() }}
			<div class="form-group">
			<p>Itt elkészítheted a feltöltésre szánt rajzodat, majd le is töltheted.</p>		
            <canvas id="sketchpad" height="300" width="400">
            </canvas>
            <button style="cursor:pointer" class="btn btn-success" type="submit" >Mentés szerverre</button>
			</div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="text" class="form-control mdl-textfield__input" id="name" name="name" required="required" >
                    <label class="mdl-textfield__label" for="name">Rajz neve</label>
                </div>
            <input type="hidden" id="canvasimg" name="canvasimg" />
		</form>	 
        <button onclick="download_image()" class="btn btn-success">Letöltés</button>
        <button onclick="clearCanvas(canvas,ctx);" class="btn btn-danger">Rajzlap törlése </button></div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</main>

</body>

@endsection