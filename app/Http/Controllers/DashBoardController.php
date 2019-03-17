<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\KeyWords;
use App\Paste;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function Search(Request $request)
    {
        $key = $request->key;
        $listPaste = Paste::where('title', 'like', '%' . $key . '%')->orWhere('slug', 'like', '%' . str_slug($key) . '%')->paginate(10);
        $listExercise = Exercise::where('name', 'like', '%' . $key . '%')->orWhere('slug', 'like', '%' . str_slug($key) . '%')->paginate(10);
        $listQuestion = Question::where('name', 'like', '%' . $key . '%')->orWhere('slug', 'like', '%' . str_slug($key) . '%')->paginate(10);
        $total = array();

        foreach ($listQuestion as $qs){
            array_push($total,$qs);
        }


        foreach ($listExercise as $qs){
            array_push($total,$qs);
        }


        foreach ($listPaste as $qs){
            array_push($total,$qs);
        }

        $kOld = KeyWords::where('keyword', $key)->first();
        if ($kOld == null) {
            $k = new KeyWords();
            $k->keyword = $key;
            $k->solan = 1;
            $k->save();
        } else {
            //cap nhat
            $soLanCu = $kOld->solan;
            KeyWords::where('keyword', $key)->update(['solan' => $soLanCu + 1]);
        }

        return view('searching', ['total' => $total, 'title' => 'Result for search with key: ' . $key, 'seeing' => '']);
    }
}
