<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    $lang = \App\Lang::all();
    $info = $request->info;
    $message = '';
    if ($info != null) {
        $score = Session::get('score');

        if (Session::get('acc') == null) {
            $message = "Rất tiếc. Bạn đã chọn đáp án sai. Tổng điểm của bạn là: " . $score . ' .Do không đăng nhập nên điểm sẽ không được lưu lại';
        } else {
            $acc = \App\Account::where('username', Session::get('acc')->username)->first();
            if ($acc->score <= $score) {
                \App\Account::where('username', Session::get('acc')->username)->update([
                    'score' => $score
                ]);
                $message = "Rất tiếc. Bạn đã chọn đáp án sai. Tổng điểm của bạn là: " . $score . ' .Đã cập nhật điểm của bạn: ' . $score;
            } else {
                $message = "Rất tiếc. Bạn đã chọn đáp án sai. Tổng điểm của bạn là: " . $score . ' .Do điểm này thắp hơn điểm cũ nên điểm này không được lưu vào DB';
            }

        }

//        $listQuestion = Session::get('list-question');

        Session::put('score', 0);
        Session::put('list-question', []);
    }
    return view('index', ['title' => 'Home', 'lang' => $lang, 'message' => $message]);
});
Route::get('/account/register_page', function () {
    return view('register_page');
});
Route::get('/account/login_page', function () {
    return view('login');
});
Route::get('/account/forgot', function () {
    return view('reset');
});
Route::get('/account/changeyourpassword', function () {
    return view('changepass');
});
Route::get('/question/addquestion', function () {
    $lang = \App\Lang::all();
    return view('addquestion', ['title' => 'Add question', 'lang' => $lang]);
});

Route::get('/question/start-now', function (Request $request) {
    $lang = $request->lan;
    Session::put('lang', $lang);
    return redirect('/question/showquestion');
});

Route::get('/question/showquestion', function () {
    $lang = \App\Lang::all();
    $listQS = Session::get('list-question');
    $quj = \App\Question::where('lang', Session::get('lang'))->whereNotIn('code', $listQS)->inRandomOrder()->get()->first();
    return view('question', ['title' => 'Question', 'lang' => $lang, 'question' => $quj]);
});

Route::post('/account/signupProcessing', 'UserController@addUser');
Route::post('/account/logintopage', 'UserController@loginProcess');
Route::get('/account/logout', 'UserController@logout');
Route::get('/account/test', 'UserController@test');
Route::post('/account/changePassword', 'UserController@changePassword');


//dai ca
Route::get('/{code}', 'PasteController@GetPaste');
Route::get('/a/{code}', 'PasteController@GetPasteA');

Route::get('/paste/all', 'PasteController@Pastes');
Route::get('/paste/search', 'PasteController@Search');

Route::post('/paste/edit-paste', 'PasteController@EditPaste');
Route::get('/paste/new-paste', 'PasteController@CreatePastePage');
Route::post('/paste/new-paste', 'PasteController@CreatePaste');


Route::get('/comment/add-new', 'CommentController@add');


Route::get('/t/t/test', 'QuestionController@test');

Route::get('/question/addQuestionProcess', 'QuestionController@addQuestion');
Route::get('/question/checkresult', 'QuestionController@checkResult');

