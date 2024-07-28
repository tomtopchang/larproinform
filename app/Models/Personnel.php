<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    public $timestamps = false;
    protected $table = 'personnel';
    protected $fillable = [
        'pno', 'cname','idno','birsday','sex','address','tel',
        'depname','jobname','inday','outday'
    ];
}
