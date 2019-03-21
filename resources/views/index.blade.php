@extends('templates')
@section('content')
    <div class="col-sm-3">
        @include('toprank')
        @include('topcoder')
        @include('exercise.newexercise')
    </div>
    <div class="col-sm-6">
        <div class="rule">
            <h3>Luật:</h3>
            <p>Các bài tập sẽ được làm dưới dạng trắc nghiệm A, B, C, D. Thời gian không giới hạn</p>
            <p>Mỗi câu đúng được 1 điểm. Điểm sau khi kết thúc 1 lượt kiểm tra là số câu trả lời đúng liên tiếp.</p>
            <p>Điểm của bạn sẽ là điểm cao nhất trong tất cả các lượt kiểm tra.</p>
            <p>Lưu ý: 1 câu sai sẽ làm cho quá trình kiểm tra kết thúc</p>
            <hr>
            <h1>Chú ý:</h1>
            <strong>Nếu các bạn không đăng nhập điểm của bạn sẽ không được ghi nhận. </strong>
        </div>
        <br>

        <form action="/question/start-now" method="get">
            <div class="form-group">
                <label for="lan">Type of question</label>
                <select name="lan" id="lan" class="form-control">
                    @foreach($lang as $l)
                        @if($l->status != 'hide')
                            <option value="{{$l->lang}}"> {{$l->name}} </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="lan">Your team: </label>
                <select name="team" id="team" class="form-control">
                    @foreach($teams as $team)
                        @if($team->status != 'hide')
                            <option value="{{$team->team}}"> {{$team->name}} </option>
                        @endif
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
