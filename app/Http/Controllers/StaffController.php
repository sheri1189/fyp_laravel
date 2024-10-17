<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Degree;
use App\Models\Program;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allstaff = User::where('enter_type', 4)->get();
        return view('User.Staff.view', compact("allstaff"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = User::where('enter_type', 4)->get();
        $reg_no = 0;
        foreach ($query as $q) {
            $reg_no = $q->registeration_no;
        }
        $registeration_no = $reg_no + 1;
        $compact = compact("registeration_no");
        return view('User.Staff.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "cnic" => "unique:users,cnic",
        ]);
        $input = $request->all();
        $input['enter_type'] = 4;
        $input['is_active'] = 1;
        $input['password'] = Hash::make("thenestacademy");
        $input['email_verified_at'] = now();
        $input['added_from'] = session()->get('user_added');
        $input['is_email_verified'] = 1;
        $input['role_assign'] = "Staff";
        User::create($input);
        return response()->json([
            "message" => "staff",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            "message" => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $get_user = User::find($id);
        $compact = compact('get_user');
        return view('User.Staff.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            "cnic" => "unique:users,cnic,$id",
        ]);
        $input = $request->all();
        $input['enter_type'] = $user->enter_type;
        $input['is_active'] = $user->is_active;
        $input['password'] = $user->password;
        $input['role_assign'] = $user->role_assign;
        $input['added_from'] = session()->get('user_added');
        $input['email_verified_at'] = $user->email_verified_at;
        $input['is_email_verified'] = $user->is_email_verified;
        $user->update($input);
        return response()->json([
            "message" => "staff",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
