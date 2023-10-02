<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeetUp extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable=['title','start_date','end_date'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
