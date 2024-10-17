<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Degree;
use GuzzleHttp\Handler\Proxy;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allprogram = Program::where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact('allprogram');
        return view('Program.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alldegree = Degree::where('degree_status', 1)->get();
        $compact = compact('alldegree');
        return view('Program.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $input = $request->all();
        $input['program_name'] = strtolower($request->program_name);
        $input['added_from'] = session()->get('user_added');
        $input['program_status'] = 1;
        Program::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $status = $program->program_status;
        if ($status == 1) {
            Program::where('id', $program->id)->update([
                "program_status" => 2,
            ]);
        } else {
            Program::where('id', $program->id)->update([
                "program_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $program,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $alldegree = Degree::where('degree_status', 1)->get();
        return response()->json([
            "message" => $program,
            "degree" => $alldegree,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {
        $request->validate([
            "program_name"=>"unique:programs,program_name,$program->id",
        ]);
        $input = $request->all();
        $input['program_name'] = strtolower($request->program_name);
        $input['added_from'] = session()->get('user_added');
        $input['program_status'] = $program->program_status;
        $program->update($input);
        return response()->json([
            "module" => "program",
            "module_data" => $program,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function programrecycleBin()
    {
        $allprogram = Program::onlyTrashed()->get();
        $compact = compact('allprogram');
        return view('Program.recycle')->with($compact);
    }
    public function perDelete($id)
    {
        Program::where('id', $id)->forceDelete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function restore($id)
    {
        Program::withTrashed()->where('id', $id)->restore();
        return response()->json([
            "message" => 200,
        ]);
    }
}
