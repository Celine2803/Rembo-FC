<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Table2Controller extends Controller
{
    public function Table2()
{
    $users = User::all(); //you have a 'users' table and a User model

    return view('table2', compact('users'));
}
}
