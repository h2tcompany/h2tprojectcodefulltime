<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Ho_Chi_Minh');

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            } else {
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

    public function sendEmail(Request $request)
    {
        $email = $request->email;
        $username = $request->username;
        $account = Account::where('username', $username)->first();
        if ($account == null) {
            Session::flash('flash_message', 'This account not found on server. Please check again!');
            return view('reset', ['title' => 'Get the new password for account', 'seeing' => 'account']);
        } else if (($account != null)) {
            Mail::send('mail', array('username' => $username, 'email' => $email), function ($message) use ($email) {
                $message->to($email, 'Member')->subject('Get the new password');
            });
            Session::flash('notify', 'Send message successfully!');
            return view('reset', ['title' => 'Get the new password for account', 'seeing' => 'account']);
        }
    }

    public function getNewPassword(Request $request)
    {
        $p = Hash::make($request->p);
        $email = $request->email;
        $username = $request->username;
        $account = Account::where('username', $username)->first();
        if ($account->email == $email) {
            Account::where('username', $username)->update([
                'password' => $p
            ]);
            return response()->json([
                'notify' => 'thanhcong'
            ]);
        } else {
            return response()->json([
                'notify' => 'thatbai'
            ]);
        }

    }

    public function test()
    {
        echo "";
    }
}
