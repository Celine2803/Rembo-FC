<?php

namespace App\Http\Controllers;

use App\Mail\Send;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    // public function EmailPlayer(){
    //     $user = User::all();

    //     return view('email',compact('user'));
    // }

    // public function SendEmail(){

    //     request()->validate(['email'=>'required|email']);
        
    //     Mail::to(request('email'))->send(new Send ());

    //     return redirect()->back();
    // }
}
