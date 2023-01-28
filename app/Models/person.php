<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class person extends Model

{
    protected $table = 'persons';
    protected $guarded = [];  
    use HasFactory;
}
