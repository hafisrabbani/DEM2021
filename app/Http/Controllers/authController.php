<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\b_user;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function register()
    {
        return view('login.register');
    }


    public function registerPost(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user,username',
            'email' => 'required|unique:user,email',
            'password' => 'required'
        ],[
            'username.required' => 'Username Wajib Diisi',
            'username.unique' => 'Username Sudah Ada',
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email Sudah digunakan',
            'password.required' => 'Password Wajib Diisi'
        ]);

        $user = new b_user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // dd($user->save());
        if($user->save()){
            return redirect('/login')->with('success','Berhasil Mendaftar');
        }
    }

    public function loginPost(Request $request)
    {
        $data = b_user::where('email',$request->email)->first();
        if($data){
            if(Hash::check($request->password, $data->password)){
                // session('login',true);
                $request->session()->put('login',true);
                $request->session()->put('id',$data->id);
                return redirect('/');
            }
        }
        return redirect()->back()->with('error','Email/Password Salah');
        // dd($data);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
