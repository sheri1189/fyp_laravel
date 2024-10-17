<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_Salary extends Model
{
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
    use HasFactory;
    protected $fillable=[
        "voucher_number",
        "voucher_date",
        "month",
        "teacher_id",
        "designation",
        "payment_method",
        "from_date",
        "to_date",
        "present",
        "absent",
        "net_salary",
        "academy_expences",
        "added_from",
    ];
}
