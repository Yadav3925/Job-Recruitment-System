<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_categories extends Model
{
    use HasFactory;
    protected $table="job_categories";
    protected $fillable = [
        'jobcategory',
        'image',
        'categoryno',
        'updated_at',
        'created_at',
        
        
    ];
}
