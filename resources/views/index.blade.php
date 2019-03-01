@extends('templates')
@section('content')
   <p style="color: blue; font-family:Consolas; font-size: 15px ">{{$message}}</p>
    <br>
    <label for="lan">Type of question</label>
   <form action="/question/start-now" method="get">
    <select name="lan" id="lan" class="form-control">
        @foreach($lang as $l)
        <option value="{{$l->lang}}"> {{$l->name}} </option>
            @endforeach
    </select>
    <br>
    <div align="center">
        <input type="submit" name="btn" id="btn" class="btn-success" value="Start now!">
    </div>
   </form>
@endsection
