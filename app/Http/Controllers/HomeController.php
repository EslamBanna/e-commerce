<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTest\Mail;
use App\Jobs\JopSendEmailToUser;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function sendEmails(){

        // $users = User::select('id','name')->get();
        // return view('createOffer',compact('users'));

        $dataNew = Mail::chunk(10,function($q){
            dispatch( new JopSendEmailToUser($q));
        });
        return 'donnnnnnne';
    }
}
