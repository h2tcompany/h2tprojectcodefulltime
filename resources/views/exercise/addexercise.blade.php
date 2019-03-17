@extends('templates')
@php
    $acc = Session::get('acc');
@endphp
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
        <form action="/exercises/add-new" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Code for exercise</label>
                <input type="text" class="form-control" name="codeexercise" placeholder="Code for exercise"
                       required="required">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name of exercise"
                       required="required">
            </div>
            <div class="form-group">
                <label for="question">Question</label>
                <textarea id="code" name="question"></textarea>
            </div>
            <div class="form-group">
                <label for="question">Test case 1 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase1" id="testcase1" placeholder="Test case 1"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Output 1</label>
                <input type="text" class="form-control" name="output1" id="output1" placeholder="Output 1"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Test case 2 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase2" id="testcase2" placeholder="Test case 2"
                       required="required">
            </div>


            <div class="form-group">
                <label for="question">Output 2</label>
                <input type="text" class="form-control" name="output2" id="output2" placeholder="Output 2"
                       required="required">
            </div>


            <div class="form-group">
                <label for="question">Test case 3 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase3" id="testcase3" placeholder="Test case 3"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Output 3</label>
                <input type="text" class="form-control" name="output3" id="output3" placeholder="Output 3"
                       required="required">
            </div>


            <div class="form-group">
                <label for="question">Test case 4 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase4" id="testcase4" placeholder="Test case 4"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Output 4</label>
                <input type="text" class="form-control" name="output4" id="output4" placeholder="Output 4"
                       required="required">
            </div>


            <div class="form-group">
                <label for="question">Test case 5 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase5" id="testcase5" placeholder="Test case 5"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Output 5</label>
                <input type="text" class="form-control" name="output5" id="output5" placeholder="Output 5"
                       required="required">
            </div>


            <div class="form-group">
                <label for="question">Test case 6 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase6" id="testcase6" placeholder="Test case 6"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Output 6</label>
                <input type="text" class="form-control" name="output6" id="output6" placeholder="Output 6"
                       required="required">
            </div>


            <div class="form-group">
                <label for="question">Test case 7 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase7" id="testcase7" placeholder="Test case 7"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Output 7</label>
                <input type="text" class="form-control" name="output7" id="output7" placeholder="Output 7"
                       required="required">
            </div>


            <div class="form-group">
                <label for="question">Test case 8 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase8" id="testcase8" placeholder="Test case 8"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Output 8</label>
                <input type="text" class="form-control" name="output8" id="output8" placeholder="Output 8"
                       required="required">
            </div>


            <div class="form-group">
                <label for="question">Test case 9 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase9" id="testcase9" placeholder="Test case 9"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Output 9</label>
                <input type="text" class="form-control" name="output9" id="output9" placeholder="Output 9"
                       required="required">
            </div>


            <div class="form-group">
                <label for="question">Test case 10 (Example: 1 ,2, 3, )</label>
                <input type="text" class="form-control" name="testcase10" id="testcase10" placeholder="Test case 10"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Output 10</label>
                <input type="text" class="form-control" name="output10" id="output10" placeholder="Output 10"
                       required="required">
            </div>

            <div class="form-group">
                <label for="question">Time limit</label>
                <input type="text" class="form-control" name="timelimit" id="timelimit" placeholder="Test case 10"
                       required="required">
            </div>
            <input type="submit" value="Add exercise" class="btn btn-success">
        </form>
    </div>
    <div class="col-sm-3">

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
            mode: {name: "markdown", globalVars: true},
            lineWrapping: true,
            foldGutter: true,
            gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
            theme: 'dracula'
        });
    </script>

@endsection