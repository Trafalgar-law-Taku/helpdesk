<?php

namespace App\Http\Controllers;
use Mail ;
use Auth ;
use Illuminate\Http\Request;

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
        $session_email = Auth::user()->email;
        $contactName = "HR SYSTEM";
        $contactEmail = 'takudzwa.chirume@zimpapers.co.zw';
        $contactMessage = "";

  

        $data = array('name' => $contactName, 'email' => $contactEmail, 'message' => $contactMessage);
        Mail::send('mail', $data, function ($message) use ($contactEmail, $contactName) {
            $message->from('takudzwa.chirume@zimpapers.co.zw', $contactName);
            $message->to($contactEmail, 'Supervisor')->subject('Welcome');
        });


        return view('home');
    }
}
