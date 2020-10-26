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
            <label for=""><input type="text" name="url_old" id="" placeholder="ลื่งค์ที่ต้องการย่อ"></label>        
            
            <label for=""><input type="text" name="url_code" id="" placeholder="ชื่อย่อลิ้งค์ใส่ได้ 5 ตัวอักษรภาษาอังกฤษ" maxlength="5"></label>
            <label for=""><input type="text" name="url_password" id="" placeholder="รหัสผ่าน"></label>
            <label for=""><input type="submit" value="ย่อลิ้งค์"></label><br>
        </div>
        
    </form>

    
</div>






{{-- <a href="{{route('/url/'.$urls->url_code)}}" target="_blank"> {{$urls->url_code}} </a> --}}


@endsection