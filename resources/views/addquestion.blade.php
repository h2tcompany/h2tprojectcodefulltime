@extends('templates')

@section('content')
    <style>
        .CodeMirror {
            border: 1px solid black;
            font-size: 13px
        }
        .cm-header { font-family: arial; }
        .cm-header-1 { font-size: 150%; }
        .cm-header-2 { font-size: 130%; }
        .cm-header-3 { font-size: 120%; }
        .cm-header-4 { font-size: 110%; }
        .cm-header-5 { font-size: 100%; }
        .cm-header-6 { font-size: 90%; }
        .cm-strong { font-size: 140%; }

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
            <h3>Question</h3>
            <textarea id="code" name="contentpaste"></textarea><br>
            <p style="color: green">{{Session::get('message')}}</p>
            <button class="btn btn-success">Upload your question</button>

            <p>Select your style:
                <select class="form-control" onchange="selectLanguage()" name="style" id="language">
                    <option value="plain/text">Text</option>
                    <option value="text/x-csrc">C</option>
                    <option value="text/x-c++src">C++</option>
                    <option value="text/x-java">Java</option>
                    <option value="text/x-csharp">C#</option>
                    <option value="text/html">HTML</option>
                    <option value="text/javascript">Javascript</option>
                    <option value="text/x-php">PHP</option>
                </select>
            </p>
            <p>Select a theme: <select class="form-control" onchange="selectTheme()" id=select>

                    <option selected>dracula</option>
                    <option>isotope</option>
                    <option>midnight</option>
                    <option>paraiso-dark</option>
                    <option>the-matrix</option>
                    <option>xq-dark</option>
                </select>
            </p>
            <p>Select your language</p>
            <p>
                <select name="typeqs" id="typeqs" class="form-control">
                    @foreach($lang as $elm)
                        <option value="{{$elm->lang}}"> -- {{$elm->name}} -- </option>
                    @endforeach
                </select>
            </p>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="re1">Đáp án 1</label>
                    <input type="text" name="re1" id="re1" class="form-control" value="" title=""
                           required="required">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="re2">Đáp án 2</label>
                    <input type="text" name="re2" id="re2" class="form-control" value="" title=""
                           required="required">

                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="re3">Đáp án 3</label>
                    <input type="text" name="re3" id="re1" class="form-control" value="" title=""
                           required="required">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="re4">Đáp án 4</label>
                    <input type="text" name="re4" id="re4" class="form-control" value="" title=""
                           required="required">
                </div>
            </div>
            <p>Đáp án đúng</p>
            <input type="text" name="correct" id="correct" class="form-control" value="" title="" required="required">
            <br>
            <br>
            <br>
            <br>
            <br>
            <hr>
        </form>
    </div>
    <div class="col-sm-3">
        @include('recentpaste')
    </div>

    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
            lineNumbers: true,
            styleActiveLine: true,
            matchBrackets: true,
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
            mode: {name: "text/plain", globalVars: true},
            lineWrapping: true,
            foldGutter: true,
            gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
            theme:'dracula'
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
@endsection
