<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memnusidebar extends Model
{
    public $timestamps = false;
    protected $table = 'memnusidebar';
    protected $fillable = [
        'name', 'nav','item','icon','sort'
    ];
}
