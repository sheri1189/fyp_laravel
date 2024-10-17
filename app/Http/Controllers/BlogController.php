<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allblog = Blog::where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact("allblog");
        return view('Blog.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Blog.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $input = $request->all();
        if ($request->hasfile("blog_image")) {
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(10000, 50000) . "." . strtolower($extension);
            $file->move('admin/assets/images/blog/', $filename);
            $msg = 200;
        }
        if ($msg == 200) {
            $input['blog_image'] = $filename;
            $input['blog_tilte'] = strtolower($request->blog_tilte);
            $input['added_from'] = session()->get('user_added');
            Blog::create($input);
            return response()->json([
                "message" => 200,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();
        $compact = compact('blog');
        return view('Blog.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->first();
        $request->validate(
            [
                "blog_title" => "unique:blogs,blog_title,$id",
            ]
        );
        $input = $request->all();
        if ($request->hasfile("blog_image")) {
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(10000, 50000) . "." . strtolower($extension);
            File::delete('admin/assets/images/blog/' . $blog->blog_image);
            $file->move('admin/assets/images/blog/', $filename);
            $input['blog_image'] = $filename;
            $input['course_title'] = strtolower($request->course_title);
            $input['added_from'] = session()->get('user_added');
            $input['course_status'] = 2;
            $blog->update($input);
            return response()->json([
                "message" => 200,
            ]);
        } else {
            $input['blog_image'] = $blog->blog_image;
            $input['course_title'] = strtolower($request->course_title);
            $input['added_from'] = session()->get('user_added');
            $blog->update($input);
            return response()->json([
                "message" => 200,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function getAllNews()
    {
        try {
            $blog = Blog::latest()->get();
            return response()->json(['message' => $blog], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
    public function getNewsDetails($id)
    {
        try {
            $blodDetail = Blog::where('id', $id)->first();
            return response()->json(['message' => $blodDetail], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
