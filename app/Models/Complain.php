<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $table = 'complaints';
    protected $guarded = [];  
    use HasFactory;
}

