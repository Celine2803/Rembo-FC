<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function LineChart (){
        $result=DB::select('SELECT `fixtures`,`team_A`,`team_B`FROM performances');
        $data=" ";
        foreach($result as $score){
            $data.="['".$score->fixtures."',".$score->team_A.",".$score->team_B."],";
        }
        return view('linechart',compact('data'));   
     }
}
