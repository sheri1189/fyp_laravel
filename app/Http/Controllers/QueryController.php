<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Degree;
use App\Models\Program;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allquery = User::where('enter_type', 2)->get();
        $program_array = [];
        $reg_no = 0;
        foreach ($allquery as $query) {
            $program = Program::where('id', $query->program)->first();
            $program_array[$query->id] = $program->program_name;
        }
        return view('User.Query.view', compact("allquery", "program_array"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alldegree = Degree::where('added_from', session()->get('user_added'))->where('degree_status', 1)->latest()->get();
        $allclasses = Classes::where('classes_status', 1)->where('added_from', session()->get('user_added'))->latest()->get();
        $query = User::where('enter_type', 2)->get();
        $reg_no=0;
        foreach ($query as $q) {
            $reg_no = $q->registeration_no;
        }
        $registeration_no = $reg_no + 1;
        $compact = compact('alldegree', 'allclasses', "registeration_no");
        return view('User.Query.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "unique:users,email",
        ]);
        $input = $request->all();
        $input['enter_type'] = 2;
        $input['is_active'] = 1;
        $input['password'] = "thenestacademy";
        $input['email_verified_at'] = now();
        $input['added_from'] = session()->get('user_added');
        User::create($input);
        return response()->json([
            "message" => "query",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $degree = Degree::where('id', $user->degree)->first();
        $program = Program::where('id', $user->program)->first();
        $class = Classes::where('id', $user->class)->first();
        return response()->json([
            "message" => $user,
            "degree" => $degree,
            "program" => $program,
            "class" => $class,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alldegree = Degree::where('added_from', session()->get('user_added'))->where('degree_status', 1)->latest()->get();
        $allclasses = Classes::where('classes_status', 1)->where('added_from', session()->get('user_added'))->latest()->get();
        $query = User::where('enter_type', 2)->get();
        $get_user = User::find($id);
        $compact = compact('alldegree', 'allclasses', 'get_user');
        return view('User.Query.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            "email" => "unique:users,email,$id",
        ]);
        $input = $request->all();
        $input['enter_type'] = $user->enter_type;
        $input['is_active'] = $user->is_active;
        $input['password'] = $user->password;
        $input['email_verified_at'] = $user->email_verified_at;
        $input['added_from'] = session()->get('user_added');
        $user->update($input);
        return response()->json([
            "message" => "query",
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
    public function approveForStudent($id)
    {
        User::where('id', $id)->update([
            "enter_type" => 1,
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
}
