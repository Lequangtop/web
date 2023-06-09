<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class loginController extends Controller
{
    public function index(){

        return view('admin.user.login',['title'=>'Đăng nhập hệ thống']);
    }
    public function store(Request $request){
            //  dd($request->input());
        $this->validate($request,[
         'email'=>'required|email',
         'password'=>'required'
            ],[
                'email.required'=>'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập password'
            ]);

        //kiem tra ten nguoi dung co khop vs database ko

        if(Auth::attempt([
          'email' => $request->input('email'),
         'password' => $request->input('password')
         ],$request->input('remember'))) {

            return redirect()->route('admin');
        }
            Session::flash('error', 'Email or Password không đúng');
            return redirect()->back();

        }


}
