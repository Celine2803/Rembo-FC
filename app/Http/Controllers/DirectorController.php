<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DirectorController extends Controller
{
    public function DirectorDashboard(){
        $players =User::where('role','player')->count();
        $matches=Performance::count();
        $coach=User::where('role','coach')->get();
        
        return view('director.index',compact('players','matches'));
    } //End method

    public function DirectorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }// End Method

    public function DirectorProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('director.director_profile', compact('profileData'));
    }//End Method

    public function DirectorProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();  //unique image
            $file->move(public_path('upload/director_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function DirectorChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('director.director_change_password',compact('profileData'));
    }

    public function DirectorUpdatePassword(Request $request){
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

        return redirect('director.dashboard');
      
    }

    // PLAYERS CRUD

    public function AllPlayers(){
        $allplayers = User::where('role','player')->get();
        return view('director.playercrud.all_players', compact('allplayers'));
    }

    public function AddPlayer(){
        return view('director.playercrud.add_player');
    }

    

    public function StorePlayer(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->team = $request->team;
        $user->role = 'player';
        $user->password = Hash::make($request->password);
        $user->save();

        $notification = array(
            'message'=> 'Player added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.players')->with($notification);
    }

    public function EditPlayer($id){
        $user = User::findOrFail($id);

        return view('director.playercrud.edit_player', compact('user'));

    }

    public function UpdatePlayer(Request $request){
        $mid = $request->id;

        User::findOrFail($mid)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'team' => $request->team,
        
        ]);

        $notification = array(
            'message'=> 'Player Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.players')->with($notification);
    }

    public function SoftDeletePlayer($id){
        User::findOrFail($id)->delete();

        $notification = array(
            'message'=> 'Player Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ForceDeletePlayer($id){
        User::onlyTrashed()->findOrFail($id)->forceDelete();

        $notification = array(
            'message'=> 'Player Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function PlayerTrashed(){
        $allplayers=User::onlyTrashed()->get();

        return view('player.player_trash',compact('allplayers'));
    }

    public function PlayerRestore($id){
        User::whereId($id)->restore();

        return back();
    }

    public function PlayerRestoreAll(){
        User::onlyTrashed()->restore();

        return back();
    }

    // pay

    public function PayPlayer($id){
        $user=User::findOrFail($id);
        return view('payment.payment_player',compact('user'));
    }

    public function PlayerInformation($id) {
        $user = User::findOrFail($id); 
        return view('payment.player_information', compact('user'));
    }

    public function processPlayerInformation($id) {
       
        return redirect()->route('player.information', $id);
    }

    public function Payment($id) {
        $user = User::findOrFail($id); 
        return view('payment.payment', compact('user'));
        }
    
        public function PaymentSuccess($id) {
        $user = User::findOrFail($id);
    
        $user->notify(new EmailNotification($user));
    
        return view('payment.payment_success', compact('user'));
        }

    public function UpdatePay(Request $request){
        $mid = $request->id;

        User::findOrFail($mid)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'team' => $request->team,
        
        ]);
        // return redirect()->route('password.confirm');
        return view('payment.payment');

    }     

    public function ConfirmPay(){
        // $user = User::findOrFail($id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->team = $request->team;
        // $user->role = 'player';
        
            
           
        // return view('director.playercrud.confirm_payment');
    }   
    
    
}
