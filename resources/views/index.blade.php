@extends('templates')
@section('content')
    <div class="col-sm-3">
        @include('toprank')
        @include('topcoder')
    </div>
    <div class="col-sm-6">
        <br>

        <form action="/question/start-now" method="get">
            <div class="form-group">
                <label for="lan">Type of question</label>
                <select name="lan" id="lan" class="form-control">
                    @foreach($lang as $l)
                        <option value="{{$l->lang}}"> {{$l->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="lan">Your team: </label>
                <select name="team" id="team" class="form-control">
                    @foreach($teams as $team)
                        <option value="{{$team->team}}"> {{$team->name}} </option>
                    @endforeach
                </select>
            </div>
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
