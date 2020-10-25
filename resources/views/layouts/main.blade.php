<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Url Shortner</title>
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
		<h1 align="center">Url Shortener</h1>
		
        @yield('body')
    </div>

    
	


<!-- jQuery and JS bundle w/ Popper.js -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/qrcode.js')}}"></script>
	
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

<script type="text/javascript">
    function countdown() {
        
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML) <= 0) {
            document.getElementById("cz").innerHTML = "Now !";
            location.href = 'https://www.geeksforgeeks.org/generating-random-string-using-php/';
        }
        i.innerHTML = parseInt(i.innerHTML) - 1;
    }
    setInterval(function() {
        countdown();
    }, 1000);
</script>


<script type="text/javascript">
	$(document).ready(function() {
		$("#copy-button").click(function () {
			$(this).html("Copied!");
			$("#urlbox").select();
			document.execCommand("copy");
		});
	});
</script>


<script>
	import QRCode from 'qrcode'
 
 // With promises
 QRCode.toDataURL('I am a pony!')
   .then(url => {
	 console.log(url)
   })
   .catch(err => {
	 console.error(err)
   })
 
 // With async/await
 const generateQR = async text => {
   try {
	 console.log(await QRCode.toDataURL(text))
   } catch (err) {
	 console.error(err)
   }
 }  
  </script>
@yield('js')


</body>
</html>