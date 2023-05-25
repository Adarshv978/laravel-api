<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class otp extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    public $timestamps = false;

    protected $fillable = [
        'otp',
        'start_date_time',
        'end_date_time'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


}