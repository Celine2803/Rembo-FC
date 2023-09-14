<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetUp extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable=['title','start_date','end_date'];
}
