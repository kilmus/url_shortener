<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Url Shortner</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style>


    </style>
    @yield('css')
</head>
<body>
    <div class="container">
        <h1 align="center">Url Shortener</h1>
        
    </div>

    @yield('body')


    <script>
    var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 100,
	height : 100
});
    
function makeCode () {		
	var elText = document.getElementById("text");
	
	if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
    </script>

@yield('js')
<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/qrcode.js"></script>
    <script type="text/javascript" src="js/qrcode.min.js"></script>
</body>
</html>