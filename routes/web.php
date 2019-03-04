<?php

use App\KeyWords;
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
    $team = \App\Teams::all(); // Gửi danh sách team để cho người chơi chọn bộ câu hỏi mà mình muốn chơi
    $info = $request->info;
    $message = '';
    if ($info != null) {
        $score = Session::get('score');

        if (Session::get('acc') == null) {
            $message = "Sorry. You have chosen the wrong answer. Total score for you: " . $score . ' Because you not login, this score will not save in system.';
        } else {
            $acc = \App\Account::where('username', Session::get('acc')->username)->first();
            if ($acc->score <= $score) {
                \App\Account::where('username', Session::get('acc')->username)->update([
                    'score' => $score
                ]);
                $message = "Sorry. You have chosen the wrong answer. Total score for you: " . $score . ' .Updated your score: ' . $score;
            } else {
                $message = "Sorry. You have chosen the wrong answer. Total score for you: " . $score . ' .Because current score not greater than your score, this score will not save in system.';
            }
        }
        Session::put('score', 0);
        Session::put('list-question', []);
        return view('notify', ['message' => $message, 'title' => 'Notify', 'seeing' => 'index']);
    }
    return view('index', ['title' => 'Home', 'lang' => $lang, 'seeing' => 'index', 'teams' => $team]);
});

Route::get('/account/register_page', function () {
    return view('register_page', ['title' => 'Register your account', 'seeing' => 'account']);
});
Route::get('/account/login_page', function () {
    return view('login', ['title' => 'Login with us', 'seeing' => 'account']);
});
Route::get('/account/create_password_page', function () {
    return view('createpassword', ['title' => 'Create new password', 'seeing' => 'account']);
});
Route::get('/account/forgotpassword', function () {
    return view('reset',['title' => 'Get new password for account', 'seeing'=>'account']);
});
Route::get('/account/changeyourpassword', function () {
    return view('changepass', ['title' => 'Change your password', 'seeing' => 'account']);
});
Route::get('/account/test11', function () {
    return view('a', ['title' => 'Login', 'seeing'=>'account']);
});

/**
 * Khi gọi route thêm thì sẽ có thêm tham số team. Để thực hiện thêm cho 1 team nào đó. Team ở đây có thể là All hoặc 1 team cụ thể
 */
Route::get('/question/addquestion', function (Request $request) {
    if (Session::get('acc') == null) {
        return redirect('/');
    }
    $teamleader = Session::get('acc')->teamleader;
    $lang = \App\Lang::all();
    if ($teamleader == null) {
        $teamleader = 'all';
    }
    return view('addquestion', ['title' => 'Add question', 'lang' => $lang, 'seeing' => 'addquestion', '$team' => $teamleader]);
});


Route::get('/question/start-now', function (Request $request) {
    $lang = $request->lan;
    $team = $request->team;
    Session::put('lang', $lang);
    Session::put('score', 0);
    if ($team == null) { // khỏi tạo team nếu chưa có
        Session::put('team', 'all');
    } else {
        Session::put('team', $team);
    }
    Session::put('list-question', array());
    return redirect('/question/showquestion');
});

Route::get('/question/showquestion', function () {
    if (Session::get('lang') == null) {
        return redirect('/');
    }
    $lang = \App\Lang::all();
    if (Session::get('score') == null) {
        Session::put('score', 0);
    }
    if (Session::get('list-question') == null) {
        Session::put('list-question', array());
    }
    $listQS = Session::get('list-question');
    $quj = null;

    if (Session::get('team') == null || Session::get('team') != 'all') { // lấy team đã chọn ra kiểm tra
        $quj = \App\Question::where('lang', Session::get('lang'))->whereNotIn('code', $listQS)->where('location', getLocation())->where('team', Session::get('team'))->inRandomOrder()->get()->first();
    } else {
        $quj = \App\Question::where('lang', Session::get('lang'))->whereNotIn('code', $listQS)->where('location', getLocation())->inRandomOrder()->get()->first();
    }

    if ($quj == null) {
        $diem = Session::get('score');
        $quj = \App\Question::where('location', getLocation())->get();

        if ($diem == count($quj)) {
            return view('notify', ['message' => 'You are complete all the question of language.', 'title' => 'Notify', 'seeing' => 'addquestion']);
        } else {
            return view('notify', ['message' => 'Question for this language not available', 'title' => 'Notify', 'seeing' => 'addquestion']);
        }
    }
    return view('question', ['title' => 'Question', 'lang' => $lang, 'question' => $quj, 'seeing' => 'examination']);
});


Route::get('/test/timezone', function () {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://ip-api.com/json/" . get_client_ip(),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            // Set Here Your Requesred Headers
            'Content-Type: application/json',
        ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    var_dump($response);

});


Route::post('/account/signupProcessing', 'UserController@addUser');
Route::post('/account/logintopage', 'UserController@loginProcess');
Route::get('/account/logout', 'UserController@logout');
Route::get('/account/test', 'UserController@test');
Route::post('/account/changePassword', 'UserController@changePassword');
Route::post('/account/get-new-password', 'UserController@sendEmail');
Route::post('/account/create-new-password', 'UserController@getNewPassword');


//dai ca
Route::get('/{code}', 'PasteController@GetPaste');
Route::get('/a/{code}', 'PasteController@GetPasteA');
Route::get('/search/google', function (Request $request) {
    $keyword = $request->keyword;
    $kOld = KeyWords::where('keyword', $keyword)->first();
    if ($kOld == null) {
        $k = new KeyWords();
        $k->keyword = $keyword;
        $k->solan = 1;
        $k->save();
    } else {
        //cap nhat
        $soLanCu = $kOld->solan;
        KeyWords::where('keyword', $keyword)->update(['solan' => $soLanCu + 1]);
    }
    return response()->json([
        'data' => 'https://www.google.com/search?q=' . 'site:codefulltime.com ' . $keyword
    ]);
});


Route::get('/paste/all', 'PasteController@Pastes');
Route::get('/paste/search', 'PasteController@Search');

Route::post('/paste/edit-paste', 'PasteController@EditPaste');
Route::get('/paste/new-paste', 'PasteController@CreatePastePage');

Route::get('/covert/text-to-slug', function (Request $request) {
    $title = $request->title;
    return response()->json([
        'result' => str_slug($title)
    ]);
});
Route::post('/paste/new-paste', 'PasteController@CreatePaste');


Route::get('/comment/add-new', 'CommentController@add');


Route::get('/t/t/test', 'QuestionController@test');

Route::get('/question/addQuestionProcess', 'QuestionController@addQuestion');
Route::get('/question/checkresult', 'QuestionController@checkResult');

function get_client_ip()
{
    $ipaddress = '1.55.199.209';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = '1.55.199.209';
    return $ipaddress;
}

function getLocation()
{
    $ip = get_client_ip();
    if ($ip == '127.0.0.1') {
        return 'VN';
    }
    $details = json_decode(file_get_contents("http://ipinfo.io/" . $ip . "/json"));
    $country = $details->country;
    if ($country != 'VN') return 'EN';
    return 'VN';
}
