<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReact extends Model
{
    protected $table = 'usersReact';

    protected $fillable = [
        'email',
        'password',
    ];

}
