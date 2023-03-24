<?php

namespace App\Http\Controllers;

use App\Models\operations;
use App\Models\User;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index(Request $request)
    {

        $record = operations::where('email', '=', $request->email)->first();
        if (isset($record)) {
          
            return redirect()->back()->with('error', 'You already have a pending Leave application');

        }else{

       

            
            $user = User::where('email', '=', $request->email)->first();

            $accrued = $user->accrued_days;
            $sick = $user->sick_days;
            $compessionate = $user->Compassionate_days;



            $newPost = new operations;
            $newPost->type = $request->type;
            $newPost->from = $request->from;
            $newPost->to = $request->to;
            $newPost->address = $request->address;


            if (!isset($record)) {

                $newPost->accrued = $accrued;
                $newPost->sick = $sick;
                $newPost->compensation = $compessionate;
            }

            $newPost->date = $request->date;
            $newPost->signature = $request->name;
            $newPost->name = $request->name;
            $newPost->uemail = $request->uemail;
            $newPost->number = $request->number;
            $newPost->department = $request->department;
            $newPost->email = $request->email;
            $newPost->Gm = "Pending";
            $newPost->Verified = "Pending";
            $newPost->hod = "Pending";
            
            $newPost->save();


         

            return redirect()->back()->with('success', 'Thank you for using the Leave Application System An email notification will be sent to you when leave has been processed');
        }
    }
}
