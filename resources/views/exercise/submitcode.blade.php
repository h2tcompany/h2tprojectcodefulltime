@extends('templates')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone.min.js"></script>

    <script>


    </script>

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
    </style>


    <div class="col-sm-9">
        <div class="help">

        </div>
        <div class="form-group">
            <label for="name">Code for exercise</label>
            <input value="{{$exercise->code}}" id="codeexercise" type="text" class="form-control"
                   name="codeexercise"
                   placeholder="Code for exercise"
                   required="required">
        </div>
        <h3>Your code</h3>
        <textarea id="code" name="sourcecode"></textarea><br>
        <p>Select your language:
            <select class="form-control" onchange="selectLanguage()" name="language" id="language">
                <option value="text/x-c++src">C++</option>
                <option value="text/x-java">Java</option>
                <option value="text/x-python">Python 3</option>
                <option value="text/javascript">Javascript</option>
                <option value="text/x-ruby">Ruby</option>
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
        <p style="color: red" id="thongbao"></p>
        @if(Session::get('acc')!=null)
            <button id="btnSubmitCode" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Submit
            </button>
        @else
            <a href="/account/login_page" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Required
                login first</a>
        @endif
        <h1 id="showscore" style="display: none;color: red"></h1>
        <p id="status"></p>
    </div>
    <div class="col-sm-3">
        @include('topcoder')
        @include('exercise.newexercise')
        @include('recentpaste')
    </div>

    <script>
        var dsOutput = [];
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

        var objTarget = {
            output1: {},
            output2: {},
            output3: {},
            output4: {},
            output5: {},
            output6: {},
            output7: {},
            output8: {},
            output9: {},
            output10: {}
        };

        $(document).ready(function () {
            var stdIn = [
                {{$exercise->testcase1}},
                {{$exercise->testcase2}},
                {{$exercise->testcase3}},
                {{$exercise->testcase4}},
                {{$exercise->testcase5}},
                {{$exercise->testcase6}},
                {{$exercise->testcase7}},
                {{$exercise->testcase8}},
                {{$exercise->testcase9}},
                {{$exercise->testcase10}},
            ];
            $('#btnSubmitCode').on('click', function () {
                $('#status').empty();
                $('#showscore').css('display', 'none');
                $('#thongbao').html('Auto test starting');
                get1(stdIn[0]).then(output1 => {
                    objTarget.output1 = output1;
                    $('#thongbao').html('Test case 1 generated');
                    get1(stdIn[1]).then(output2 => {
                        objTarget.output2 = output2;
                        $('#thongbao').html('Test case 2 generated');
                        get1(stdIn[2]).then(output3 => {
                            objTarget.output3 = output3;
                            $('#thongbao').html('Test case 3 generated');
                            get1(stdIn[3]).then(output4 => {
                                objTarget.output4 = output4;
                                $('#thongbao').html('Test case 4 generated');
                                get1(stdIn[4]).then(output5 => {
                                    objTarget.output5 = output5;
                                    $('#thongbao').html('Test case 5 generated');
                                    get1(stdIn[5]).then(output6 => {
                                        objTarget.output6 = output6;
                                        $('#thongbao').html('Test case 6 generated');
                                        get1(stdIn[6]).then(output7 => {
                                            objTarget.output7 = output7;
                                            $('#thongbao').html('Test case 7 generated');
                                            get1(stdIn[7]).then(output8 => {
                                                objTarget.output8 = output8;
                                                $('#thongbao').html('Test case 8 generated');
                                                get1(stdIn[8]).then(output9 => {
                                                    objTarget.output9 = output9;
                                                    $('#thongbao').html('Test case 9 generated');
                                                    get1(stdIn[9]).then(output10 => {
                                                        objTarget.output10 = output10;
                                                        $('#thongbao').html('Test case 10 generated');
                                                        var listOutput = [
                                                            '{{$exercise->output1}}',
                                                            '{{$exercise->output2}}',
                                                            '{{$exercise->output3}}',
                                                            '{{$exercise->output4}}',
                                                            '{{$exercise->output5}}',
                                                            '{{$exercise->output6}}',
                                                            '{{$exercise->output7}}',
                                                            '{{$exercise->output8}}',
                                                            '{{$exercise->output9}}',
                                                            '{{$exercise->output10}}'
                                                        ];
                                                        var score = 0;
                                                        var i = 0;
                                                        var resulttest = [];
                                                        var timelimit = '{{$exercise->timelimit}}';
                                                        for (var a in objTarget) {
                                                            var obj = objTarget[a];
                                                            if (obj.time >= timelimit) {
                                                                resulttest.push('time limit');
                                                                $('#status').append('<div class="alert alert-warning" role="alert"><a href="#" class="alert-link">Test case ' + (i + 1) + ' is timelimit with time ' + obj.time + '</a></div>');
                                                            } else if (optomize(obj.stdout) === listOutput[i]) {
                                                                score++;
                                                                resulttest.push('right');
                                                                $('#status').append('<div class="alert alert-success" role="alert"><a href="#" class="alert-link">Test case ' + (i + 1) + ' is correct with time ' + obj.time + '</a></div>');
                                                            } else {
                                                                resulttest.push('wrong');
                                                                $('#status').append('<div class="alert alert-danger" role="alert"><a href="#" class="alert-link">Test case ' + (i + 1) + ' was wrong with time ' + obj.time + '</a></div>')
                                                            }
                                                            i++;
                                                        }
                                                        $('#showscore').html('Your score: ' + score);
                                                        $('#showscore').css('display', 'block');

                                                        $('#status').append('<div class="progress">\n' +
                                                            '  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: ' + getPercer(score) + '%;">\n' +
                                                            '    ' + getPercer(score) + '%\n' +
                                                            '  </div>\n' +
                                                            '</div>');

                                                        console.log(objTarget);
                                                        get2(timelimit, resulttest, score, editor.getValue()).then(data => {
                                                            console.log(data);
                                                            // if (data.status === 'ok') {
                                                            //
                                                            //     $('#thongbao').html('Auto test generate successfully.');
                                                            // }
                                                        }).catch(err => console.log(err));
                                                    });
                                                });
                                            });
                                        });
                                    });
                                });
                            });
                        });
                    });
                }).catch(err => console.log(err));
            });
        });

        function getPercer(score) {
            return score * 10;
        }

        function optomize(output) {
            var temp = output;
            if (temp !== null) {
                temp = temp.trim();
                temp = temp.replace('\n', '');
            }

            return temp;

        }

        var get2 = function (timelimit, resulttest, score, sourceCode) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '/exercises/submitted',
                    data: {
                        codeExercise: $('#codeexercise').val(),
                        score: score,
                        sourcecode: sourceCode,
                        language: $('#language').val(),
                        timelimit: timelimit,
                        resulttest: resulttest.join(',')
                    },
                    success: function (data) {

                        return resolve(data);
                    },
                    error: function (err) {
                        return reject(err);
                    }
                });
            });
        };

        var get1 = function (stdIn) {
            return new Promise((resolve, reject) => {
                var source = editor.getValue();
                var language = $('#language').val();
                var data = {
                    "source_code": source,
                    "language_id": getIDOfLanguageSupport(language),
                    "number_of_runs": "1",
                    "stdin": stdIn,
                    "expected_output": "hello, Judge0",
                    "cpu_time_limit": "2",
                    "cpu_extra_time": "0.5",
                    "wall_time_limit": "5",
                    "memory_limit": "128000",
                    "stack_limit": "64000",
                    "max_processes_and_or_threads": "30",
                    "enable_per_process_and_thread_time_limit": false,
                    "enable_per_process_and_thread_memory_limit": true,
                    "max_file_size": "1024"
                };
                $.ajax({
                    url: 'https://api.judge0.com/submissions?wait=true',
                    type: 'POST',
                    data: data,
                    success: function (stdOut) {
                        return resolve(stdOut);
                    },
                    error: function (err) {
                        return reject(err);
                    }
                });
            });
        };


        function getIDOfLanguageSupport($lang) {
            var ds = {
                'text/x-c++src': 10,
                'text/x-java': 27,
                'text/x-python': 34,
                'text/javascript': 29,
                'text/x-ruby': 38
            };
            return ds[$lang];
        }
    </script>
@endsection