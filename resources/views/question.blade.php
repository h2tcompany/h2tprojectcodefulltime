@extends('templates')

@section('content')
    <style>
        .CodeMirror {
            border: 1px solid black;
            font-size: 13px
        }

        .cm-header {
            font-family: arial;
        }

        .cm-header-1 {
            font-size: 150%;
        }

        .cm-header-2 {
            font-size: 130%;
        }

        .cm-header-3 {
            font-size: 120%;
        }

        .cm-header-4 {
            font-size: 110%;
        }

        .cm-header-5 {
            font-size: 100%;
        }

        .cm-header-6 {
            font-size: 90%;
        }

        .cm-strong {
            font-size: 140%;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: black;
            color: white;
            text-align: center;
        }
    </style>
    <div class="col-sm-9">
        <form action="/question/addQuestionProcess" method="get">
            {{csrf_field()}}
            @if($question->style == 'plain/text' || $question->style == 'text/html')
                <h3><b>Content</b></h3>
                <p style="font-size: 25px;font-family: Arial; color: #AF2018"><b>{!! $question->ques !!}</b></p>
                <hr>
            @elseif($question->style == 'markdown')
                <h3><b>Content</b></h3>
                <div id="content"></div>
                <hr>
            @else
                <textarea id="code" name="code">{{$question->ques}}</textarea>
            @endif
            <input type="text" id="codeid" name="codeid" style="display: none" value="{{$question->code}}">
            <p>Style of code:
                <select class="form-control" name="style" id="language">
                    <option value="plain/text">{{$question->getLang->name}}</option>
                </select>
            </p>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p id="re1" style="font-size: 15px"><b style="color: blue"> A: </b> {{$question->re1}}</p><br>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p id="re2" style="font-size: 15px"><b style="color: blue"> B: </b> {{$question->re2}}</p><br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p id="re3" style="font-size: 15px"><b style="color: blue"> C: </b> {{$question->re3}}</p><br>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p id="re4" style="font-size: 15px"><b style="color: blue"> D: </b> {{$question->re4}}</p><br>
                </div>
            </div>
            <p>Đáp án của bạn</p>
            <select name="result" id="result" class="form-control">
                <option style="color: red" value="A"> -- A --</option>
                <option style="color: red" value="B"> -- B --</option>
                <option style="color: red" value="C"> -- C --</option>
                <option style="color: red" value="D"> -- D --</option>
            </select>
            <br>
        </form>
        <p><strong style="color: red" id="sai"></strong></p>
        <p><strong style="color: green" id="dung"></strong></p>
        <button type="button" id="checkResult" class="btn btn-success">Check result of question</button>
        <br>
        @include('comment')
        <br>
    </div>
    <div class="col-sm-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Information</div>
            <div class="panel-body">
                @if(Session::get('acc')!=null)
                    <p>Your score: {{Session::get('acc')->score}} </p>
                    <p>Your team: {{Session::get('acc')->teamleader}} </p>
                @endif
                <p>Current score: {{Session::get('score')}}</p>
                <p>Code question: {{$question->code}}</p>
            </div>
        </div>

        @include('toprank')
        @include('recentpaste')
    </div>

    <script>
        $('#typeqs').attr('disabled', true);
        $('#language').attr('disabled', true);
        var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
            lineNumbers: true,
            styleActiveLine: true,
            matchBrackets: true,
            readOnly: 'nocursor',
            extraKeys: {
                "F11": function (cm) {
                    cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                },
                "Esc": function (cm) {
                    if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                },
                "Ctrl-Space": "autocomplete",
                "Alt-F": "findPersistent",
                "Ctrl-Q": function (cm) {
                    cm.foldCode(cm.getCursor());
                }
            },
            scrollbarStyle: "simple",
            mode: {name: "{{$question->lang}}", globalVars: true},
            lineWrapping: true,
            foldGutter: true,
            gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
            theme: 'dracula'
        });
        var input = document.getElementById("select");

        function selectTheme() {
            var theme = input.options[input.selectedIndex].textContent;
            editor.setOption("theme", theme);
            location.hash = "#" + theme;

        }

        function selectLanguage() {
            var lang = document.getElementById('language').value;
            console.log(lang);
            editor.setOption('mode', {name: lang, globalVars: true});
        }


        var choice = (location.hash && location.hash.slice(1)) ||
            (document.location.search &&
                decodeURIComponent(document.location.search.slice(1)));
        if (choice) {
            input.value = choice;
            editor.setOption("theme", choice);
        }
        CodeMirror.on(window, "hashchange", function () {
            var theme = location.hash.slice(1);
            if (theme) {
                input.value = theme;
                selectTheme();
            }
        });

    </script>
    <script>
        $(document).ready(function () {
            $('#checkResult').on('click', function () {
                $.ajax({
                    url: '/question/checkresult',
                    data: {
                        codeid: $('#codeid').val(),
                        result: $('#result').val()
                    },
                    method: "GET",
                    success: function (data) {
                        if (data.stt === 'dung') {
                            $('#dung').html('Chúc mừng. Đáp án bạn chọn là đáp án đúng.');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else if (data.stt === 'sai') {
                            $('#sai').html('Tiếc quá. Đáp án bạn chọn là đáp án sai. Bạn sẽ phải chơi lại từ đầu.');
                            setTimeout(window.location.href = '/?info=sai', 3500);
                        }
                    }
                })
            })
        })
    </script>
@endsection
