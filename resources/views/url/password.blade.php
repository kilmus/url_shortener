@extends('layouts.main')
@section('body')



<form action="{{route('url.check',['check'=>$urls->url_code])}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group" align="center">
        
        <label for=""><input type="password" name="url_password" id="" placeholder="รหัสผ่าน"></label>
        <label for=""><input type="submit" value="ย่อลิ้งค์"></label><br>
    </div>
</form>


<a href="{{route('url.index')}}" class="btn btn-primary" style="margin-top:15px;" >กลับไปหน้าแรก</a>
    
@endsection