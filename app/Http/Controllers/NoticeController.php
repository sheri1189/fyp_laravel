<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\User;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allnotice = Notice::where('added_from', session()->get('user_added'))->latest()->get();
        $user=User::where('id',session()->get('user_added'))->first();
        $compact = compact("allnotice","user");
        return view('Notice.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Notice.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticeRequest $request)
    {
        $input = $request->all();
        $input['notice_name'] = strtolower($request->notice_name);
        $input['added_from'] = session()->get('user_added');
        $input['notice_status'] = 1;
        Notice::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        $status = $notice->notice_status;
        if ($status == 1) {
            Notice::where('id', $notice->id)->update([
                "notice_status" => 2,
            ]);
        } else {
            Notice::where('id', $notice->id)->update([
                "notice_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $notice,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        return response()->json([
            "message" => $notice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        $request->validate(
            [
                "notice_name" => "unique:notices,notice_name,$notice->id",
            ]
        );
        $input = $request->all();
        $input['notice_name'] = strtolower($request->notice_name);
        $input['added_from'] = session()->get('user_added');
        $input['notice_status'] = $notice->notice_status;
        $notice->update($input);
        return response()->json([
            "module" => "notice",
            "module_data" => $notice,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
