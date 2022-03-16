<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function list(){
        $users = User::all();
        return view('admin.user.index',\compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6|max:12',
            'confirm'=>'same:password',
            'is_admin'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'is_admin'=>$request->is_admin, 
        ]);

        return redirect()->route('admin.user.list')->with('success','create success');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit',\compact('user'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'is_admin'=>'required',
        ]);
        $data = [
            'name'=>$request->name,
            'is_admin'=>$request->is_admin,
        ];
        if($request->password){
            $this->validate($request,[
                'password'=>'required|min:6|max:12',
                'confirm'=>'same:password',
            ]);
            $data['password'] =bcrypt($request->password);
        }
        $user = User::find($id);
        $user->update($data);

        return redirect()->route('admin.user.list')->with('success','update success');
    }

    public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin.user.list')->with('success','delete success');
    }
}
