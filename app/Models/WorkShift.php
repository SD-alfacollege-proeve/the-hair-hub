<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'worked_hours',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
