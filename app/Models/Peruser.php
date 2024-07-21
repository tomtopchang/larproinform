<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peruser extends Model
{
    protected $table = 'peruser';
    protected $fillable = [
        'account', 'password','name','email','created_at','edit_at','last_login'
    ];
}
