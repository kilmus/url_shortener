@extends('layouts.main')
@section('body')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

 <a href="{{route('url.url',['url'=>$url->id])}}" target="_blank"> <span>https://www.url_shortner/{{$url->url_code}}</span> </a> 

 <div class="container">
    <input id="text" type="hidden" value="{{$url->url_old}}" style="width:80%" /><br />
    <div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>

    
 <a href="{{route('url.index')}}" class="btn btn-primary" style="margin-top:15px;">กลับไปหน้าแรก</a>
 </div>








 <br>
 <br>


















 @section('js')
 <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/qrcode.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/qrcode.min.js')}}"></script>
     
 <script type="text/javascript">
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
 @stop

 @endsection