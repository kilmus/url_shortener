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



 

 <div class="container">
    <div class="input-group">
       
        <input id="urlbox" class="form-control cz-shorten-input" readonly name="url" value="{{url($url->url_code)}}"  type="text">
        <span class="input-group-btn">
            <button class="btn btn-large btn-primary cz-shorten-btn" type="submit" id="copy-button">Copy!</button>
        </span>
    </div>

    <a id="urlbox" href="{{route('url.url',$url)}}" target="_blank" name="url"> <span>{{$url->url_code}}</span> </a> 
    
   
    
    <input id="text" type="hidden" value="{{$url->url_old}}" style="width:80%" /><br />
    
    <div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>

    
 <a href="{{route('url.index')}}" class="btn btn-primary" style="margin-top:15px;">กลับไปหน้าแรก</a>
 <a href="{{route('url.location',['url'=>$url->id])}}" class="btn btn-primary" style="margin-top:15px;">ไปหน้าดังกล่าว</a>
 </div>




 <br>
 <br>







 @endsection