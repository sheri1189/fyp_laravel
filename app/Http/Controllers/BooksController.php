<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use App\Models\Classes;
use App\Models\Degree;
use App\Models\Program;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allbooks = Books::where('added_from', session()->get('user_added'))->latest()->get();
        return view('Books.view', compact("allbooks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alldegree = Degree::where('added_from', session()->get('user_added'))->where('degree_status', 1)->latest()->get();
        $allclasses = Classes::where('classes_status', 1)->where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact('alldegree', 'allclasses');
        return view('Books.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['subject'] = serialize($request->subject);
        $input['added_from'] = session()->get('user_added');
        Books::create($input);
        return response()->json([
            "message" => 200,
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
        $book = Books::find($id);
        $compact = compact('alldegree', 'allclasses', 'book');
        return view('Books.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Books::find($id);
        $input = $request->all();
        $input['subject'] = serialize($request->subject);
        $input['added_from'] = $book->added_from;
        $book->update($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Books::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
