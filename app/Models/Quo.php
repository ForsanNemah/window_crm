<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quo extends Model

{
    protected $table = 'quotation';
    protected $guarded = [];  
    use HasFactory;
}
