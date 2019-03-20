<?php

namespace App\Http\Controllers;

use App\Account;
use App\Exercise;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExerciseController extends Controller
{
    public function Exercise()
    {
        $listExercise = Exercise::orderby('code', 'desc')->paginate(20);
        return view('exercise/exercise', ['exercises' => $listExercise, 'title' => 'Exercises', 'seeing' => 'exercise']);
    }

    public function GetExercise(Request $request)
    {
        $code = $request->code;
        $exercise = Exercise::where('code', $code)->first();
        $acc = Session::get('acc');

        if ($acc != null && $exercise->username == $acc->username) {
            return view('exercise/editexercise', ['exercise' => $exercise, 'seeing' => 'exercise', 'title' => $exercise->name]);

        }


        return view('exercise/viewexercise', ['exercise' => $exercise, 'seeing' => 'exercise', 'title' => $exercise->name]);

    }

    public function AddPage()
    {
        return view('exercise/addexercise', ['title' => 'Add new exercise', 'seeing' => 'exercise']);
    }


    public function Add(Request $request)
    {
        $acc = Session::get('acc');
        $exercise = new Exercise();
        $name = $request->name;
        $question = $request->question;
        $testcase1 = $request->testcase1;
        $testcase2 = $request->testcase2;
        $testcase3 = $request->testcase3;
        $testcase4 = $request->testcase4;
        $testcase5 = $request->testcase5;
        $testcase6 = $request->testcase6;
        $testcase7 = $request->testcase7;
        $testcase8 = $request->testcase8;
        $testcase9 = $request->testcase9;
        $testcase10 = $request->testcase10;

        $output1 = $request->output1;
        $output2 = $request->output2;
        $output3 = $request->output3;
        $output4 = $request->output4;
        $output5 = $request->output5;
        $output6 = $request->output6;
        $output7 = $request->output7;
        $output8 = $request->output8;
        $output9 = $request->output9;
        $output10 = $request->output10;
        $exercise->testcase1 = $testcase1;
        $exercise->testcase2 = $testcase2;
        $exercise->testcase3 = $testcase3;
        $exercise->testcase4 = $testcase4;
        $exercise->testcase5 = $testcase5;
        $exercise->testcase6 = $testcase6;
        $exercise->testcase7 = $testcase7;
        $exercise->testcase8 = $testcase8;
        $exercise->testcase9 = $testcase9;
        $exercise->testcase10 = $testcase10;
        $exercise->output1 = $output1;
        $exercise->output2 = $output2;
        $exercise->output3 = $output3;
        $exercise->output4 = $output4;
        $exercise->output5 = $output5;
        $exercise->output6 = $output6;
        $exercise->output7 = $output7;
        $exercise->output8 = $output8;
        $exercise->output9 = $output9;
        $exercise->output10 = $output10;
        $exercise->name = $name;
        $exercise->question = $question;
//        $c = round(microtime(true) * 1000);
//        $code = $c . rand_string(20);
        $code = $request->codeexercise;
        $exercise->code = $code;
        $exercise->team = $acc != null ? $acc->teamleader : "all";
        $exercise->timelimit = $request->timelimit;
        $exercise->bestscore = 0;
        $exercise->username = $acc != null ? $acc->username : 'unknow';

        $exercise->save();
        return redirect('/exercise/' . $code);
    }

    public function Edit(Request $request)
    {
        $acc = Session::get('acc');
        $name = $request->name;
        $question = $request->question;
        $testcase1 = $request->testcase1;
        $testcase2 = $request->testcase2;
        $testcase3 = $request->testcase3;
        $testcase4 = $request->testcase4;
        $testcase5 = $request->testcase5;
        $testcase6 = $request->testcase6;
        $testcase7 = $request->testcase7;
        $testcase8 = $request->testcase8;
        $testcase9 = $request->testcase9;
        $testcase10 = $request->testcase10;

        $output1 = $request->output1;
        $output2 = $request->output2;
        $output3 = $request->output3;
        $output4 = $request->output4;
        $output5 = $request->output5;
        $output6 = $request->output6;
        $output7 = $request->output7;
        $output8 = $request->output8;
        $output9 = $request->output9;
        $output10 = $request->output10;
        $code = $request->code;
        $timelimit = $request->timelimit;
        Exercise::where('code', $code)->update([
            'name' => $name,
            'question' => $question,
            'timelimit' => $timelimit,
            'testcase1' => $testcase1,
            'testcase2' => $testcase2,
            'testcase3' => $testcase3,
            'testcase4' => $testcase4,
            'testcase5' => $testcase5,
            'testcase6' => $testcase6,
            'testcase7' => $testcase7,
            'testcase8' => $testcase8,
            'testcase9' => $testcase9,
            'testcase10' => $testcase10,
            'output1' => $output1,
            'output2' => $output2,
            'output3' => $output3,
            'output4' => $output4,
            'output5' => $output5,
            'output6' => $output6,
            'output7' => $output7,
            'output8' => $output8,
            'output9' => $output9,
            'output10' => $output10
        ]);

        return redirect('/exercise/' . $code);
    }

    public function SubmitPage(Request $request)
    {
        $code = $request->code;
        $exercise = Exercise::where('code', $code)->first();
        return view('exercise/submitcode', ['title' => $exercise->name, 'exercise' => $exercise, 'seeing' => 'exercise']);
    }

    public function Submitted(Request $request)
    {
        $acc = Session::get('acc');
        $c = round(microtime(true) * 1000);
        $code = $c . rand_string(20);
        $language = $request->language;
        $codeExercise = $request->codeExercise;
        $score = $request->score;
        $username = $acc->username;
        $time = date('h:i:s d-m-Y');
        $timelimit = $request->timelimit;
        $resulttest = $request->resulttest;
        $sourceCode = $request->sourcecode;



        // tính điểm với yêu cầu sau: Nếu đã làm bài tập A với 5 điểm thì lần sau thấp hơn thì bỏ nhiều hơn thì lấy

        // Giải thuật nhẹ như sau: CHọn ra điểm cao nhất rồi so sánh với điểm vừa làm được.
        // Nếu điểm vừa làm đc lướn hơn điểm cao nhất trong mọi lần thì thực hiện. Lấy điểm username - điểm cũ + điểm mới

        $getMaxScoreOfSubmission = Submission::where('username', $username)->where('exercisecode', $codeExercise)->orderby('score', 'desc')->first();

        $account = Account::where('username', $username)->first();
        $scoreOfExerciseOld = $account->scoreexercise;
        if ($getMaxScoreOfSubmission != null) { // đã làm rồi
            $scoreMax = $getMaxScoreOfSubmission->score;
            if ($scoreMax < $score) {
                Account::where('username', $username)->update([
                    'scoreexercise' => ($scoreOfExerciseOld - $scoreMax + $score)
                ]);
            }
        } else {
            Account::where('username', $username)->update([
                'scoreexercise' => ($scoreOfExerciseOld + $score)
            ]);
        }

        $submission = new Submission();
        $submission->code = $code;
        $submission->username = $username;
        $submission->timelimit = $timelimit;
        $submission->score = $score;
        $submission->time = $time;
        $submission->exercisecode = $codeExercise;
        $submission->language = $language;
        $submission->resulttest = $resulttest;
        $submission->sourcecode = $sourceCode;
        $submission->save();

        $exercise = Exercise::where('code', $codeExercise)->first();

        if ($exercise->bestscore < $score) {
            Exercise::where('code', $codeExercise)->update([
                'bestscore' => $score
            ]);
        }

        return response()->json(['status' => 'ok', 'data' => $timelimit]); // data = submitted or new submit


    }


}

function getOutput($sourceCode, $input)
{
    return '';
}

function getIDOfLanguageSupport($lang)
{
    $ds = [
        'text/x-c++src' => 10,
        'text/x-java' => 27,
        'text/x-python' => 34,
        'text/javascript' => 29,
        'text/x-ruby' => 38
    ];
    return $ds[$lang];
}

function rand_string($length)
{
    $str = "";
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }
    $str = substr(str_shuffle($chars), 0, $length);
    return $str;
}
