<?php

namespace App\Http\Controllers;

use App\Models\MeetUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function CalendarIndex(){
        $events = array();
        $meetups= MeetUp::all();
        
        foreach($meetups as $meetup){
            $color=null;
            if($meetup->title =='Match'){
                $color='#E131F9';
            }
            if($meetup->title =='Health Checkup'){
                $color='#37F931';
            }
            if($meetup->title =='Training'){
                $color='#F98231';
            }if($meetup->title =='Counselling'){
                $color='#F93148';
            }
                $events[]=[
                    'id'=>$meetup->id,
                    'title'=>$meetup->title,
                    'start'=>$meetup->start_date,
                    'end'=>$meetup->end_date,
                    'color'=>$color,
                ];
            };


        return view('calendar',['events'=>$events]);

        // return view('calendar',compact('events'));

    }
    
public function CalendarStore(Request $request)
{
    $request->validate([
        'title'=>'required|string'
    ]);

    // Get the currently logged-in user
    $user = Auth::user();
    
    // Create a new MeetUp event associated with the user
    $meetup = new MeetUp([
        'title' => $request->title,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);

    // Associate the user with the event
    $meetup->user()->associate($user);

    // Save the event to the database
    $meetup->save();
     
    $color=null;
    if($meetup->title =='Match'){
        $color='#E131F9';
    }
    if($meetup->title =='Health Checkup'){
        $color='#37F931';
    }
    if($meetup->title =='Training'){
        $color='#F98231';
    }if($meetup->title =='Counselling'){
        $color='#F93148';
    }

    return response()->json([
                    'id'=>$meetup->id,
                    'title'=>$meetup->title,
                    'start'=>$meetup->start_date,
                    'end'=>$meetup->end_date,
                    'color'=>$color ? $color: '' ,
    ]);

 }

 public function CalendarUpdate(Request $request,$id){
    $meetup=MeetUp::find($id);
    if(! $meetup){
        return response()->json([
            'error'=>'unable to locate the event'
        ],404);
    }
    $meetup->update([
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
             ]);
            return response()->json('Event updated');
 }


public function CalendarDestroy($id){
    $meetup= MeetUp::find($id);
    if(! $meetup){
        return response()->json([
            'error'=>'unable to locate the event'
        ],404);
    }
    $meetup->delete();
    return $id;
}
    
}
