<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class source extends Model

{
    protected $table = 'sources';
    protected $guarded = [];  
    use HasFactory;
}
