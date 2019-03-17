@php
    $listComment = \App\Comment::where('code',$codeOfCmt)->get();
    $acc = Session::get('acc');
@endphp


@if(Session::get('acc')==null)
    <h3><b>Required login to view and add comment</b></h3>
@endif

@if(Session::get('acc')!=null)
    <h3><b>Latest comment:</b></h3>
    <br>
    <div style="margin-left: 5%">
        <p id="down"></p>
        @foreach($listComment as $comment)
            <p><b style="color: red"><a href="/profile/{{$acc->username}}">{{$acc->username}}</a></b>: {{$comment->comment}}</p>
            <hr>
        @endforeach

        <div class="input-group">
            <input style="display: none" type="text" value="{{$codeOfCmt}}" id="mycode">
            <input aria-describedby="btnAnswerQuestion" type="text" id="my-question"
                   placeholder="Add your comment" class="form-control">
            <span id="btnAnswerQuestion" style="background-color: green;color: white"
                  class="input-group-addon"><span class="glyphicon glyphicon-send"></span></span>
            <p id="thongbao" style="color: red"></p>
        </div>
    </div>
@endif

<script>
    $(document).ready(function () {
        $('#btnAnswerQuestion').on('click', function () {
            $.ajax({
                url: '/comment/add-new',
                data: {
                    code: $('#mycode').val(),
                    comment: $('#my-question').val()
                },
                success: function (data) {
                    if (data.status === 'ok') {
                        @if($acc!=null)
                        $('#down').append('<p><b style="color: red"><a href="/profile/{{$acc->username}}">{{$acc->username}}</a></b>: ' + $('#my-question').val() + '</p>\n' +
                            '                        <hr>');
                        @endif
                        $('#my-question').val('');
                    }
                }
            });
        });
        $('#my-question').on('keyup', function (e) {
            if (e.keyCode === 13)
                $.ajax({
                    url: '/comment/add-new',
                    data: {
                        code: $('#mycode').val(),
                        comment: $('#my-question').val()
                    },
                    success: function (data) {
                        if (data.status === 'ok') {
                            @if($acc!=null)
                            $('#down').append('<p><b style="color: red"><a href="/profile/{{$acc->username}}">{{$acc->username}}</a></b>: ' + $('#my-question').val() + '</p>\n' +
                                '                        <hr>');
                            @endif
                            $('#my-question').val('');
                        }
                    }
                });
        })
    });
</script>