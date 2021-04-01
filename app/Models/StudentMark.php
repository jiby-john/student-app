<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentMark extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','subject1','subject2','subject3','term','total_marks'];
    protected $table = 'student_marks';

    public function getStudent()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
