<?php

namespace App\Http\Controllers;

use App\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubmissionController extends Controller
{
    public function Get()
    {
        $dsSubmisstion = Submission::orderby('code', 'desc')->paginate(20);
        return view('exercise/submission', ['ds' => $dsSubmisstion, 'seeing' => 'exercise', 'title' => 'Submission']);
    }
}
