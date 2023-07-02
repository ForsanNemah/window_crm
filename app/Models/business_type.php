<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business_type extends Model

{
    protected $table = 'business_types';
    protected $guarded = [];  
    use HasFactory;
}
