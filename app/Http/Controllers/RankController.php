<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RankController extends Controller
{
    public function Exercise()
    {

        $listAcc2 = \App\Account::orderby('scoreexercise', 'desc')->where('role', '<>', 0)->paginate(30);
        return view('rankcoder', ['listAcc2' => $listAcc2, 'seeing' => 'rank','title'=>'Rank of exercise']);

    }

    public function Examination()
    {

        $listAcc2 = \App\Account::orderby('score', 'desc')->where('role', '<>', 0)->paginate(30);
        return view('rankquestion', ['listAcc2' => $listAcc2, 'seeing' => 'rank','title'=>'Rank of exercise']);

    }
}
