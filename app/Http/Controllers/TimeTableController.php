<?php

namespace App\Http\Controllers;

use App\Models\Time_Table;
use App\Http\Requests\StoreTime_TableRequest;
use App\Http\Requests\UpdateTime_TableRequest;
use App\Models\Books;
use App\Models\Classes;
use App\Models\Degree;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alltime = Time_Table::where('added_from', session()->get('user_added'))->latest()->get();
        return view('Time.view', compact("alltime"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alldegree = Degree::where('added_from', session()->get('user_added'))->where('degree_status', 1)->latest()->get();
        $allteacher = User::where('enter_type', 3)->latest()->get();
        $allclasses=Classes::where('classes_status',1)->where('added_from',session()->get('user_added'))->get();
        $allgetclasses = User::where('enter_type', 1)->get();
        $allbatch = User::where('enter_type', 1)->distinct('batch')->get();
        $allteacher = User::where('enter_type', 3)->latest()->get();
        $alldegree = Degree::where('degree_status', 1)->latest()->get();
        foreach ($allgetclasses as $class) {
            if ($class->student_total_subjects) {
                $unser = unserialize($class->student_total_subjects);
                if (is_array($unser)) {
                    foreach ($unser as $subject) {
                        $array_subjects[] = $subject;
                    }
                }
            }
        }
        $array_subjects = array_unique($array_subjects);
        $compact = compact('array_subjects','alldegree', 'allclasses', 'allteacher', 'allbatch');
        return view('Time.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['day'] = serialize($request->day);
        $input['added_from'] = 1;
        $input['batch'] = "NULL";
        $input['start_time'] = date('H:i A', strtotime($request->start_time));
        $input['end_time'] = date('H:i A', strtotime($request->end_time));
        Time_Table::create($input);
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
        $allteacher = User::where('enter_type', 3)->latest()->get();
        $allclasses=Classes::where('classes_status',1)->where('added_from',session()->get('user_added'))->get();
        $allgetclasses = User::where('enter_type', 1)->get();
        $allbatch = User::where('enter_type', 1)->distinct('batch')->get();
        $allteacher = User::where('enter_type', 3)->latest()->get();
        $alldegree = Degree::where('degree_status', 1)->latest()->get();
        foreach ($allgetclasses as $class) {
            if ($class->student_total_subjects) {
                $unser = unserialize($class->student_total_subjects);
                if (is_array($unser)) {
                    foreach ($unser as $subject) {
                        $array_subjects[] = $subject;
                    }
                }
            }
        }
        $array_subjects = array_unique($array_subjects);
        $time = Time_Table::find($id);
        $compact = compact('array_subjects','alldegree', 'allclasses', 'allteacher', 'allbatch', 'time');
        return view('Time.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $time = Time_Table::find($id);
        $input = $request->all();
        $input['day'] = serialize($request->day);
        $input['added_from'] = 1;
        $input['batch'] = "NULL";
        $input['start_time'] = date('H:i A', strtotime($request->start_time));
        $input['end_time'] = date('H:i A', strtotime($request->end_time));
        $time->update($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Time_Table::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function getSubject($id)
    {
        $book = Books::where('class', $id)->first();
        return response()->json([
            "message" => unserialize($book->subject),
        ]);
    }
}
