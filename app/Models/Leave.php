<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        "student_id",
        "from_date",
        "to_date",
        "leave_type",
        "status",
        "reason",
        "added_from",
    ];
}
