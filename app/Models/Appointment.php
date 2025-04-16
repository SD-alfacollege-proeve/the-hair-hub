<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'customer_name',
        'email',
        'phone_number',
        'appointment_date',
        'user_id',
        'treatment_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function treatment()
    {
        return $this->hasOne(Treatment::class);
    }
}
