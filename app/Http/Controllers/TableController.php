<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function Table()
{
    $users = User::all(); //you have a 'users' table and a User model

    return view('table', compact('users'));
}
}
