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
            $detailsProfile = DetailsAccount::where('username', $username)->first();
            $acc = Account::where('username', $username)->first();
            return view('profile', ['title' => 'Profile of ' . $username, 'acc' => $acc, 'seeing' => 'account', 'detailsProfile' => $detailsProfile]);
        } else {
            $username = $request->username;
            $detailsProfile = DetailsAccount::where('username', $username)->first();
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
        $date = $request->date;
        $phone = $request->phone;
        $add = $request->address;
        $dm = $request->diemmanh;
        $dy = $request->diemyeu;
        $st = $request->sothich;
        $kn = $request->kinang;
        $da = $request->duan;
        $fb = $request->fb;
        $y = $request->youtube;
        $t = $request->twitter;
        $git = $request->git;
        $username = Session::get('acc')->username;
        $sk = $request->skype;
        $w = $request->website;
        $td = $request->trinhdo;
        $cm = $request->chuyenmon;
        $sglv = $request->sogiolamviec;
        $gt = $request->gioitinh;
        $details = new DetailsAccount();
        $details->codeprofile = $code;
        $details->ngaysinh = $date;
        $details->sodienthoai = $phone;
        $details->diachi = $add;
        $details->diemmanh = $dm;
        $details->diemyeu = $dy;
        $details->sothich = $st;
        $details->kynang = $kn;
        $details->duan = $da;
        $details->fb = $fb;
        $details->youtube = $y;
        $details->twitter = $t;
        $details->githhub = $git;
        $details->username = $username;
        $details->skype = $sk;
        $details->website = $w;
        $details->trinhdo = $td;
        $details->chuyenmon = $cm;
        $details->gioitinh = $gt;
        $details->sogiolamviec = $sglv;
        $details->save();
        return redirect('/profile/' . $username)->with('mess', 'Information updated!');
    }

    public function editProfile(Request $request)
    {
        $codeprofile = $request->code;
        $date = $request->date;
        $phone = $request->phone;
        $add = $request->address;
        $dm = $request->diemmanh;
        $dy = $request->diemyeu;
        $st = $request->sothich;
        $kn = $request->kinang;
        $da = $request->duan;
        $fb = $request->fb;
        $y = $request->youtube;
        $t = $request->twitter;
        $git = $request->git;
        $username = Session::get('acc')->username;
        $sk = $request->skype;
        $w = $request->website;
        $td = $request->trinhdo;
        $cm = $request->chuyenmon;
        $sglv = $request->sogiolamviec;
        $gt = $request->gioitinh;
        DetailsAccount::where('codeprofile', $codeprofile)->update([
            'ngaysinh' => $date,
            'sodienthoai' => $phone,
            'diachi' => $add,
            'diemmanh' => $dm,
            'diemyeu' => $dy,
            'sothich' => $st,
            'kynang' => $kn,
            'duan' => $da,
            'fb' => $fb,
            'twitter' => $t,
            'youtube' => $y,
            'githhub' => $git,
            'username' => $username,
            'skype' => $sk,
            'website' => $w,
            'trinhdo' => $td,
            'chuyenmon' => $cm,
            'sogiolamviec' => $sglv,
            'gioitinh' => $gt
        ]);
        return redirect('/profile/' . $username)->with('mess', 'Your information have edited');
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
