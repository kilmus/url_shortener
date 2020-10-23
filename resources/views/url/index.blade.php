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
<form action="{{route('url.store')}}" method="post">

        {{ csrf_field() }}
        <div class="form-group" align="center">
            <label for=""><input type="text" name="url_old" id=""></label>        
            <label for=""><input type="submit" value="ย่อลิ้งค์"></label>
        </div>
        
    </form>

    
</div>






{{-- <a href="{{route('/url/'.$urls->url_code)}}" target="_blank"> {{$urls->url_code}} </a> --}}


@endsection