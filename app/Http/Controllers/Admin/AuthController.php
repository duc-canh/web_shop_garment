<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login.index');
    }

    public function checkLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return \redirect()->route('admin.category.list');
        }
        return \redirect()->route('admin.auth.login')->with('error','login failed');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.auth.login')->with('success','logout successfully');
    }

    public function profile(){
        return view('admin.login.profile');
    }

    public function updateProfile(){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $user = Auth::user();
        $data = [
            'name'=>$request->name,
        ];
        if($request->password){
            $this->validate($request,[
                'password'=>'required|min:6|max:12',
                'confirm'=>'same:password',
            ]);
            $data['password'] = bcrypt($request->password);
        }
       
        $user->update($data);

        return redirect()->route('admin.profile.index')->with('success','update success');
    }
}
