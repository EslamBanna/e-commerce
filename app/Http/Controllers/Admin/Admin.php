<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Admin as Aadmin;
use Auth;

class Admin extends Controller
{
    public function indexPage()
    {
        return view('admin.dashboard');
    }
    public function getLogin(){
        return view('admin.auth.loginContent');
    }
    public function checkLogin(loginRequest $request){
        $remember_token = $request->has('remember_me') ? true: false;
        if(Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('get.admin.login')->with(['error' => 'Wrong Data Try Again!']);
        }
    }

    // public function tinker(){
    //     php artisan tinker
    //     $admin = new App\Models\Admin\Admin();
    //     $admin->name = 'Eslam Ahmed Elbanna';
    //     $admin->email = 'es2@gmail.com';
    //     $admin->password = bcrypt('eslam123');
    //     $admin->photo = 'adc.jpg';
    //     $admin->save();

    // }
}
