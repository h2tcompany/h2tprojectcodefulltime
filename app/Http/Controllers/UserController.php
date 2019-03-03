<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Ho_Chi_Minh');

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //user Register
    public function addUser(Request $request)
    {
        $user = new Account();
        $user->id = mt_rand(0, 99999);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->score = 0;
        $user->role = 1;
        $user->teamleader = 'all';
        $user->save();
        return response()->json([
            'stt' => 'ok'
        ]);
    }

//login
    public function loginProcess(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $user = Account::where('username', $username)->first();
        if (isset($user)) {
            if (Hash::check($password, $user->password) && $user->role == 1) {
                Session::put('acc', $user);
                return redirect('/');
            }else{
                return redirect('/account/login_page')->with('mess', 'Mật khẩu không đúng.');
            }
        } else {
            return redirect('/account/login_page')->with('mess', 'Tài khoản không tồn tại.');
        }
    }

//logout
    public function logout()
    {
        Session::put('acc', null);
        return redirect('/');
    }

    //Process change password
    public function changePassword(Request $request)
    {
        $username = $request->username;
        $mkc = $request->oldpass;
        $mkm = Hash::make($request->newpass);
        $user = Account::where('username', $username)->first();
        if (Hash::check($mkc, $user->password)) {
            $user->update([
                'password' => $mkm
            ]);
            Session::put('acc', null);
            return response()->json([
                'stt' => 'ok'
            ]);
        } else {
            return response()->json([
                'stt' => 'failed'
            ]);
        }
    }

    public function test()
    {
        echo "";
    }
}
