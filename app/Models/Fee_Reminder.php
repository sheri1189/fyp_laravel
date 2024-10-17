<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee_Reminder extends Model
{
    use HasFactory;
    protected $fillable = [
        'reminder_name',
        'from_date',
        'to_date',
        'status',
        "type",
        'description',
        'added_from',
    ];
}