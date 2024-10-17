<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alldegree = Degree::where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact("alldegree");
        return view('Degree.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Degree.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDegreeRequest $request)
    {
        $input = $request->all();
        $input['degree_name'] = strtolower($request->degree_name);
        $input['added_from'] = session()->get('user_added');
        $input['degree_status'] = 1;
        Degree::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Degree $degree)
    {
        $status = $degree->degree_status;
        if ($status == 1) {
            Degree::where('id', $degree->id)->update([
                "degree_status" => 2,
            ]);
        } else {
            Degree::where('id', $degree->id)->update([
                "degree_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $degree,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Degree $degree)
    {
        return response()->json([
            "message" => $degree,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        $request->validate(
            [
                "degree_name" => "unique:degrees,degree_name,$degree->id",
            ]
        );
        $input = $request->all();
        $input['degree_name'] = strtolower($request->degree_name);
        $input['added_from'] = session()->get('user_added');
        $input['degree_status'] = $degree->degree_status;
        $degree->update($input);
        return response()->json([
            "module" => "degree",
            "module_data" => $degree,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Degree $degree)
    {
        $degree->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
