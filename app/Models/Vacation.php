<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    public $timestamps = false;
    protected $table = 'vacation';
    protected $fillable = [
        'pno', 'cname','vtype','vsday','veday','sumday','sumhour',
        'reason','memo','depcheck','deptime','peocheck','peotime'
    ];
}
