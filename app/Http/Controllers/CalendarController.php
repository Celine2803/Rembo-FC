<?php

namespace App\Http\Controllers;

use App\Models\MeetUp;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function CalendarIndex(){
        $events = array();
        $meetups= MeetUp::all();
        
        foreach($meetups as $meetup){
                $events[]=[
                    'id'=>$meetup->id,
                    'title'=>$meetup->title,
                    'start'=>$meetup->start_date,
                    'end'=>$meetup->end_date,
                ];
            };

        // $events = array();
        // $meetups= MeetUp::all();
      
        // foreach($meetups as $meetup){
        //     $events[]=[
        //         'name'=>$meetup->name,
        //         'start'=>$meetup->timein,
        //         'end'=>$meetup->timeout,
        //     ];
        // }
      

        return view('calendar',['events'=>$events]);

        // return view('calendar',compact('events'));

    }
    
public function CalendarStore(Request $request)
{
    $request->validate([
        'title'=>'required|string'
    ]);
     
    $meetup=MeetUp::create([
        'title'=> $request->title,
        'start_date'=> $request->start_date,
        'end_date'=> $request->end_date,
    ]);

    return response()->json($meetup);

 }

public function CalendarUpdate(Request $request, $id){
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
