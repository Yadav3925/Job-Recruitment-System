<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicants extends Model
{
    
    use HasFactory;
    protected $table="applicants";
    protected $fillable = [
        
        'user_id',
        'name',
        'email',
        'address',
        'skills',
        'coverletter',
        'experiance',
        'resume',
        'status'
    ];

  
}
