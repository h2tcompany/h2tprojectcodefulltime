<?php

namespace App\Http\Controllers;

use App\Account;
use App\DetailsAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    //
    public function getViewProfile(Request $request)
    {
        if (Session::get('acc') == null) {
            $username = $request->username;
            $detailsProfile = DetailsAccount::where('detailsofaccount', $username)->first();
            $acc = Account::where('username', $username)->first();
            return view('profile', ['title' => 'Profile of ' . $username, 'acc' => $acc, 'seeing' => 'account', 'detailsProfile' => $detailsProfile]);
        } else {
            $username = $request->username;
            $detailsProfile = DetailsAccount::where('detailsofaccount', $username)->first();
            $acc = Account::where('username', $username)->first();
            return view('profile', ['title' => 'Profile of ' . $username, 'acc' => $acc, 'seeing' => 'account', 'detailsProfile' => $detailsProfile]);
        }
    }
//    public function viewProfile(){
//        $name = Session::get('acc')->name;
//        return view('profile', ['title' => $name, 'seeing' => 'account', 'seeing1' => 'profile']);
//    }

    public function updateProfileInfo(Request $request)
    {
        $c = round(microtime(true) * 1000);
        $code = $c . $this->rand_string(10);
        $phone = $request->phone;
        $profile = $request->profile;
        $about = $request->about;
        $skill1 = $request->skill1;
        $skill2 = $request->skill2;
        $skill3 = $request->skill3;
        $skill4 = $request->skill4;
        $percentofskill1 = $request->pskill1;
        $percentofskill2 = $request->pskill2;
        $percentofskill3 = $request->pskill3;
        $percentofskill4 = $request->pskill4;
        $detailsofaccount = Session::get('acc')->username;
        $username = Session::get('acc')->username;
        $up = 1;
        $details = new DetailsAccount();
        $details->codeprofile = $code;
        $details->phonenumber = $phone;
        $details->profile = $profile;
        $details->aboutme = $about;
        $details->skillone = $skill1;
        $details->skilltwo = $skill2;
        $details->skillthree = $skill3;
        $details->skillfour = $skill4;
        $details->percentone = $percentofskill1;
        $details->percenttwo = $percentofskill2;
        $details->percentthree = $percentofskill3;
        $details->percentfour = $percentofskill4;
        $details->detailsofaccount = $detailsofaccount;
        $details->has_updated = $up;
        $details->save();
        return redirect('/profile/'.$username)->with('mess', 'Update info successfully');
    }

    public function editProfile(Request $request)
    {
        $codeprofile = $request->codeprofile;
        $phone = $request->phone;
        $profile = $request->profile;
        $about = $request->about;
        $skill1 = $request->skill1;
        $skill2 = $request->skill2;
        $skill3 = $request->skill3;
        $skill4 = $request->skill4;
        $percentofskill1 = $request->pskill1;
        $percentofskill2 = $request->pskill2;
        $percentofskill3 = $request->pskill3;
        $percentofskill4 = $request->pskill4;
        $username = Session::get('acc')->username;
        DetailsAccount::where('codeprofile', $codeprofile)->update([
            'phonenumber' => $phone,
            'profile' => $profile,
            'aboutme' => $about,
            'skillone' => $skill1,
            'percentone' => $percentofskill1,
            'skilltwo' => $skill2,
            'percenttwo' => $percentofskill2,
            'skillthree' => $skill3,
            'percentthree' => $percentofskill3,
            'skillfour' => $skill4,
            'percentfour' => $percentofskill4,
        ]);
        return redirect('/profile/'.$username)->with('mess', 'Edit your info successfully');
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
}
