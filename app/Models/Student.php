<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','age','gender','reporting_teacher'];
    protected $table = 'students';
}
