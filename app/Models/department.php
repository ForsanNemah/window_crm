<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model

{
    protected $table = 'departments';
    protected $guarded = [];  
    use HasFactory;
}
