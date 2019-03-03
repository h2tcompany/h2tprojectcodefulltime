<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    //

    function generateRandomString($length = 12)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function addQuestion(Request $request)
    {
        $teamleader = Session::get('acc')->teamleader;
        $q = new Question();
        $q->code = $this->generateRandomString();
        $q->ques = $request->contentpaste;
        $q->re1 = $request->re1;
        $q->re2 = $request->re2;
        $q->re3 = $request->re3;
        $q->re4 = $request->re4;
        $q->correct = $request->correct;
        $q->lang = $request->typeqs;
        $q->style = $request->style;
        $q->adder = Session::get('acc')->name;
        $q->location = $request->location;
        $q->team = $teamleader; // Thuộc tính team xác định câu hỏi chỉ hiển thị cho team nào đó
        $q->save();
        return redirect('/question/addquestion')->with('message', 'Question added');
    }

    public function checkResult(Request $request)
    {
        $q = Question::where('code', $request->codeid)->first();
        $result = $request->result;
        if ($result == $q->correct) {
            if (Session::get('score') == null) {
                Session::put('score', 0);
            }
            if (Session::get('list-question') == null) {
                Session::put('list-question', array());
            }
            $listQS = Session::get('list-question');
            array_push($listQS, $q->code);
            Session::put('list-question', $listQS);
            Session::put('score', Session::get('score') + 1);

            return response()->json([
                'stt' => 'dung'
            ]);
        } else {
            return response()->json([
                'stt' => 'sai'
            ]);
        }
    }

    public function test()
    {
        $s = "Lê Văn Thịnh";
        echo(str_slug($s));
    }
}
