<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function CoachDashboard(){
        
        return view('coach.coach_dashboard');
    } //End method
}
