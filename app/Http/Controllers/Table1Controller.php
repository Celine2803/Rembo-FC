<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Table1Controller extends Controller
{
    public function Table1()
{
    $users = User::all(); //you have a 'users' table and a User model

    return view('table1', compact('users'));
}
}
