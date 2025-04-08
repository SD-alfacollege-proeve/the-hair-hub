<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Workhours extends Model
{
    protected $fillable = [
        "user_id",
        "date",
        "worked_hours"
    ]

    protected $hidden = [

    ]

    public function users(){
        return $this->hasOne(User::class);
    }
}
