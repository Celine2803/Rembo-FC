<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
    public function CoachDashboard(){

        // $id = Auth::user()->id;
        // $data = User::find($id);
        // $data->username = $request->username;
        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->phone = $request->phone;

        // if ($request->file('photo')) {
        //     $file = $request->file('photo');
        //     $filename = date('YmdHi').$file->getClientOriginalName();  //unique image
        //     $file->move(public_path('upload/coach_images'), $filename);
        //     $data['photo'] = $filename;
        // }

        // $data->save();
        
        return view('coach.index1');
    } //End method

    public function CoachLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }// End Method
    public function CoachProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('coach.coach_profile', compact('profileData'));
    }//End Method

    public function CoachProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();  //unique image
            $file->move(public_path('upload/coach_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function CoachChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('coach.coach_change_password',compact('profileData'));
    }

    public function CoachUpdatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with();
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('coach.dashboard');
      
    }
}
