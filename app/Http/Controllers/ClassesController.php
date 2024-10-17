<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use PhpParser\Builder\Class_;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allclasses = Classes::where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact("allclasses");
        return view('Classes.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Classes.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassesRequest $request)
    {
        $input = $request->all();
        $input['classes_name'] = strtolower($request->classes_name);
        $input['added_from'] = session()->get('user_added');
        $input['classes_status'] = 1;
        Classes::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $classes = Classes::find($id);
        $status = $classes->classes_status;
        if ($status == 1) {
            Classes::where('id', $classes->id)->update([
                "classes_status" => 2,
            ]);
        } else {
            Classes::where('id', $classes->id)->update([
                "classes_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $classes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $classes = Classes::find($id);
        return response()->json([
            "message" => $classes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateclassesRequest $request, $id)
    {
        $request->validate(
            [
                "classes_name" => "unique:classes,classes_name,$id",
            ]
        );
        $classes = Classes::find($id);
        $input = $request->all();
        $input['classes_name'] = strtolower($request->classes_name);
        $input['added_from'] = session()->get('user_added');
        $input['category_status'] = $classes->classes_status;
        $classes->update($input);
        return response()->json([
            "module" => "classes",
            "module_data" => $classes,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Classes::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
