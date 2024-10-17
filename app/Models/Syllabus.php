<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    public function degreename()
    {
        return $this->belongsTo(Degree::class, 'degree', 'id');
    }
    public function programname()
    {
        return $this->belongsTo(Program::class, 'program', 'id');
    }
    public function classname()
    {
        return $this->belongsTo(Classes::class, 'class', 'id');
    }
    use HasFactory;
    protected $fillable=[
        "instructor",
        "degree",
        "program",
        "class",
        "upload_image",
        "added_from",
    ];
}
