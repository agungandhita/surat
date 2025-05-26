<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = "users";
    protected $primaryKey = "user_id";

    protected $guarded = [
        'user_id'
    ];

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'alamat',
        'password',
        'role',
        'user_created',
        'user_updated',
        'user_deleted',
        'deleted'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted' => 'integer',
    ];
}
