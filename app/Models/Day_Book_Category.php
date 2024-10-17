<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day_Book_Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "category_name", "category_type", "added_from"
    ];
}
