<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vacancies extends Model
{
    use HasFactory;
    protected $table="vacancies";
    protected $fillable = [
        'company',
        'post',
        'skills',
        'address',
        'availabiliy',
        'salaryrange',
        'time',
        'category',
        'description',
        'status',
    ];
}
