<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
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
    protected $fillable = [
        "degree",
        "program",
        "class",
        "subject",
        "added_from",
    ];
}
