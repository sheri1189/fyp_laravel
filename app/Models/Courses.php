<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    public function degree()
    {
        return $this->belongsTo(Degree::class, 'course_degree', 'id');
    }
    public function program()
    {
        return $this->belongsTo(Program::class, 'course_program', 'id');
    }
    protected $fillable = [
        "course_title",
        "course_degree",
        "course_program",
        "course_description",
        "course_picture",
        "course_price",
        "course_duration",
        "course_status",
        "course_benefits",
        "added_from",
    ];
}
