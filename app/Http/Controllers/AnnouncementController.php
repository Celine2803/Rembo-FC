<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\AnnouncementCreated;
use App\Notifications\IndividualAnnouncementCreated;

class AnnouncementController extends Controller
{
    public function EmailPlayer(){
        $user = User::all();

        return view('email',compact('user'));
    }
    public function Store(Request $request){
        
        $announcement = Announcement::create([
            'title' => 'Exciting News',
            'description' => 'An Upcoming Event!!',
        ]);
    
        // Get the value of 'notes' from the form input
        $notes = $request->input('notes');
        $selectedUserId = $request->input('user_id');

        if ($request->has('send_individual') && !empty($selectedUserId)) {
            // Send individual email to the selected user
            $selectedUser = User::find($selectedUserId);

            if ($selectedUser) {
                $selectedUser->notify(new IndividualAnnouncementCreated($announcement, $notes));
                // Mail::raw($notes, function ($message) use ($selectedUser, $announcement) {
                //     $message->to($selectedUser->email)
                //         ->subject($announcement->title);
                // });

                return redirect()->back()->with('success', 'Individual email sent successfully.');
            }
        } elseif ($request->has('send_group')) {
            // Send group email

            $messageAll = $request->input('message_all');
            $chunkSize = 10;

            User::chunk($chunkSize, function ($users) use ($announcement, $messageAll) {
                foreach ($users as $user) {
                    $user->notify(new AnnouncementCreated($announcement, $messageAll));
                    sleep(1);
                }
            });

            return redirect()->back()->with('success', 'Group email sent successfully.');
        }

        // Handle the case when no user is selected for individual email
        return redirect()->back()->with('error', 'Please select a user for individual email.');
        // Define the chunk size (e.g., 10 users per batch)
        // $chunkSize = 10;
    
        // Process users in chunks
        // User::chunk($chunkSize, function ($users) use ($announcement,$notes) {
        //     foreach ($users as $user) {
        //         $user->notify(new AnnouncementCreated($announcement,$notes));
        //         sleep(1);
        //     }
        // });
    
        // return redirect()->back()->with('success', 'Emails sent successfully.');
    }
}

