<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        "classes_name",
        "classes_status",
        "classes_description",
        "added_from",
    ];
}
