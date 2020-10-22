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

 <a href="{{route('url.url',['url'=>$url->id])}}" target="_blank"> <span>https://www.url_shortner/{{$url->url_code}}</span> </a> 
@endsection