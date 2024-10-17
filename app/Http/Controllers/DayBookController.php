<?php

namespace App\Http\Controllers;

use App\Models\Day_Book;
use App\Http\Requests\StoreDay_BookRequest;
use App\Http\Requests\UpdateDay_BookRequest;
use App\Models\Day_Book_Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DayBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function report_daybook()
    {
        $allcategory = Day_Book_Category::all();
        $alldata = Day_Book::all();
        $array_data = [];
        foreach ($alldata as $cat) {
            $array_data[$cat->id] = Day_Book_Category::where('id', $cat->category_name)->first();
        }
        return view('Day_Book.report', compact('alldata', "allcategory", "array_data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcategory = Day_Book_Category::all();
        return view('Day_Book.add', compact('allcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDay_BookRequest $request)
    {
        $input = $request->all();
        $input['added_from'] = session()->get('user_added');
        Day_Book::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Day_Book $day_Book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Day_Book $day_Book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDay_BookRequest $request, Day_Book $day_Book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Day_Book $day_Book)
    {
        //
    }
    public function dayBookCategory()
    {
        $allcategory = Day_Book_Category::where('added_from', session()->get('user_added'))->get();
        return view('Day_Book.category', compact("allcategory"));
    }
    public function category_add(Request $request)
    {
        Day_Book_Category::create([
            "category_name" => $request->category_name,
            "category_type" => $request->category_type,
            "added_from" => session()->get('user_added'),
        ]);
        return response()->json([
            "message" => "category",
        ]);
    }
    public function selectPeriod(Request $request, $value)
    {
        if ($value == "Today") {
            $today = Carbon::today();
            $array_data = [];
            $conversations = DB::table('day__books')
                ->where('date', $today->format('Y-m-d'))->where('category_name', $request->category)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Yesterday") {
            $yesterday = Carbon::yesterday();
            $array_data = [];
            $conversations = DB::table('day__books')
                ->where('date', $yesterday->format('Y-m-d'))->where('category_name', $request->category)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "This Week") {
            $startDate = Carbon::now()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
            $array_data = [];
            $conversations = DB::table('day__books')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('category_name', $request->category)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last Week") {
            $startDate = Carbon::now()->subWeek()->startOfWeek();
            $endDate = Carbon::now()->subWeek()->endOfWeek();
            $array_data = [];
            $conversations = DB::table('day__books')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('category_name', $request->category)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 7 Days") {
            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(7);
            $conversations = DB::table('day__books')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('category_name', $request->category)
                ->get();
            $array_data = [];
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 30 Days") {

            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(30);
            $conversations = DB::table('day__books')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('category_name', $request->category)
                ->get();
            $array_data = [];
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 60 Days") {
            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(60);
            $conversations = DB::table('day__books')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('category_name', $request->category)
                ->get();
            $array_data = [];
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 90 Days") {

            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(90);
            $array_data = [];
            $conversations = DB::table('day__books')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('category_name', $request->category)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "This Year") {
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();

            $array_data = [];
            $conversations = DB::table('day__books')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('category_name', $request->category)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last Year") {
            $startDate = Carbon::now()->subYear()->startOfYear();
            $endDate = Carbon::now()->subYear()->endOfYear();
            $array_data = [];
            $conversations = DB::table('day__books')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('category_name', $request->category)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = Day_Book_Category::where('id', $conver->category_name)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        }
    }
}
