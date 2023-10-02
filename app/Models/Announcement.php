<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{   
    use Notifiable;
    use HasFactory;
    protected $fillable=['title','description'];
    protected $table = 'announcements';
    public function user() {
        return $this->belongsTo(User::class);
    }

}
