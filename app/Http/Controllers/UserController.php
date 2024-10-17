<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function student_add()
    {
        return view('User.Student.add');
    }
    public function staff_add()
    {
        return view('User.Staff.add');
    }
    public function teacher_add()
    {
        return view('User.Teacher.add');
    }
    public function query_add()
    {
        return view('User.Query.add');
    }
    public function user_add()
    {
        return view('User.User.add');
    }
}
