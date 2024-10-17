<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    public function degree()
    {
        return $this->belongsTo(Degree::class, 'program_degree', 'id');
    }
    protected $fillable = [
        "program_degree",
        "program_name",
        "program_description",
        "program_status",
        "added_from",
    ];
}
