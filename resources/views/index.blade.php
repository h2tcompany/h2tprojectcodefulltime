@extends('templates')
@section('content')
    <div class="col-sm-9">
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
                <input type="submit" name="btn" id="btn" class="btn btn-success" value="Start now!">
            </div>
        </form>
    </div>
    <div class="col-sm-3">
        @include('searchingg')
        @include('activity')
        @include('recentpaste')
    </div>
@endsection
