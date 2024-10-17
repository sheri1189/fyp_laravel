<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
    use HasFactory;
    protected $fillable = [
        "student_id",
        "month",
        "fee_receipt_no",
        "due_date",
        "room",
        "batch",
        "fee_status",
        "added_from",
    ];
}
